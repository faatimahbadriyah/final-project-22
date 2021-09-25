@extends('layouts.template')

@section('title')
    Tambah Data Lapangan
@endsection

@section('content')
    
<div>
        <form action="/lapangan" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lapangan</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lapangan">
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