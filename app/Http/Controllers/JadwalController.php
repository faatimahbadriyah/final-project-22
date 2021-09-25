<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Jadwal;
use App\Lapangan;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.jadwal', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapang = Lapangan::all();
        return view('jadwal.create', compact('lapang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jam' => 'required',
            'harga' => 'required',
            'lapangan_id' => 'required'
        ]);


        Jadwal::create([
            'jam' => $request->jam,
            'harga' => $request->harga,
            'lapangan_id' => $request->lapangan_id
        ]);

        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        $lapang = Lapangan::all();
        return view('jadwal.edit', compact('jadwal', 'lapang'));
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
        $this->validate($request, [
            'jam' => 'required',
            'harga' => 'required',
            'lapangan_id' => 'required'
        ]);

        $jadwal = Jadwal::find($id);
        $jadwal->jam = $request->jam;
        $jadwal->harga = $request->harga;
        $jadwal->lapangan_id = $request->lapangan_id;
        $jadwal->update();
        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect('/jadwal');
    }
}
