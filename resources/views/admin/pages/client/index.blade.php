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
                <div class="col-xs-12">
                    @if (session()->has('message'))
                        <div class="alert alert-info text-center">
                            <h3>{{session()->get('message')}}</h3>
                        </div>
                    @endif
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th>SALES REPORT</th>
                                    <th>Action</th>
                                </tr>
                               @foreach($rows as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->created_at->format('Y-m-d')}}</td>
                                    <td><span class="label label-{{$row->status ? 'success':'danger'}}">{{$row->status_name}}</span></td>
                                    <td>{{$row->address}}</td>
                                    <td>
                                        <a href="{{route('admin.clients.show',$row->id)}}">
                                            <img src="{{asset('assets/admin/img/sales_report.png')}}" />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.clients.edit',$row->id)}}" class="btn btn-app">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
{{--                                        <a href="{{route('admin.clients.destroy',$row->id)}}" class="btn btn-app">--}}
{{--                                            <i class="fa fa-trash-o"></i> Edit--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>
                               @endforeach
                            </table>
                            {!! $rows->links() !!}
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->

    </aside><!-- /.right-side -->
@endsection