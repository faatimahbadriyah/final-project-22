@extends('layouts/template')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <a href="{{url('cast/create')}}" class="btn btn-primary">Add New Cast</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tb_casts" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casts as $key=>$value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->umur}}</td>
                    <td>
                        <a href="/cast/{{$value->id}}" class="btn btn-success btn-sm btn-block">Show</a>
                        <a href="/cast/{{$value->id}}/edit" class="btn btn-warning btn-sm btn-block">Edit</a>
                        <form action="/cast/{{$value->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm btn-block mt-2" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
@endsection

@push('scripts')
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
$(function() {
    $("#tb_casts").DataTable();
});
</script>
@endpush