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
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>ACTIVATED</th>
                                    <th>Created At</th>
                                    <th>CLIENT CODE	</th>
                                    <th>CLIENT NAME	</th>
                                    <th>Pharmacist NAME	</th>
                                    <th>PURCHASE TYPE</th>
                                    <th>Action</th>
                                </tr>
                               @foreach($rows as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><span class="label label-{{$row->activated ? 'success':'danger'}}">{{$row->activated ? 'Yes' : 'No'}}</span></td>
                                    <td>{{$row->created_at->format('Y-m-d h:i A')}}</td>
                                    <td>{{$row->client->code}}</td>
                                    <td>{{$row->client->name}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>
                                        <img src="{{$row->has_free_photo}}" />
                                    </td>
                                    <td>
                                        <a href="{{route('admin.orders.edit',$row->id)}}" class="btn btn-app">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
{{--                                        <a href="{{route('admin.orders.destroy',$row->id)}}" class="btn btn-app">--}}
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