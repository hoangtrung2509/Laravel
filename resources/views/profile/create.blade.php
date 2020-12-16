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
        <form class="user" action="/profile" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <h1 class="h1__title">Create profile:</h1>
            <input type="hidden" name="user_id" id="user_id" value="{{$id}}" >
            <div class="form-group " >
                <label class="col-md-12 p-0">Full name:</label>
                <input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name" >
            </div>
            <div class="form-group ">
                <label class="col-md-12 p-0">Address:</label>
                <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address" >
            </div>
            <div class="form-group ">
                <label class="col-md-12 p-0">Date of birth:</label>
                <input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday">
            </div>
            <div class="form-group ">
                <label class="col-md-12 p-0">Avatar URL:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input " id="avatar" name="avatar" >
                    <label for="avatar" class="custom-file-label">Avatar</label>
                </div>
            </div>
            <div class="form-group ">
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
        </form>
    </div>
@endsection

