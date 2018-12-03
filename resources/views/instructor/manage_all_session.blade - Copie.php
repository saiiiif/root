@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Training Sessions</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">Dashboard</a>
                        </li>
                        <li class="active">
                            <strong>Manage Session</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="{{url('/instructor/session/create')}}"  class="btn btn-primary"><i class="fa fa-plus-square-o"></i> New Session </a>
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
                        <h5>Sessions Lists</h5>

                    </div>
                    <div class="ibox-content no-padding">

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Session title</th>
                                <th>Country</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($events as $event)

                                <tr class="gradeX">
                                    <td><strong>{{$event->title}}</strong> <br> {{ $event->user->name }}</td>
                                    <td>{{$event->country}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->end_date}}</td>
                                    <td width="20%">

                                        <form action="{{url('/instructor/session/delete/'.$event->id)}}" >
                                            {{csrf_field()}}
                                            {{method_field('Delete')}}
                                            <a href="{{url('/instructor/session/'.$event->id.'/edit_session')}}" class="btn btn-primary">Edit</a>
                                            <button type="button" data-toggle="modal" data-target="#details{{$event->id}}" class="btn btn-info">Details</button>

                                            <button type="submit" id="delInstructor" class="btn btn-danger">Delete</button>


                                        </form>
                                        <br>

                                        <div id="details{{$event->id}}" class="modal hide" aria-hidden="true" style="display: none;">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">×</button>
                                                <h3>{{$event->title}} </h3>
                                            </div>
                                            <div class="modal-body">

                                                <div class="widget-box">
                                                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapse{{$event->id}}"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
                                                        <h5>General Information</h5>
                                                    </div>
                                                    <div class="widget-content nopadding updates collapse out" id="collapse{{$event->id}}">
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Session Title</strong></a> <span>{{$event->title}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Country</strong></a> <span>{{$event->country}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Locator</strong></a> <span>{{$event->locator}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Customer</strong></a> <span>{{$event->customer}}</span> </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="widget-box">
                                                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapse{{ $event->id + 5555}}"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
                                                        <h5>Specific Information</h5>
                                                    </div>
                                                    <div class="widget-content nopadding updates collapse out" id="collapse{{$event->id + 5555}}">
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Start Date.</strong></a> <span>{{$event->start_date}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>End Date.</strong></a> <span>{{$event->end_date}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Delivery Days</strong></a> <span>{{$event->delivery_days}}</span> </div>
                                                        </div>
                                                    </div>




                                                </div>

                                            </div>
                                        </div>


                                    </td>


                                </tr>

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
    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();
                }
                // else, send page to designated URL
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
    </script>

            @include('layouts.instructorLayout.instructor_footer')
        </div>
@endsection
