@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Trips</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Manage Trips</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="{{url('/instructor/trips/create')}}"  class="btn btn-primary"><i class="fa fa-plus-square-o"></i> New Trip </a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">

            <style>
                .client-detail {
                    position: relative;
                    height: 100%;
                }
            </style>





            @foreach($events as $event)
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>{{ $event->title }}</h5>  <small>&nbsp; Trip's History </small>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                               
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>



                        <div class="ibox-content">

                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Trip Name</th>
                                    <th>Deposit</th>
                                    <th>Flight Ticket</th>
                                    <th>Total</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($event->trip as $trip)
                                    <tr class="gradeX">
                                        <td>{{$trip->name}} </td>
                                        <td>{{$trip->deposit}}</td>
                                        <td>{{$trip->ticket}}</td>
                                        <td>{{$trip->total}}</td>

                                        <td width="20%">

                                            <form action="{{url('/instructor/trips/delete/'.$trip->id)}}" >
                                                {{csrf_field()}}
                                                {{method_field('Delete')}}
                                                <a href="{{url('/instructor/trips/'.$trip->id.'/edit_trip')}}" class="btn btn-primary">Edit</a>
                                                <button type="button" data-toggle="modal" data-target="#details{{$trip->id}}" class="btn btn-info">Details</button>

                                                <button type="submit" id="delInstructor" class="btn btn-danger">Delete</button>

                                            </form>

                                            <div class="modal inmodal" id="details{{$trip->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated fadeIn">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                            <i class="fa fa-paper-plane modal-icon"></i>
                                                            <h4 class="modal-title">{{$trip->name}}</h4>
                                                            <small>Created by {{ ucfirst($trip->user->name) }}</small>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="client-detail">

                                                                <strong>Trip Information</strong>

                                                                <ul class="list-group clear-list">
                                                                    <li class="list-group-item fist-item">
                                                                        <span class="pull-right"> {{ ucfirst($trip->name) }} </span>
                                                                        Name
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <span class="pull-right"> {{ ucfirst($trip->prime_amount) }} </span>
                                                                        Prime Amount
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <span class="pull-right"> {{ ucfirst($trip->deposit) }} </span>
                                                                        Deposit
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <span class="pull-right"> {{ ucfirst($trip->ticket) }} </span>
                                                                        Flight Ticket
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <span class="pull-right"> {{ ucfirst($trip->total) }} </span>
                                                                        Total
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

                                        </td>

                                    @endforeach
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
</div>
                @endforeach
            </div>



























    @include('layouts.instructorLayout.instructor_footer')

</div>
@endsection

