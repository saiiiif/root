@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Sessions</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">386,200</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Completed Sessions</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Monthly</span>
                                <h5>Trips</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">80,800</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Validated Trips</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Monthly</span>
                                <h5>Pdc Requests</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="no-margins">406,42</h1>
                                        <div class="font-bold text-navy">44% <i class="fa fa-level-up"></i> <small>Pdc Request</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="no-margins">206,12</h1>
                                        <div class="font-bold text-navy">22% <i class="fa fa-level-up"></i> <small>Missing Pdc</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Monthly income</h5>
                                <div class="ibox-tools">
                                    <span class="label label-primary">Updated 08.2018</span>
                                </div>
                            </div>
                            <div class="ibox-content no-padding">
                                <div class="flot-chart m-t-lg" style="height: 55px;">
                                    <div class="flot-chart-content" id="flot-chart1" style="padding: 0px; position: relative;"><canvas class="flot-base" width="495" height="68" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 396.388px; height: 55px;"></canvas><canvas class="flot-overlay" width="495" height="68" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 396.388px; height: 55px;"></canvas></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                        <span class="pull-right text-right">
                                        <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                            <br>
                                            All sales: 162,862
                                        </span>
                                    <h3 class="font-bold no-margins">
                                        Half-year revenue margin
                                    </h3>
                                    <small>Sales marketing.</small>
                                </div>

                                <div class="m-t-sm">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                                <canvas id="lineChart" height="242" width="640" style="display: block; width: 512px; height: 194px;"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="stat-list m-t-lg">
                                                <li>
                                                    <h2 class="no-margins">2,346</h2>
                                                    <small>Total orders in period</small>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 48%;"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h2 class="no-margins ">4,422</h2>
                                                    <small>Orders in last month</small>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 60%;"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on 16.07.2015
                                    </small>
                                    <small>
                                        <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-warning pull-right">Data has changed</span>
                                <h5>User activity</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <small class="stats-label">Pages / Visit</small>
                                        <h4>236 321.80</h4>
                                    </div>

                                    <div class="col-xs-4">
                                        <small class="stats-label">% New Visits</small>
                                        <h4>46.11%</h4>
                                    </div>
                                    <div class="col-xs-4">
                                        <small class="stats-label">Last week</small>
                                        <h4>432.021</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <small class="stats-label">Pages / Visit</small>
                                        <h4>643 321.10</h4>
                                    </div>

                                    <div class="col-xs-4">
                                        <small class="stats-label">% New Visits</small>
                                        <h4>92.43%</h4>
                                    </div>
                                    <div class="col-xs-4">
                                        <small class="stats-label">Last week</small>
                                        <h4>564.554</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <small class="stats-label">Pages / Visit</small>
                                        <h4>436 547.20</h4>
                                    </div>

                                    <div class="col-xs-4">
                                        <small class="stats-label">% New Visits</small>
                                        <h4>150.23%</h4>
                                    </div>
                                    <div class="col-xs-4">
                                        <small class="stats-label">Last week</small>
                                        <h4>124.990</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>














                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{{ $event->title }} </h5> <small> &nbsp;Session Information</small>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover no-margins">
                                    <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Locator</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Delivery Days</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><span class="label label-success">{{ ucfirst($event->status) }}</span></td>
                                        <td><i class="fa fa-clock-o"></i> {{ ucfirst($event->start_date) }}</td>
                                        <td><i class="fa fa-clock-o"></i> {{ ucfirst($event->end_date) }}</td>
                                        <td class=""> <i class="fa fa-map-marker"></i> {{ ucfirst($event->locator) }} </td>
                                        <td class=""> <i class="fa fa-id-card-o"></i> {{ ucfirst($event->customer) }} </td>
                                        <td class=""> <i class="fa fa-map-marker"></i> {{ ucfirst($event->location) }} </td>
                                        <td class="text-navy"> <i class="fa fa-level-up"></i> {{ ucfirst($event->delivery_days) }} </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">


                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Training Trip</h5>
                                <div class="ibox-tools">
                                    <a href="{{url('/instructor/trips/create')}}" class="btn btn-primary"> Add New Trip </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="html5buttons"><div class="dt-buttons btn-group"></div> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="DataTables_Table_0_filter" class="dataTables_filter"></div><table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                            <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 209.8px;">Trip Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260.2px;">Prime Amount</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 234.6px;">Flight Ticket</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 180.2px;">Deposit</th></tr>
                                            </thead>
                                            <tbody>


                                            @foreach($event->trip as $trip)
                                                <tr class="gradeA odd" role="row">
                                                    <td class="sorting_1">{{$trip->name}}</td>
                                                    <td>{{$trip->prime_amount}}</td>
                                                    <td>{{$trip->deposit}}</td>
                                                    <td class="center">{{$trip->ticket}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Order Mission</h5>
                                <div class="ibox-tools">
                                    <a href="{{url('/instructor/create')}}" class="btn btn-primary"> Add new OM </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="html5buttons"><div class="dt-buttons btn-group"></div> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="DataTables_Table_0_filter" class="dataTables_filter"></div><table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                            <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 209.8px;">Training Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 260.2px;">Country</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 234.6px;">City</th></tr>
                                            </thead>
                                            <tbody>

                                            @foreach($event->oms as $om)
                                                <tr class="gradeA odd" role="row">
                                                    <td class="sorting_1">{{$om->title}}</td>
                                                    <td>{{$om->country}}</td>
                                                    <td>{{$om->city}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Reciept</h5>
                                <div class="ibox-tools">
                                    <a href="{{url('/instructor/pdc/create_pdc/'.$event->id)}}" class="btn btn-primary  btn-sm"> Add Reciept </a>

                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
                                </div>

                                <div class="new-update clearfix">

                                    <textarea style="width: 100%" rows="5"></textarea><br>
                                    <div class="pull-right">
                                        Sub Total 1 : <input type="text" class="form-control" id="a1" value="{{ $count }}" readonly>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Missing Reciept</h5>
                                <div class="ibox-tools">
                                    <a href="{{url('/instructor/pdc/create_missing_pdc/'.$event->id)}}" class="btn btn-primary btn-sm"> Add Missing Reciept </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
                                </div>
                                <div class="new-update clearfix">
                                    <textarea style="width: 100%" rows="5"></textarea><br>
                                    <div class="pull-right">
                                        Sub Total 2 : <input type="text" class="form-control" id="a2"  value="{{ $count_missing }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" pull-right">
                            Total : <input type="text" class="form-control" id="a3" value="{{ $count + $count_missing }}" readonly><br>
                            <a href="{{url('/instructor/pdc/create/'.$event->id)}}" class="btn btn-success btn-block">Generate Pdc</a>
                        </div>
                    </div>
                -->
                </div>







        @include('layouts.instructorLayout.instructor_footer')

    </div>





@endsection
