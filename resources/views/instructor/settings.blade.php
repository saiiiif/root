@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Order-Mission</h5>
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
                                    <form class="form-horizontal" method="post" action="{{url('/settings/update-pwd')}}" name="password_validate"
                                          id="password_validate" novalidate="novalidate"> {{csrf_field()}}
                                        <div class="control-group">
                                            <label class="control-label">Current Password</label>
                                            <div class="controls">
                                                <input type="password" name="current_pwd" id="current_pwd" />
                                                <span id="chkPwd"></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">New Password</label>
                                            <div class="controls">
                                                <input type="password" name="new_pwd" id="new_pwd" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Confirm Password</label>
                                            <div class="controls">
                                                <input type="password" name="confirm_pwd" id="confirm_pwd" />
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>

                                        <div class="form-actions">
                                            <input type="submit" value="Update Password" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

    @include('layouts.instructorLayout.instructor_footer')
    </div>
@endsection
