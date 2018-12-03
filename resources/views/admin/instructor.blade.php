@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/instructor')}}">Instructor</a>  </div>
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
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Lists Instructors</h5>
            <a href="{{url('/admin/instructor/create')}}" class="label label-info"> Add new instructor </a>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Settings</th>
                </tr>
                </thead>
                <tbody>
                @foreach($instructors as $instructor)
                <tr class="gradeX">
                    <td>{{$instructor->first_name}}</td>
                    <td>{{$instructor->last_name}}</td>
                    <td>{{$instructor->email}}</td>
                    <td width="20%">

                        <form action="{{url('/admin/instructor/'.$instructor->id)}}" method="">
                            {{csrf_field()}}
                            {{method_field('Delete')}}
                            <a href="{{url('/admin/instructor/'.$instructor->id.'/edit')}}" class="btn btn-primary">Edit</a>
                            <button type="submit" data-toggle="modal" data-target="#details{{$instructor->id}}" class="btn btn-info">Details</button>

                            <button type="submit" id="delInstructor" class="btn btn-danger">Delete</button>

                        </form>

                        <div id="details{{$instructor->id}}" class="modal hide" aria-hidden="true" style="display: none;">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>{{$instructor->first_name}} {{ $instructor->last_name}}</h3>
                            </div>
                            <div class="modal-body">

                                <div class="widget-box">
                                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapseG3"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
                                        <h5>General Information</h5>
                                    </div>
                                    <div class="widget-content nopadding updates collapse out" id="collapseG3">
                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                            <div class="update-done"><a title="" href="#"><strong>First Name</strong></a> <span>{{$instructor->first_name}}</span> </div>
                                        </div>
                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                            <div class="update-done"><a title="" href="#"><strong>Last Name</strong></a> <span>{{$instructor->last_name}}</span> </div>
                                        </div>
                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                            <div class="update-done"><a title="" href="#"><strong>Email</strong></a> <span>{{$instructor->email}}</span> </div>
                                        </div>
                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                            <div class="update-done"><a title="" href="#"><strong>Title</strong></a> <span>{{$instructor->title}}</span> </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="widget-box">
                                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapseG4"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
                                        <h5>Specific Information</h5>
                                    </div>
                                    <div class="widget-content nopadding updates collapse out" id="collapseG4">
                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                            <div class="update-done"><a title="" href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></a> <span>dolor sit amet, consectetur adipiscing eli</span> </div>
                                            <div class="update-date"><span class="update-day">20</span>jan</div>
                                        </div>
                                        <div class="new-update clearfix"> <i class="icon-gift"></i> <span class="update-notice"> <a title="" href="#"><strong>Congratulation Maruti, Happy Birthday </strong></a> <span>many many happy returns of the day</span> </span> <span class="update-date"><span class="update-day">11</span>jan</span> </div>
                                        <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="" href="#"><strong>Maruti is a Responsive Admin theme</strong></a> <span>But already everything was solved. It will ...</span> </span> <span class="update-date"><span class="update-day">07</span>Jan</span> </div>
                                        <div class="new-update clearfix"> <i class="icon-leaf"></i> <span class="update-done"> <a title="" href="#"><strong>Envato approved Maruti Admin template</strong></a> <span>i am very happy to approved by TF</span> </span> <span class="update-date"><span class="update-day">05</span>jan</span> </div>
                                        <div class="new-update clearfix"> <i class="icon-question-sign"></i> <span class="update-notice"> <a title="" href="#"><strong>I am alwayse here if you have any question</strong></a> <span>we glad that you choose our template</span> </span> <span class="update-date"><span class="update-day">01</span>jan</span> </div>
                                    </div>


                                </div>

                            </div>
                        </div>












                    </td>


                </tr>
                @endforeach
                </tbody>
            </table>

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

@endsection

