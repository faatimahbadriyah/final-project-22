@extends('layouts.template')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit profil {{$profiles->id}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/profiles/{{$profiles->id}}" method="POST">
            @csrf
            @method('PUT')
        <div class="card-body">
            <div class="form-group">
            <label for="fullname">Nama lengkap</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="{{old('fullname', $profiles->fullname)}}" placeholder="Input nama lengkap">
            @error('fullname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
            <label for="gender">Jenis kelamin</label>
            <input type="text" class="form-control" id="gender" name="gender" value="{{old('gender', $profiles->gender)}}"placeholder="Input jenis kelamin">
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{old('address', $profiles->address)}}"placeholder="Tuliskan alamat lengkap">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $profiles->phone)}}"placeholder="Tuliskan nomor telfon yang dapat dihubungi">
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
            <label for="photo">Photo</label>
            <input type="text" class="form-control" id="photo" name="photo" value="{{old('photo', $profiles->photo)}}"placeholder="Upload foto kamu di sini">
            @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update profil</button>
        </div>
        </form>
    </div>

@endsection