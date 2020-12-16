@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <li>{{ $message }}  </li>
        </div>
    @endif
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h1 style="font-size: 1.6rem" class="box-title h1__title">Orders Detail<i style="margin-left: 5px" class="fas fa-edit" aria-hidden="true"></i></h1>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">User id</label>
                        <div class="col-md-12 border-bottom p-0">
                            <h3>{{$order->user_id}}</h3>
                        </div>
                    </div>
                   
                    <form action="{{route('order.update',['order'=>$order->id])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0 ">Status</label>
                            <div style="display: flex;align-items:center">
                                <div class="col-md-3 p-0 ">
                                    <select id="state" name="state" class="form-control form-control-user" >
                                        <option selected disabled>
                                            @if ($order->status == 1)
                                                wait
                                            @elseif($order->status == 2)
                                                pending
                                            @else
                                                done
                                            @endif
                                        </option>
                                        <option value="1">wait</option>
                                        <option value="2">pending</option>
                                        <option value="3">done</option>
                                    </select>
                                </div>
                                <div class="col-md-3 p-0"> 
                                    <input  style="margin-left:10px" class="btn" type="submit" value="Change state">
                                </div>
                            </div>
                            
                        </div>
                    </form>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Created day</label>
                        <div class="col-md-12 border-bottom p-0">
                            <h3>{{$order->created_day}}</h3>
                        </div>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Total price</label>
                        <div class="col-md-12 border-bottom p-0">
                            <h3>{{$order->total_price}} $</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="text-align: center">
                                    <th class="border-top-0">Product ID:</th>
                                    <th class="border-top-0">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $orderdetail)
                                    <tr style="text-align: center" >
                                        <td>{{$orderdetail->product_name}}</td>
                                        <td>{{$orderdetail->amount}}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
