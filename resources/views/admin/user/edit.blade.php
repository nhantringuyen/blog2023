@extends('admin.layout.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">User
            <small>Edit</small>
        </h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input class="form-control" name="name" value="{{$user->name}}" id="username" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" id="txtEmail" placeholder="Please Enter Email" readonly />
                    </div>
                    <div class="form-group">
                        <label for="user-password">Password</label>
                        <input type="password" class="form-control" id="user-password" name="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label for="txtRePass">RePassword</label>
                        <input type="password" class="form-control" id="txtRePass" name="txtRePass" placeholder="Please Enter RePassword" />
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <label class="radio-inline">
                            <input name="is_admin" value="0" @if(!$user->is_admin) checked @endif type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="is_admin" value="1" @if($user->is_admin) checked @endif type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">User Edit</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
