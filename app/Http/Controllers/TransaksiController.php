<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Lapangan;
use App\Mail\RFMail;
use App\Transaksi;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user['role'] == 'admin') {
            $transaksi = Transaksi::all();
        } else {
            $transaksi = Transaksi::with(['jadwal', 'jadwal.lapangan'])
                ->where('user_id', $user['id'])
                ->where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
                ->get();
        }
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapangan = Lapangan::with(['jadwal' => function ($q) {
            $q->where('status', 'available');
        }])->get();
        return view('transaksi.create', compact('lapangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = Jadwal::where('id', $request->jadwal_id)->first();

        $saveTransaksi = Transaksi::create([
            'nama_tim' => $request->nama_tim,
            'durasi' => 60,
            'total_bayar' => $jadwal->harga,
            'status' => 'pending',
            'user_id' => Auth::user()['id'],
            'jadwal_id' => $request->jadwal_id,
        ]);

        if ($saveTransaksi) {
            $jadwal->status = 'booked';
            $jadwal->update();
        }

        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::with(['jadwal', 'jadwal.lapangan'])
            ->where('id', $id)
            ->first();
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $lapangan = Lapangan::with(['jadwal' => function ($q) {
            $q->where('status', 'available');
        }])->get();
        return view('transaksi.edit', compact('transaksi', 'lapangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newJadwal = Jadwal::where('id', $request->jadwal_id)->first();
        $oldJadwal = Jadwal::where('id', $request->old_jadwal)->first();

        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->nama_tim = $request->nama_tim;
        $transaksi->jadwal_id = $request->jadwal_id;
        $transaksi->update();

        if ($transaksi) {
            $newJadwal->status = 'booked';
            $newJadwal->update();
            $oldJadwal->status = 'available';
            $oldJadwal->update();
        }

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->delete();
        return redirect('transaksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'fileBukti' => 'required|file|image|max:2000', // max 7MB
        ]);

        $file = $request->file('fileBukti');
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('fileBukti')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;

        $saveFile = $file->storeAs('public/bukti-bayar', $filenameSimpan);

        $transaksi = Transaksi::where('id', $request->trxId)->first();
        $transaksi->status = 'checking';
        $transaksi->file_bayar = $filenameSimpan;
        $transaksi->update();

        return redirect('/transaksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($status, $id)
    {
        $transaksi = Transaksi::with(['user'])->where('id', $id)->first();
        $transaksi->status = $status;
        $transaksi->update();

        $details = [
            'subject' => 'Notifikasi Booking Rental22',
        ];

        if ($status == 'approve') {
            $details['title'] = 'Transaksi Berhasil';
            $details['body'] = 'Pembayaran kamu telah diverifikasi admin. Silahkan download invoice pembelian di halaman dashboard. Terimakasih telah melakukan sewa lapangan. :)';
        } else {
            $details['title'] = 'Transaksi Gagal';
            $details['body'] = 'Pembayaran kamu tidak dapat diverifikasi. Silahkan hubungi kami melalui email rentalfield22@gmail.com. :)';
        }

        Mail::to($transaksi->user->email)->send(new RFMail($details));

        return redirect('/transaksi');
    }

    public function invoice($id)
    {
        $transaksi = Transaksi::with(['user', 'jadwal', 'jadwal.lapangan'])->where('id', $id)->first();

        $pdf = PDF::loadView('invoice', ['data' => $transaksi]);

        return $pdf->download('invoice-' . now() . '.pdf');
    }
}