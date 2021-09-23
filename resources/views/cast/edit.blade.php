@extends('layouts/template')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Edit cast</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{url('cast')}}/{{$cast->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{$cast->nama}}" required>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" class="form-control" id="umur" value="{{$cast->umur}}"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control" id="bio" required>
                    {{$cast->bio}}
                </textarea>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{url('cast')}}" class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>

@endsection