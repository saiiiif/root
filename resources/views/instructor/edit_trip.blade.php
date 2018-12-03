@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Training Trip</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Edit Trip</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="{{url('/instructor/trips/create')}}"  class="btn btn-primary"><i class="fa fa-plus-square-o"></i> New Trip </a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Session Information </h5>
                                <div class="ibox-tools">

                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <p>Please fill all the fields</p>
                                        <form role="form" action="{{url ('instructor/trips/'.$trip->id)}}" method="post" >
                                            <input type="hidden" name="_method" value="PUT">

                                            @csrf
                                            <div class="form-group">
                                                <label>Trip Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Trip name" value="{{ $trip->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Prime amount</label>
                                                <input type="text" name="amount" class="form-control" placeholder="Prime amount" value="{{ $trip->prime_amount }}">
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Name of training" value="{{ old('title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Deposit + Hotel</label>
                                                <input type="text" name="deposit" class="form-control" placeholder="Deposit" value="{{ $trip->deposit }}">

                                            </div>




                                            <div class="form-group">
                                                <label class="control-label">Flight Ticket</label>
                                                <input type="text" name="ticket" class="form-control" placeholder="Flight Ticket" value="{{ $trip->ticket }}">
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">Total</label>
                                                <input type="text" name="total" value="{{ $trip->total }}" class="form-control" readonly>
                                            </div>

<hr>

                                            <div>
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                            </div>
                                    </div>






                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>























            @include('layouts.instructorLayout.instructor_footer')

        </div>




@endsection

