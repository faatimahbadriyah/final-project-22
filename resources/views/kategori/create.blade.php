@extends('layouts.template')

@section('title')
    Tambah Data Kategori
@endsection

@section('content')
    
<div>
        <form action="/kategori" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Kategori Lapangan</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Kategori Lapangan">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
</div>
@endsection