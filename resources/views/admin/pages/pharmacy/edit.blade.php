@extends('admin.layouts.master')

@section('title','pharmacies Page')

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
                <li class="active">pharmacies Page</li>
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
                        <form role="form" action="{{route('admin.pharmacies.update',$pharmacy->id)}}" method="post">
                            {{csrf_field()}}
                            @isset($pharmacy)
                                <input type="hidden" name="_method" value="PUT"/>
                            @endisset
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="FullName">name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$pharmacy->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{$pharmacy->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="{{$pharmacy->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="country">lat</label>
                                    <input type="text" class="form-control" id="lat" name="lat" placeholder="lat" value="{{$pharmacy->lat}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">lng</label>
                                    <input type="text" class="form-control" id="lng" name="lng" placeholder="lng" value="{{$pharmacy->lng}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">distance</label>
                                    <input type="text" class="form-control" id="distance" name="distance" placeholder="distance" value="{{$pharmacy->distance}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{$pharmacy->status === 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$pharmacy->status === 0 ? 'selected' : ''}}>DisActive</option>
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