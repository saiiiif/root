@extends('layouts.instructorLayout.instructor_design')
@section('content')


    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/instructor')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
        </div>
        <!--End-breadcrumbs-->
        @if(count($errors))

            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <ul>
                    @foreach($errors->all() as $message)
                        <li><strong>{{$message}}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>To Do List</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Opts</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="taskDesc"><i class="icon-info-sign"></i> Making The New Suit</td>
                                <td class="taskStatus"><span class="in-progress">in progress</span></td>
                                <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr>
                                <td class="taskDesc"><i class="icon-plus-sign"></i> Luanch My New Site</td>
                                <td class="taskStatus"><span class="pending">pending</span></td>
                                <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                            </tr>
                            <tr>
                                <td class="taskDesc"><i class="icon-ok-sign"></i> Maruti Excellant Theme</td>
                                <td class="taskStatus"><span class="done">done</span></td>
                                <td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a> <a href="#" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--end-main-container-part-->
