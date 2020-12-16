@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
            <li>{{ $message }}  </li>
        </div>
    @endif
    <div class="container-fluid">
            
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    
                    <div class="top--header">
                        <h1  class="box-title h1__title">Orders Management</h1>
                        <form class="user" action="{{route('order.store')}}" method="POST">
                            @csrf
                            @method('POST')
                                <div class="form-group" style="display: flex">
                                    <input type="text" name="search" class="form-control form-control-user" id="search" placeholder="Search" >
                                    <input class="btn btn--search"  type="submit" value="Search" >
                                </div> 
                        </form>
                        <form style="z-index: 1" action="{{route('order.store')}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="sort">
                                <div style="display: flex;justify-content:flex-end">
                                    <p class="btn btn--opt sort--title">Sort</p>
                                </div>
                                <div class="sort--opt">
                                    <button class="btn btn--opt" type="submit" name="action" value="1">Status <i class="fas fa-chevron-down" aria-hidden="true"></i></button>
                                    <button class="btn btn--opt" type="submit" name="action" value="2">Status <i class="fas fa-chevron-up" aria-hidden="true"></i></button>
                                    <button class="btn btn--opt" type="submit" name="action" value="3">Create day <i class=" fas fa-chevron-down" aria-hidden="true"></i></button>
                                    <button class="btn btn--opt" type="submit" name="action" value="4">Create day <i class="  fas fa-chevron-up" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="text-align: center">
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Receiver</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Total price</th>
                                    <th class="border-top-0">Create at </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr style="text-align: center" >
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" style="color:#707cd2"
                                            href="/order/profile/{{$order->user_id}}" aria-expanded="false">
                                            <i class="fas fa-eye" aria-hidden="true"></i><span style="margin-left:10px">{{$order->name}}</span></a>
                                        </td>
                                        <td>
                                            @if ($order->status == 1)
                                                wait
                                            @elseif($order->status == 2)
                                                pending
                                            @else
                                                done
                                            @endif
                                            {{-- {{$order->status}} --}}
                                        </td>
                                        <td>{{$order->total_price}}$</td>
                                        <td>{{$order->created_day}}</td>
                                        <td>
                                            <a class="btn" href="order/{{$order->id}}" style="line-height:unset">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
