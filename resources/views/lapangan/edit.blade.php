@extends('layouts.template')

@section('title')
    Edit Data Lapangan
@endsection


@section('content')
    
<div>
        <form action="/lapangan/{{$lapang->id}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Nama Lapangan</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$lapang->name}}">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>
@endsection