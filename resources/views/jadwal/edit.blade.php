@extends('layouts.template')

@section('title')
    Edit Data Jadwal
@endsection

@section('content')
    
<div>
        <form action="/jadwal/{{$jadwal->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="text" class="form-control" name="jam" id="jam" value="{{$jadwal->jam}}">
                @error('jam')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="harga">Harga Sewa</label>
                <input type="number" class="form-control" name="harga" id="harga" value="{{$jadwal->harga}}">
                @error('harga')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lapangan_id">Lapangan</label>
                <select class="form-control" name="lapangan_id" id="lapangan_id">
                    
                    <option value="">--- Pilih Lapangan ---</option>
                    @foreach ($lapang as $item)
                        @if ($item->id == $jadwal->lapangan_id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif    
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