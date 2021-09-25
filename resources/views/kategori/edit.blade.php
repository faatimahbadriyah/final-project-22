@extends('layouts.template')

@section('title')
    Edit Data Kategori
@endsection

@section('content')
    
<div>
        <form action="/kategori/{{$category->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Kategori Lapangan</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
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