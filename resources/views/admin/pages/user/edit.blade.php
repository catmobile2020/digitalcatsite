@extends('admin.layouts.master')

@section('title','Users Page')

@section('content')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Users Page</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            @if ($errors->any())
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session()->has('message'))
                                <div class="alert alert-info text-center">
                                    <h3>{{session()->get('message')}}</h3>
                                </div>
                            @endif
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.users.update',$user->id)}}" method="post">
                            {{csrf_field()}}
                            @isset($user)
                                <input type="hidden" name="_method" value="PUT"/>
                            @endisset
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="FullName">FullName</label>
                                    <input type="text" class="form-control" id="FullName" name="name" placeholder="FullName" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username" value="{{$user->username}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="country">country</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="country" value="{{$user->country}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$user->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{$user->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{$user->status === 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$user->status === 0 ? 'selected' : ''}}>DisActive</option>
                                    </select>
                                </div>
                                @if($user->role_id === 1)
                                    <input type="hidden" class="form-control" name="role_id" value="1">
                                @else
                                    <div class="form-group">
                                        <label for="user_type">role</label>
                                        <select class="form-control" id="user_type" name="role_id">
                                            <option value="2" {{$user->role_id === 2 ? 'selected' : ''}}>Owner</option>
                                            <option value="3" {{$user->role_id === 3 ? 'selected' : ''}}>Pharmacist</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="pharmacy_id">pharmacy </label>
                                    <select class="form-control" id="pharmacy_id" name="pharmacy_id">
                                        @foreach($pharmacies as $pharmacy)
                                        <option value="{{$pharmacy->id}}" {{$user->pharmacy_id === $pharmacy->id ? 'selected' : ''}}>{{$pharmacy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Old Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2" name="oldPassword" placeholder="Old Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->

    </aside><!-- /.right-side -->
@endsection