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
                <h3>{{$pharmacy->name}} : Pharmacists</h3>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>country</th>
                                    <th>phone</th>
                                    <th>address</th>
                                    <th>status</th>
                                    <th>Created At</th>
                                </tr>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->username}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->country}}</td>
                                        <td>{{$member->phone}}</td>
                                        <td>{{$member->address}}</td>
                                        <td><span class="label label-{{$member->status ? 'success':'danger'}}">{{$member->status_name}}</span></td>
                                        <td>{{$member->created_at->format('Y-m-d')}}</td>
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