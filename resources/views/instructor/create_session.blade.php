@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Ordre Mission</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Add New OM</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">

                <div class="row">
                    <form id="om_form" role="form" action="{{url ('instructor/session')}}" method="post" >

                                <div class="col-lg-6">

                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>OM Information </h5>
                                            <div class="ibox-tools"></div>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="row">
                                                <div class="col-sm-12 b-r">
                                                    <p class="bold">Please fill all the fields of your OM</p>
                                                        @csrf
                                                          <div class="form-group" >
                                                            <label class="control-label">ID </label>
                                                            <input type="text" class="form-control" name="om_id" value="{{ $pass }}"  readonly>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label">Start trip date </label>
                                                            <input type="date" class="form-control" name="start_trip_date" value="{{ old('start_trip_date') }}" required>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label">End trip date :</label>
                                                            <input type="date" class="form-control" name="end_trip_date" value="{{ old('end_trip_date') }}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Prime amount</label>
                                                            <input type="text" name="amount" class="form-control" placeholder="Prime amount" value="{{ old('amount') }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Formule</label>
                                                            <input type="text" name="formule" class="form-control" placeholder="Formule" value="{{ old('formule') }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Flight Ticket</label>
                                                            <input type="file" name="picture" class="form-control" accept="image/*">
                                                        </div>


                                                        <hr>

                                                        <div>
                                                        <button id="session_add" class="btn btn-success " type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add session</span></button>
                                                        <button id="om_submit" class="btn btn-primary pull-right " type="button"><i class="fa fa-save"></i>&nbsp;&nbsp;<span class="bold">Save</span></button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                <!--
                                    <div class="ibox float-e-margins border-bottom">
                                        <div class="ibox-title">
                                            <h5>Please fill session fields</h5>
                                            <div class="ibox-tools">
                                                <a class="collapse-link" href="#">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="close-link" href="#">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ibox-content" style="display: none;">

                                                <div class="form-group">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" name="name_session" class="form-control" placeholder="Name of training" value="{{ old('name_session') }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control m-b" id="sel1" name="country" value="{{ old('country') }}" required>
                                                        <option>Tunisia</option>
                                                        <option>French</option>
                                                        <option>belgium</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    <input type="text" name="locator" class="form-control" placeholder="Locator" value="{{ old('locator') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Customer</label>
                                                    <input type="text" name="customer" class="form-control" placeholder="Customer" value="{{ old('customer') }}">

                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Location</label>
                                                    <input type="text" name="location" class="form-control" placeholder="Location" value="{{ old('location') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Start training date </label>
                                                    <input type="date" class="form-control" id="TextBox1" name="start_training_date" value="{{ old('start_training_date') }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">End training date :</label>
                                                    <input type="date" class="form-control" id="TextBox2" onblur="myFunction()"   name="end_training_date" value="{{ old('end_training_date') }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Delivery Days</label>
                                                    <input type="text" name="delivery_days" id="TextBox3"  class="form-control"  readonly>

                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Optional : Hotel name & Contact</label>
                                                    <textarea type="text" name="hotel_name" class="form-control" required></textarea>
                                                </div>

                                                <div>
                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                                </div>

                                        </div>

                                    </div>
                                -->
                                </div>
                    </form>

                </div>
                    <!--
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
                                            <form role="form" action="{{url ('instructor/session')}}" method="post" >
                                                @csrf
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control m-b" id="sel1" name="country" value="{{ old('country') }}">
                                                        <option>Tunisia</option>
                                                        <option>French</option>
                                                        <option>belgium</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Locator :</label>
                                                    <input type="text" name="locator" class="form-control" placeholder="Locator" value="{{ old('locator') }}">
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Name of training" value="{{ old('title') }}">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Customer</label>
                                                    <input type="text" name="customer" class="form-control" placeholder="Customer" value="{{ old('customer') }}">

                                                </div>




                                                <div class="form-group">
                                                    <label class="control-label">Location</label>
                                                    <input type="text" name="location" class="form-control" placeholder="Location" value="{{ old('location') }}">
                                                </div>
                                                <hr>

                                                <div>
                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                                </div>
                                        </div>
                                        <div class="col-sm-6"><h4>Please fill all the fields

                                            </h4>
                                            <div class="form-group">
                                                <label class="control-label">Start date </label>
                                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">End date :</label>
                                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">Delivery days :</label>
                                                <input type="number" class="form-control" name="delivery_days" value="{{ old('delivery_days') }}">
                                            </div>




                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->

                </div>























                @include('layouts.instructorLayout.instructor_footer')

            </div>




@endsection
