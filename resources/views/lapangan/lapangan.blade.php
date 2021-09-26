@extends('layouts.template')
@section('title')
    Data Lapangan
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
      <h3 class="card-title"><a href="/lapangan/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Nama Lapang</th>
          <th class="text-center" style="width:180px">Actions</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($lapang as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->name}}</td>
                <td class="text-center">
                    <form action="/lapangan/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/lapangan/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                        <input type="submit" class="btn btn-danger my-1" value="Delete">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No data</td>
            </tr>  
        @endforelse   
        </tbody>
        <tfoot>
      </table>
    </div>
    <!-- /.card-body -->

</div>
@endsection