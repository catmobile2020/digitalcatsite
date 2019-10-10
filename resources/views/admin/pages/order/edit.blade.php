@extends('admin.layouts.master')

@section('title','orders Page')

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
                <li class="active">orders Page</li>
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
                        <form role="form" action="{{route('admin.orders.update',$order->id)}}" method="post">
                            {{csrf_field()}}
                            @isset($order)
                                <input type="hidden" name="_method" value="PUT"/>
                            @endisset
                            <div class="box-body">
                                @if ($order->confirmation_code and $order->activated == false)
                                    <div class="form-group">
                                        <label for="confirmation_code">Verification Code</label>
                                        <input type="text" class="form-control" id="confirmation_code" placeholder="Verification Code" name="confirmation_code">
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="client_code">Client Code</label>
                                    <input type="text" class="form-control" id="client_code" placeholder="Client Code" value="{{$order->client->code}}" name="client_code" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="order_number">Order Number</label>
                                    <input type="text" class="form-control" id="order_number" placeholder="Order Number" name="order_number" value="{{$order->order_number}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comments</label>
                                    <textarea class="form-control" id="comment" name="comment" placeholder="Comments">{{$order->comment}}</textarea>
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