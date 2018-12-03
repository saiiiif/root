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
                                <h5>Profile Information <small>{{Auth::user()->name . Auth::user()->last_name}}</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <p>You can update your information</p>
                                        <form role="form" action="{{url('/instructor/profile/update-profile')}}" method="post" >
                                            @csrf
                                            <div class="form-group"><label>First Name</label> <input type="text" value=" {{Auth::user()->name}} " name="name" class="form-control"></div>
                                            <div class="form-group"><label>Last Name</label> <input type="text" value=" {{Auth::user()->last_name}} " name="last_name" class="form-control"></div>
                                            <div class="form-group"><label>Email</label> <input type="email" value=" {{Auth::user()->email}} " name="email" class="form-control"></div>
                                            <div class="form-group"><label>Company</label> <input type="email" value=" {{Auth::user()->company}} " name="company" class="form-control" readonly></div>
                                            <div>
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><label>Passport Number</label> <input type="text" value=" {{Auth::user()->passport_number}} " name="passport_number" class="form-control"></div>
                                        <div class="form-group"><label>Passport Validation</label> <input type="text" value=" {{Auth::user()->passport_validation}} " name="passport_validation" class="form-control"></div>
                                        <div class="form-group"><label>Title</label> <input type="text" value=" {{Auth::user()->title}} " name="title" class="form-control" readonly></div>
                                        <div class="form-group"><label>Grade</label> <input type="text" value=" {{Auth::user()->grade}} " name="grade" class="form-control" readonly></div>

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

