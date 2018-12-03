@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/settings')}}">Settings</a> <a href="#" class="current">Update profile</a> </div>
        </div>
        <!--End-breadcrumbs-->
        @if(Session::has('flash_message_error'))

            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))

            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif

<div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{url('/admin/profile/update-profile')}}" method="post" class="form-horizontal"> {{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">First Name :</label>
                        <div class="controls">
                            <input type="text" class="span3" value="{{Auth::user()->name}}" name="first_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Last Name :</label>
                        <div class="controls">
                            <input type="text" class="span3" value=" {{Auth::user()->last_name}}" name="last_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email:</label>
                        <div class="controls">
                            <input type="text" class="span3" value=" {{Auth::user()->email}} " name="email">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Company info :</label>
                        <div class="controls">
                            <input type="text" class="span3" value="{{Auth::user()->company}}" name="company">
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>






    </div>
    </div>
</div>

    </div>
@endsection

