@extends('layouts.template')
@section('title')
Transaksi Booking
@endsection

@section('content')
<div class="card-header">
    <h3 class="card-title"><a href="/transaksi/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah
            Data</a>
    </h3>
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Tim</th>
                <th>Durasi</th>
                <th>Lapangan</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->nama_tim}}</td>
                <td>{{$value->durasi}}</td>
                <td>{{$value->jadwal->lapangan->name}}</td>
                <td>{{$value->status}}</td>
                <td>
                    @if (Auth::user()['role'] == 'member')
                    <a href="/transaksi/{{$value->id}}" class="btn btn-warning btn-xs btn-block">Detail</a>
                    @if ($value->status == 'pending')
                    <a href="#" class="btn btn-info btn-xs btn-block" type="button" data-toggle="modal"
                        data-target="#modal-sm" data-trx-id="{{$value->id}}">Upload Bukti Bayar</a>
                    <a href="/transaksi/{{$value->id}}/edit" class="btn btn-primary btn-xs btn-block">Edit</a>
                    <form action="/transaksi/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-xs btn-block mt-2" value="Delete">
                    </form>
                    @endif
                    @else
                    <a href="#" class="btn btn-info btn-xs btn-block" type="button" data-toggle="modal"
                        data-target="#modal-bukti" data-trx-file="{{$value->file_bayar}}"
                        data-trx-tim="{{$value->nama_tim}}">Lihat Bukti Bayar</a>
                    <a href="transaksi/update/approve/{{$value->id}}"
                        class="btn btn-primary btn-xs btn-block">Approve</a>
                    <a href="transaksi/update/reject/{{$value->id}}" class="btn btn-danger btn-xs btn-block">Reject</a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No data</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
    </table>
</div>
<!-- /.card-body -->

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload bukti bayar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('transaksi/upload')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <p class="text-danger">Pastikan file yang diupload sudah benar!</p>
                    <label class="label-control">File Bukti Bayar</label>
                    <input type="hidden" name="trxId">
                    <input type="file" name="fileBukti" required class="form-control"
                        style="height: 2.75rem !important;">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-bukti">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@push('scripts')
<script>
$(function() {
    $('#modal-sm').on('show.bs.modal', function(e) {
        var trxId = $(e.relatedTarget).data('trx-id');
        $(e.currentTarget).find('input[name="trxId"]').val(trxId);
    });
    $('#modal-bukti').on('show.bs.modal', function(e) {
        var trxFilename = $(e.relatedTarget).data('trx-file');
        var trxTim = $(e.relatedTarget).data('trx-tim');
        $('img').attr('src', 'storage/bukti-bayar/' + trxFilename);
        $('.modal-title').html('File Bukti Bayar ' + trxTim);
    });
});
</script>
@endpush