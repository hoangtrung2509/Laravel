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
                <a href="/user/create" class="btn" style="margin:0 0 15px auto">Create new user</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h1 class="box-title h1__title ">Users Management</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="text-align: center">
                                    <th class="border-top-0">ID</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Role</th>
                                    {{-- <th class="border-top-0">Last Name</th> --}}
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Edit</th>
                                    <th class="border-top-0">Delete</th>

                                    {{-- <th class="border-top-0">Role</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($users as $user)
                                <tr style="text-align: center">
                                    <td>{{$user->id}}</td>
                                    <td><a id="btn__profile--link" href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                                    <td>
                                        @if ($user->role_id == 1)
                                            admin
                                        @elseif($user->role_id == 2)
                                            editor
                                        @else
                                            viewer
                                        @endif
                                    </td>
                                    {{-- <td>Prohaska</td> --}}
                                    <td>{{$user->email}}</td>
                                    {{-- <td>admin</td> --}}
                                    <td>
                                        <a href="/profile/{{$user->id}}/edit" class="btn btn-danger theme--color" style="width: 100px">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/profile/{{$user->id}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <input onclick="return confirm('Are you sure?')" type="submit" value="Delete" class="btn btn-danger theme--color" style="width: 100px"> 
                                        </form>
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
