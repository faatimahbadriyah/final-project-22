@extends('layouts.template')

@section('title')
Tambah Data Transaksi
@endsection

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Lengkapi form berikut.</h3>
    </div>

    <form action="/transaksi" method="POST">
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            <div class="form-group">
                <label class="col-form-label" for="nama_tim">NAMA TIM</label>
                <input type="text" class="form-control" name="nama_tim" id="nama_tim" placeholder="Enter ..." required>
            </div>
            <div class="row">
                @forelse($lapangan as $lap)
                <div class="col-md-3 col-12">
                    <h6><strong>{{$lap->name}}</strong></h6>
                    @forelse($lap->jadwal as $j)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jadwal_id" value="{{$j->id}}" required>
                        <label class="form-check-label">{{$j->jam}} --- <strong>Rp.{{$j->harga}}</strong></label>
                    </div>
                    @empty
                    <p>Penuh</p>
                    @endforelse
                </div>
                @empty
                <p>Tidak ada data lapangan</p>
                @endforelse
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @if(!$lapangan->isEmpty())
            <button type="submit" class="btn btn-primary">Submit</button>
            @endif
            <a href="{{url('transaksi')}}" class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>
@endsection