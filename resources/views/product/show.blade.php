@extends('layouts.app')

@section('content')
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
            <div class="col-lg-4 col-xlg-3 col-md-12" style="display:flex;justify-content:center">
                <img alt="user" src="{{$product->avatar}}" style="width:100%;object-fit:contain" >
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-horizontal form-material">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">ID</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$product->id}}</h3>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Product Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$product->product_name}}</h3>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Description</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$product->description}}</h3>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Price</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <h3>{{$product->price}}$</h3>
                                </div>
                            </div>
                                <div class="col-sm-12">
                                    <a  class="btn" href="{{route('product.edit',['product'=>$product->id]) }}">Update product</a>
                                    <form  style="display:inline " action="{{route('product.destroy',['product'=>$product->id]) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <input onclick="return confirm('Are you sure?')" type="submit" value="Delete product" class="btn" style="width: 155px;max-width:200px"> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
