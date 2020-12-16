@extends('layouts.app')

@section('js')
    <script>
        $('#avatar').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection


@section('content')
    @if ($profile != null)
        @if ($message = Session::get('success'))
            <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }}  </li>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="cont">
            <form class="user" action="{{route('profile.update',['profile'=>$profile->user_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1 class="h1__title">Update profile:</h1>
                <div class="form-group" >
                    <label class="col-md-12 p-0">Full name:</label>
                    <input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name"  value="{{$profile->full_name}}">
                </div>
                <div class="form-group ">
                    <label class="col-md-12 p-0">Address:</label>
                    <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address"  value="{{$profile->address}}" >
                </div>
                <div class="form-group ">
                    <label class="col-md-12 p-0">Date of birth:</label>
                    <input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday"  value="{{$profile->birthday}}">
                </div>

                <div class="form-group ">
                    <label class="col-md-12 p-0">Avatar URL:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input " id="avatar" name="avatar" value="{{$profile->avatar }}" >
                        <label for="avatar"  class="custom-file-label">{{$profile->avatar }} </label>
                    </div>
                </div>
                <div class="form-group ">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
            </form>
        </div>
    @else
    <div class="container-fluid">
        <div class="row" >
            <div class="col-sm-12">
                <div class="white-box">
                    <h1 class="h1__title">No profile found</h1>
                    <br>
                    <a class="btn" href="/profile/create/{{$id}}">Create one</a>
                </div>
            </div>
        </div>
    </div>
    @endif
        
@endsection

