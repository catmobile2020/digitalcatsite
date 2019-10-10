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
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Lat</th>
                                    <th>Lng</th>
                                    <th>distance</th>
                                    <th>SALES REPORT</th>
                                    <th>Action</th>
                                </tr>
                               @foreach($rows as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->created_at->format('Y-m-d h:i A')}}</td>
                                    <td><span class="label label-{{$row->status ? 'success':'danger'}}">{{$row->status_name}}</span></td>
                                    <td>{{$row->lat}}</td>
                                    <td>{{$row->lng}}</td>
                                    <td>{{$row->distance}}</td>
                                    <td>
                                        <a href="{{route('admin.pharmacies.show',$row->id)}}">
                                            <img src="{{asset('assets/admin/img/sales_report.png')}}" />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.pharmacies.edit',$row->id)}}" class="btn btn-app">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="{{route('admin.pharmacies.pharmacists',$row->id)}}" class="btn btn-app">
                                            <i class="fa fa-users"></i> Pharmacists
                                        </a>
{{--                                        <a href="{{route('admin.pharmacies.destroy',$row->id)}}" class="btn btn-app">--}}
{{--                                            <i class="fa fa-trash-o"></i> Delete--}}
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