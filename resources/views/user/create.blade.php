@extends('layouts.app')

@section('content')
    <div class="cont">
        <form class="user" action="/user" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
            <h1 class="h1__title">Create new user</h1>
            </div>
            <div class="form-group">
                <label class="col-md-12 p-0">User name:</label>
                <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="User Name" >
            </div>  
            <div class="form-group">
                <label class="col-md-12 p-0">Email:</label>
                <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Email" >
            </div>  
            <div class="form-group">
                <label class="col-md-12 p-0">Password:</label>
                <input type="text" name="password" class="form-control form-control-user" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="col-md-12 p-0">Role:</label>
                    <select name="role_id" class="form-control form-control-user" id="role_id">
                        <option value="1">admin</option>
                        <option value="2">editor</option>
                        <option value="3">viewer</option>
                    </select>
            </div>
            <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add user">
            </div>
        </form>
    </div>
@endsection