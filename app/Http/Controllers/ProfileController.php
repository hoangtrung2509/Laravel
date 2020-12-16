<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'birthday'=>'nullable|date|required',
            'full_name' =>'required',
            'address' =>'required'
        ]);

        if ($request->file()) {
            $profile = DB::table('profiles');
            $profile->user_id = $request->input('user_id');
            $profile->full_name = $request->input('full_name');
            $profile->address = $request->input('address');
            $profile->birthday = $request->input('birthday');

            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $profile->avatar = '/storage/' . $filePath;
        // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
            DB::table('profiles')
                ->insert([
                    'user_id'=> $profile->user_id,
                    'full_name' =>  $profile->full_name,
                    'address' =>  $profile->address,
                    'birthday' =>  $profile->birthday,
                    'avatar'=>$profile->avatar,
                    ]);
            $redirect = '/profile/'.$profile->user_id;
            return redirect($redirect)
            ->with('success','Profile has created.');
            // ->with('file',$fileName);
        }
        return back()
            ->with('fail','Created fail.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile =  DB::table('profiles')->where('user_id',$id)->first();
        return View('profile.show',['profile'=>$profile,'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $profile =  DB::table('profiles')->where('user_id',$id)->first();
        return View('profile.edit',['profile'=>$profile,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $validate = $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
            'birthday'=>'nullable|date',
            'full_name' =>'required',
            'address' =>'required'
        ]);

        if ($request->file()) {
            $profile = DB::table('profiles')->where('user_id',$id)->first();

            $profile->full_name = $request->input('full_name');
            $profile->address = $request->input('address');
            $profile->birthday = $request->input('birthday');

            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $profile->avatar =  '/storage/'.$filePath;
            // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public

            DB::table('profiles')->where('user_id',$id)->update([
                    'full_name' =>  $profile->full_name,
                    'address' =>  $profile->address,
                    'birthday' =>  $profile->birthday,
                    'avatar'=> $profile->avatar,
                    ]);
                    
            $redirect = '/profile/'.$profile->user_id;
            return redirect($redirect)
            ->with('success','Profile has updated.');
        }
        else{
            DB::table('profiles')->where('user_id',$id)->update([
                'full_name' =>   $request->input('full_name'),
                'address' => $request->input('address'),
                'birthday' =>  $request->input('birthday'),
                ]);
                
            $redirect = '/profile/'.$id;
            return redirect($redirect)
            ->with('success','Profile has updated.');
        }
        return  back()
            ->with('fail','Updated fail.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=DB::table('users')->where('id', $id)->first();
        DB::table('users')->where('id', $id)->delete();
        return redirect('/user')->with('success','User '.$user->name.'has deleted.');;
    }
}
