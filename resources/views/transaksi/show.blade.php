@extends('layouts/template')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Detail Transaksi</h3>
    </div>
    <div class="card-body box-profile">
        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item text-justify">
                <h1>{{$transaksi->nama_tim}}</h1>
            </li>
            <li class="list-group-item text-justify">
                {{$transaksi->jadwal->lapangan->name}}
            </li>
            <li class="list-group-item text-justify">
                {{$transaksi->jadwal->jam}}
            </li>
            <li class="list-group-item text-justify">
                Rp.{{$transaksi->jadwal->harga}}
            </li>
            <li class="list-group-item text-justify">
                @if($transaksi->status == 'pending')
                <strong>Menunggu pembayaran</strong>
                @elseif($transaksi->status == 'checking')
                <strong>Sedang dicek admin</strong>
                @else
                <strong>Selesai. Transaksi kamu {{ $transaksi->status == 'approve' ? 'Berhasil' : 'Gagal' }}</strong>
                @endif
            </li>
        </ul>

        <a href="{{url('transaksi')}}" class="btn btn-primary btn-block"><b>Back</b></a>
    </div>
</div>

@endsection