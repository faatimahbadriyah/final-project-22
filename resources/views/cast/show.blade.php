@extends('layouts/template')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Show detail cast</h3>
    </div>
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{asset('adminlte/dist/img/user4-128x128.jpg')}}"
                alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{$cast->nama}}</h3>

        <p class="text-muted text-center">{{$cast->umur}} Tahun</p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item text-justify">
                {{$cast->bio}}
            </li>
        </ul>

        <a href="{{url('cast')}}" class="btn btn-primary btn-block"><b>Back</b></a>
    </div>

    @endsection