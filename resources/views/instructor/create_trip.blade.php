@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')

            <div class="wrapper wrapper-content">


                <div class="row">
                    <div class="col-lg-7">
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
                                        <form role="form" action="{{url ('instructor/trips/store')}}" method="post" >
                                            @csrf
                                            <div class="form-group">
                                                <label>Trip Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Trip name" value="{{ old('name') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Prime amount</label>
                                                <input type="text" name="amount" class="form-control" placeholder="Prime amount" value="{{ old('amount') }}" required>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <select class="form-control" id="sel1" name="title" >
                                                    @foreach( $events as $event)
                                                        <option value="{{$event->id}}">{{$event->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Deposit + Hotel</label>
                                                <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="text" name="deposit" class="form-control" required> <span class="input-group-addon">.00</span></div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label">Flight Ticket</label>
                                                <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="text" name="ticket" class="form-control" required> <span class="input-group-addon">.00</span></div>                                            </div>



                                            <div class="hr-line-dashed"></div>



                                            <div>
                                                <button class="btn btn-primary pull-right m-t-n-xs"  type="submit"><strong>Save</strong></button>
                                                <a href="javascript:history.back()" class="btn btn-white pull-right m-t-n-xs " style="margin-right: 10px"  type="button">Cancel</a>
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

