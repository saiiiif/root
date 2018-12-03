@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')

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
                                    <form role="form" action="{{url ('instructor/session/'.$event->id)}}" method="post" >
                                        <input type="hidden" name="_method" value="PUT">

                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label">Country :</label>
                                            <div class="controls">
                                                <select class="form-control" id="sel1" name="country" value="">
                                                    <option>{{$event->country}}</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Locator :</label>
                                            <div class="controls">
                                                <input type="text" name="locator" class="form-control" placeholder="Locator" value="{{$event->locator}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Title:</label>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control" placeholder="Name of training" value="{{$event->title}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Customer:</label>
                                            <div class="controls">
                                                <input type="text" name="customer" class="form-control" placeholder="Customer" value="{{$event->customer}}">
                                            </div>

                                        </div>




                                        <div class="form-group">
                                            <label class="control-label">Location:</label>
                                            <div class="controls">
                                                <input type="text" name="location" class="form-control" placeholder="Location" value="{{$event->location}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label">Start date :</label>
                                            <div class="controls">
                                                <input type="date" class="form-control" name="start_date" value="{{$event->start_date}}">
                                            </div>
                                        </div>





                                        <hr>

                                        <div>
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                        </div>


                                </div>
                                <div class="col-sm-6 b-r">
                                    <div class="form-group">
                                        <label class="control-label">End date :</label>
                                        <div class="controls">
                                            <input type="date" class="form-control" name="end_date" value="{{$event->end_date}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Delivery days :</label>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="delivery_days" value="{{$event->delivery_days}}">
                                        </div>
                                    </div>

                                </div>



                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @include('layouts.instructorLayout.instructor_footer')
    </div>
@endsection