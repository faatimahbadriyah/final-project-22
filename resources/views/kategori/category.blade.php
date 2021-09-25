@extends('layouts.template')
@section('title')
    Kategori Lapangan
@endsection

@section('content')
<div class="card-header">
    <h3 class="card-title"><a href="/kategori/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
    </h3>
</div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
              @forelse ($category as $key=>$value)
              <tr>
                  <td>{{$key + 1}}</th>
                  <td>{{$value->name}}</td>
                  <td>
                      <form action="/kategori/{{$value->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="/kategori/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
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
@endsection