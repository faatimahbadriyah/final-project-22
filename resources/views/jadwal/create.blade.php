@extends('layouts.template')

@section('title')
    Tambah Data Jadwal
@endsection

@section('content')
    
<div>
        <form action="/jadwal" method="POST">
            @csrf
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="text" class="form-control" name="jam" id="jam" placeholder="Masukkan Jam">
                @error('jam')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="harga">Harga Sewa</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga Sewa Perjam">
                @error('harga')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lapangan_id">Lapangan</label>
                <select class="form-control" name="lapangan_id" id="lapangan_id">
                    
                    <option value = "">--- Pilih Lapangan ---</option>
                    @foreach ($lapang as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('lapangan_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
</div>
@endsection