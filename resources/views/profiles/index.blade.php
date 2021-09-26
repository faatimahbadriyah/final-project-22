@extends('layouts.template')

@section('content')
    <div class="">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">INFO PROFIL PENGGUNA</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            
        <table class="table table-bordered">
            <!-- <thead>
            <tr>
                <th class="image">
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
                </th>
                <th>Nama lengkap</th>
                <th>Nomor telfon</th>
                <th style="width: 40px">Action</th>
            </tr>
            </thead> -->
            <tbody>
                @forelse($profiles as $value)
                    <tr>
                        <th rowspan= "2" scope= "row" class="image" style="width: 40px">
                        <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-4" alt="User Image">
                        </th>
                        <td>Nama lengkap:<br> {{$value->fullname}} </td>
                        <td>Nomor telfon:<br> {{$value->phone}} </td>
                        
                    </tr>
                    <tr>
                        <td>Jenis kelamin:<br> {{$value->gender}} </td>
                        <td>Alamat lengkap:<br> {{$value->address}} </td>
                    </tr>
                    <tr>
                    <td colspan = "3" align= "center">
                            
                            <a href="{{route('profiles.edit', ['profile'=>$value->id])}}" class="btn btn-primary btn-lg">Edit profil</a>
                            
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan = "3" align= "center">Belum ada profil</td>
                            <a class="btn btn-primary mb-3" href="{{route('profiles.create')}}">Buat profil baru</a>
                        </tr>
                @endforelse
            
            
            </tbody>
        </table>
        </div>
        
    </div>

    </div>
@endsection