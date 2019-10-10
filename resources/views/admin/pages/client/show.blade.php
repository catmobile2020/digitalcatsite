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
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Pharmacy Member Name</th>
                                    <th>order number</th>
                                    <th>comment</th>
                                    <th>has free</th>
                                    <th>activated</th>
                                    <th>ORDER DATE</th>
                                </tr>
                               @foreach($rows as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->order_number}}</td>
                                    <td>{{$row->comment}}</td>
                                   <td>
                                       <img src="{{$row->has_free_photo}}" />
                                   </td>
                                    <td><span class="label label-{{$row->activated ? 'success':'danger'}}">{{$row->activated ? 'Yes' : 'No'}}</span></td>
                                    <td>{{$row->created_at->format('Y-m-d h:i A')}}</td>
                                </tr>
                               @endforeach
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->

    </aside><!-- /.right-side -->
@endsection