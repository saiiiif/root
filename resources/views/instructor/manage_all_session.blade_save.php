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
                            <strong>Manage OM</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="{{url('/instructor/session/create')}}"  class="btn btn-primary"><i class="fa fa-plus-square-o"></i> New OM </a>
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
                    @foreach($omList as $event)

                        <div class="ibox float-e-margins  border-bottom">
                            <div class="ibox-title">
                                <small> &nbsp;OM ID :</small>
                                {{ $omid = $event->om_id }} - 
                                <strong> {{$event->user->name}}</strong>
                                @if(!strcmp($event->status,"Valide by DAF"))
                                <span class="label label-primary">{{ ucfirst($event->status) }}</span>
                                @elseif(!strcmp($event->status,"Valide by manager"))
                                <span class="label label-warning">{{ ucfirst($event->status) }}</span>
                                @else
                                <span class="label label-success">{{ ucfirst($event->status) }}</span>
                                @endif
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="display:none;">
                            <button type="button" data-toggle="modal" data-target="#om_{{$event->om_id}}" class="btn btn-info">Details</button>

                                <div class="modal inmodal" id="om_{{$event->om_id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated fadeIn">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                <i class="fa fa-newspaper-o modal-icon"></i>
                                                <h4 class="modal-title">{{$event->om_id}}</h4>
                                                <small>Created by {{ ucfirst($event->user->name) }}</small>
                                            </div>
                                            <div class="modal-body">
                                                <div class="client-detail">

                                                            <strong>OM Information</strong>

                                                            <ul class="list-group clear-list">
                                                                <li class="list-group-item fist-item">
                                                                    @if(!strcmp($event->status,"Valide by DAF"))
                                                                    <span class="pull-right label label-primary">{{ ucfirst($event->status) }}</span>
                                                                    @elseif(!strcmp($event->status,"Valide by manager"))
                                                                    <span class="pull-right label label-warning">{{ ucfirst($event->status) }}</span>
                                                                    @else
                                                                    <span class="pull-right label label-success">{{ ucfirst($event->status) }}</span>
                                                                    @endif
                                                                    Status
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <span class="pull-right"> {{ ucfirst($event->start_date) }} </span>
                                                                    Start Date
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <span class="pull-right"> {{ ucfirst($event->end_date) }} </span>
                                                                    End Date
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <span class="pull-right"> {{ ucfirst($event->prime_amount) }} €</span>
                                                                    Prime amount
                                                                </li>
                                                            </ul>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input hidden value="{{$event->id}}" name="id" class="tripId"/>
                                                @if(!strcmp($event->user->title,"DAF") && !strcmp($event->status,"Valide by manager")  ||  !strcmp($event->user->title,"Manager") && !strcmp($event->status,"planned"))
                                                <a href="" type="button" class="btn btn-success validate" >Valider</a>
                                                @endif
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover no-margins">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Locator</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Delivery Days</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($om as $event)
                                        @if($omid == $event->om_id)
                                        <tr>
                                            <td><span class="label">{{ ucfirst($event->title) }}</span></td>
                                            <td><i class="fa fa-clock-o"></i> {{ ucfirst($event->start_date) }}</td>
                                            <td><i class="fa fa-clock-o"></i> {{ ucfirst($event->end_date) }}</td>
                                            <td class=""> <i class="fa fa-map-marker"></i> {{ ucfirst($event->locator) }} </td>
                                            <td class=""> <i class="fa fa-id-card-o"></i> {{ ucfirst($event->customer) }} </td>
                                            <td class=""> <i class="fa fa-map-marker"></i> {{ ucfirst($event->location) }} </td>
                                            <td class="text-navy"> <i class="fa fa-level-up"></i> {{ ucfirst($event->delivery_days) }} </td>
                                        </tr>
                                        @endif
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                 @endforeach

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
