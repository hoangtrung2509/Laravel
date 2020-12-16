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
        <form class="user" action="/product" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <h1 class="h1__title">Create product:</h1>
            <div class="form-group" >
                <label class="col-md-12 p-0">Product Name:</label>
                <input type="text" name="product_name" class="form-control form-control-user" id="product_name" placeholder="Product name">
            </div>
            <div class="form-group ">
                <p>Description:<p>
                <textarea rows="6" style="resize:none" cols="33" name="description" class="form-control form-control-user" id="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group ">
                <label class="col-md-12 p-0">Price:</label>
                <input type="text" class="form-control form-control-user" name="price" id="price" placeholder="Price" >
            </div>

            <div class="form-group ">
                <label class="col-md-12 p-0">Img URL:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input " id="avatar" name="avatar" >
                    <label for="avatar"  class="custom-file-label"></label>
                </div>
            </div>
            <div class="form-group ">
                <input type="submit" class="btn btn-primary" value="Create new product">
            </div>
        </form>
    </div>
@endsection

