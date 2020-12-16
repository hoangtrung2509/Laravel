@extends('layouts.app')

@section('content')

    @if ($profile ?? '' !=null)
    @if ($message = Session::get('success'))
        <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
            <li>{{ $message }}  </li>
    @if ($message = Session::get('file'))
        <li>{{ $message }}  </li> 
    @endif
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
        <li>{{ $message }}  </li>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg">
                        <img alt="user" src="{{$profile->avatar}}">
                        <div class="overlay-box" style="background-color:black;opacity:.95">
                            <div class="user-content">
                                <img src="{{$profile->avatar}}" class="thumb-lg img-circle" alt="img" >
                                <h4 class="text-white mt-2">{{$profile->full_name}}</h4>
                                {{-- <h5 class="text-white mt-2">info@myadmin.com</h5> --}}
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box mt-5 d-md-flex">
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>258</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>125</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>556</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Full Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$profile->full_name}}</h3>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Address</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$profile->address}}</h3>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date of birth</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$profile->birthday}}</h3>
                                </div>
                            @if (Auth::user()->role_id == 1)
                                </div>
                                    <div class="col-sm-12">
                                        <a class="btn" href="{{route('profile.edit',['profile'=>$id]) }}">Update Profile</a>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="container-fluid">
    <div class="row" >
        <div class="col-sm-12">
            <div class="white-box">
                <h1 class="h1__title">No profile found</h1>
                <br>
                @if (Auth::user()->role_id == 1)
                    <a class="btn" href="/profile/create/{{$id}}">Create one</a>    
                @endif
            </div>
        </div>
    </div>
</div>
@endif
    
@endsection