@extends('layouts.template')
@section('title')
    Data Jadwal
@endsection

@push('scripts')
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endpush

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.2/datatables.min.css"/>
@endpush

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><a href="/jadwal/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Jam</th>
          <th>Harga</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($jadwal as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->jam}}</td>
                <td>{{$value->harga}}</td>
                <td>
                    <form action="/jadwal/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/jadwal/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                        <input type="submit" class="btn btn-danger my-1" value="Delete">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No data</td>
            </tr>  
        @endforelse   
        </tbody>
        <tfoot>
      </table>
    </div>
    <!-- /.card-body -->

</div>
@endsection