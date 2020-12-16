<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetail = DB::table('orders')
            ->join('users', 'orders.user_id','=', 'users.id')
            ->select('orders.*', 'users.name')
            ->get();
        return view('order.index',['orders'=>$orderDetail]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//order by state
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $orderDetail = DB::table('orders')
        ->join('users', 'orders.user_id','=', 'users.id')
        ->select('orders.*', 'users.name');
        if($request->input('search')){
            $orderDetail = $orderDetail->where('name','LIKE','%'.$request->input('search').'%')->get();
        }
        if($request->input('action')){
            switch ($request->input('action')) {
                case 1:
                    $orderDetail = $orderDetail->orderBy('status', 'asc')->get();
                    break;
                case 2:
                    $orderDetail = $orderDetail->orderBy('status', 'desc')->get();
                    break;
                case 3:
                    $orderDetail = $orderDetail->orderBy('created_day', 'asc')->get();
                    break;
                case 4:
                    $orderDetail = $orderDetail->orderBy('created_day', 'desc')->get();
                    break;
            }
        }
       
        return view('order.index',['orders'=>$orderDetail]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetail = DB::table('order_details')
            ->join('products', 'order_details.product_id','=', 'products.id')
            ->where('order_id',$id)
            ->get();
        
        $order = DB::table('orders')->where('id',$id)->first();
        return view('order.show',['orderdetails'=>$orderDetail,'order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('order.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = DB::table('orders')->where('id',$id)->first();
        $newState = $request->input('state');
        DB::table('orders')->where('id',$id)->update([
            'status'=>$newState,
        ]);
        return redirect('/order/'.$id)
        ->with('success','Change state success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
