@extends('layouts.template')

@section('title')
Tambah Data Transaksi
@endsection

@section('content')
<style>
/* label.btn-default.active{background-color:#007ba7;color:#FFF}
label.btn-default{width:90%;border:1px solid #efefef;margin:5px; box-shadow:5px 8px 8px 0 #ccc;}
label .bizcontent{width:100%;}
.btn-group{width:90%}
.btn span.glyphicon{
    opacity: 0;
}
.btn.active span.glyphicon {
    opacity: 1;
} */
</style>
<div class="card card-orange card-outline">
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
                <div class="col-md-3 col-sm-6 col-xs-6 col-12">
                    <h6><strong>{{$lap->name}}</strong></h6>
                    @forelse($lap->jadwal as $j)
                    <!-- <div class="custom-control custom-radio">
                        <input class="custom-radio-input" type="radio" id="jadwal_{{$lap->name}}_{{$j->id}}" name="jadwal_id" value="{{$j->id}}" required>
                        <label class="custom-radio-label" for="jadwal_{{$lap->name}}_{{$j->id}}">{{$j->jam}} --- <strong>Rp.{{$j->harga}}</strong></label>
                    </div> -->
                    <div class="info-block block-info">
                        <div data-toggle="buttons" class="btn-group">
                            <label class="btn btn-secondary">
                                <div class="bizcontent">
                                    <input class="checkbox" type="checkbox" name="jadwal_id" value="{{$j->id}}" style="position:absolute; right:0; top:0">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="text-sm font-weight-normal">{{$j->jam}}</span>
                                            <h3><strong>Rp.{{$j->harga}}</strong></h3>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
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
