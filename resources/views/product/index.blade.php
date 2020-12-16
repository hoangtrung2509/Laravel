@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
            <li>{{ $message }}  </li>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="/product/create" class="btn" style="margin:0 0 15px auto">Create new product</a>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <a href="/product/{{$product->id}}" style="display: inline-block" class="white-box analytics-info a__custom">
                        <h3 class="h1__title h3__title" style="margin-bottom: 10px">{{$product->product_name}}</h3>
                        <ul id="ul" class="list-inline two-part d-flex align-items-center mb-0">
                            <li style="margin: 0 20px auto 0">
                                <p>{{$product->description}}</p>
                            </li>
                            <li style="display: flex;flex-direction:column" class="ml-auto">
                                <img class="product__img" src="{{$product->avatar}}"/>
                                <span class="counter text-info" style="color: #707cd2 !important;text-align:center">{{$product->price}}$</span>
                            </li>
                        </ul>
                    </a>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection
