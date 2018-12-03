@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-success pull-right">Monthly</span>
                            <h5>Income</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">40 886,200</h1>
                            <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                            <small>Total income</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right">Annual</span>
                            <h5>Orders</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">275,800</h1>
                            <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                            <small>New orders</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Today</span>
                            <h5>visits</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">106,120</h1>
                            <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                            <small>New visits</small>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-danger pull-right">Low value</span>
                            <h5>User activity</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">80,600</h1>
                            <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                            <small>In first month</small>
                        </div>
                    </div>
                </div>
        @foreach($events as $event)

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ $event->title }}</h5>  <small>&nbsp; Pdc's History </small>
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

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Locator</th>
                                <th>Currency</th>
                                <th>Date</th>
                                <th>Payement</th>
                                <th>Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($event->pdc as $pdc)
                            <tr class="gradeX">
                                    <td><small>{{$event->status}}</small></td>
                                    <td>{{$pdc->locator}}</td>
                                    <td>{{$pdc->currency}}</td>
                                    <td>{{$pdc->date}}</td>
                                    <td>{{$pdc->payement}}</td>
                                    <td width="20%">

                                        <form action="{{url('/instructor/pdc/delete/'.$pdc->id)}}" >
                                            {{csrf_field()}}
                                            {{method_field('Delete')}}
                                            <a href="{{url('/instructor/pdc/'.$pdc->id.'/edit_pdc')}}" class="btn btn-primary">Edit</a>
                                            <button type="submit" data-toggle="modal" data-target="#details{{$pdc->id}}" class="btn btn-info">Details</button>

                                            <button type="submit" id="delInstructor" class="btn btn-danger">Delete</button>

                                        </form>

                                        <div id="details{{$pdc->id}}" class="modal hide" aria-hidden="true" style="display: none;">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">×</button>
                                                <h3>{{$pdc->locator}} </h3>
                                            </div>
                                            <div class="modal-body">

                                                <div class="widget-box">
                                                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapse{{$pdc->id}}"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
                                                        <h5>General Information</h5>
                                                    </div>
                                                    <div class="widget-content nopadding updates collapse out" id="collapse{{$pdc->id}}">
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Title</strong></a> <span>{{$pdc->title}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Locator</strong></a> <span>{{$pdc->locator}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Currency</strong></a> <span>{{$pdc->currency}}</span> </div>
                                                        </div>
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Amount</strong></a> <span>{{$pdc->amount}}</span> </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="widget-box">
                                                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapse{{ $pdc->id + 5555}}"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
                                                        <h5>Specific Information</h5>
                                                    </div>
                                                    <div class="widget-content nopadding updates collapse out" id="collapse{{$pdc->id + 5555}}">
                                                        <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                                                            <div class="update-done"><a title="" href="#"><strong>Date.</strong></a> <span>{{$pdc->date}}</span> </div>
                                                        </div>

                                                    </div>



                                                </div>

                                            </div>
                                        </div>


                                    </td>

@endforeach
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
                @endforeach




            </div>

        </div>
            </div>

    @include('layouts.instructorLayout.instructor_footer')
    </div>
@endsection

