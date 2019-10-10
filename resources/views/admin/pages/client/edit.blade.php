@extends('admin.layouts.master')

@section('title','clients Page')

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
                <li class="active">clients Page</li>
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
                        <form role="form" action="{{route('admin.clients.update',$client->id)}}" method="post">
                            {{csrf_field()}}
                            @isset($client)
                                <input type="hidden" name="_method" value="PUT"/>
                            @endisset
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="FullName">FullName</label>
                                    <input type="text" class="form-control" id="FullName" name="name" placeholder="FullName" value="{{$client->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="code">Master Code</label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Master Code" value="{{$client->code}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{$client->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="city">City Name</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City Name" value="{{$client->city}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Mobile Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" value="{{$client->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{$client->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{$client->status === 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$client->status === 0 ? 'selected' : ''}}>DisActive</option>
                                    </select>
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