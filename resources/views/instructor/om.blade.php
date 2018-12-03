@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Order Mission</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Manage Order Mission</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="{{url('/instructor/create')}}"  class="btn btn-primary"><i class="fa fa-plus-square-o"></i> New OM </a>
                    </div>
                </div>
            </div>

            <style>
                .client-detail {
                    position: relative;
                    height: 100%;
                }
            </style>
            <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Oreder Missions Lists</h5>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">

                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Training title</th>
                        <th>Country</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Settings</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($oms as $om)
                        <tr class="gradeX">
                            <td><strong>{{$om->title}}</strong> <br> {{ $om->user->name }}</td>
                            <td>{{$om->country}}</td>
                            <td>{{$om->start_date}}</td>
                            <td>{{$om->end_date}}</td>
                            <td width="20%">

                                <form action="{{url('/instructor/delete/'.$om->id)}}" >
                                    {{csrf_field()}}
                                    {{method_field('Delete')}}
                                    <a href="{{url('/instructor/'.$om->id.'/edit_om')}}" class="btn btn-primary">Edit</a>
                                    <button type="button" data-toggle="modal" data-target="#details{{$om->id}}" class="btn btn-info">Details</button>

                                    <button type="submit" id="delInstructor" class="btn btn-danger">Delete</button>

                                </form>

                            </td>
                        </tr>
                        <div class="modal inmodal" id="details{{$om->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content animated fadeIn">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <i class="fa fa-handshake-o modal-icon"></i>
                                        <h4 class="modal-title">{{$om->title}}</h4>
                                        <small>Created by {{ ucfirst($om->user->name) }}</small>
                                    </div>
                                    <div class="modal-body">
                                        <div class="client-detail">

                                            <strong>Order Mission Information</strong>

                                            <ul class="list-group clear-list">
                                                <li class="list-group-item fist-item">
                                                    <span class="pull-right"> {{ ucfirst($om->country) }} </span>
                                                    Country
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> {{ ucfirst($om->city) }} </span>
                                                    City
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> {{ ucfirst($om->extra_amount) }} </span>
                                                    Amount
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> {{ ucfirst($om->modif_ex_amount) }} </span>
                                                    Extra Amount
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> {{ ucfirst($om->start_date) }} </span>
                                                    Start Date
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="pull-right"> {{ ucfirst($om->end_date) }} </span>
                                                    End Date
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
            </div>
            </div>
                @include('layouts.instructorLayout.instructor_footer')
@endsection
