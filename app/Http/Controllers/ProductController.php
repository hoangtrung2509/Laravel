<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048|required',
            'description'=>'required',
            'product_name' =>'required',
            'price' =>'required|numeric'
        ]);

        if ($request->file()) {
            $product = DB::table('products');
            $product->product_name = $request->input('product_name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');

            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            $product->avatar = '/storage/' . $filePath;

            DB::table('products')
                ->insert([
                    'product_name'=> $product->product_name,
                    'description' =>  $product->description,
                    'price' =>  $product->price,
                    'avatar'=>$product->avatar,
                    ]);

            // $redirect = '/product/'.$product->product_name;
            return redirect('/product')
            ->with('success','Product has created.');
        }
        return back()
            ->with('fail','Created fail.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',['product'=>$product]);
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
        $validate = $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
            'description'=>'required',
            'product_name' =>'required',
            'price' =>'required|numeric'
        ]);
        $product = DB::table('products')->where('id',$id)->first();
        if ($request->file()) {
            $product->product_name = $request->input('product_name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');

            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            $product->avatar = '/storage/' . $filePath;

            DB::table('products')
                ->where('id',$id)
                ->update([
                    'product_name' =>    $product->product_name,
                    'description' => $product->description,
                    'price' =>  $product->price,
                    'avatar'=>$product->avatar,
                    ]);
            $redirect = '/product/'.$id;
            return redirect($redirect)
            ->with('success','Product has created.');
        }
        else{
            DB::table('products')
                ->where('id',$id)
                ->update([
                    'product_name' =>   $request->input('product_name'),
                    'description' => $request->input('description'),
                    'price' =>  $request->input('price'),
                    ]);
            $redirect = '/product/'.$id;
            return redirect($redirect)
            ->with('success','Profile has updated.');
        }
        return back()
            ->with('fail','Created fail.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        DB::table('products')->where('id', $id)->delete();
        return redirect('/product')->with('success','Product '.$product->product_name.'has deleted.');
    }
}
