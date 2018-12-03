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


}
</style>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="col-lg-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Order Missions Lists</h5>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">
                        <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Creator</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Prime amount</th>
                                    <th>Formule</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($omList as $event)

                                <tr>
                                        <td>{{ $omid = $event->om_id }}</td>
                                        <td>{{$event->user->name}}</td>
                                        <td>
                                                @if(!strcmp($event->status,"Valide by DAF"))
                                                <span class="label label-primary">{{ ucfirst($event->status) }}</span>
                                                @elseif(!strcmp($event->status,"Valide by manager"))
                                                <span class="label label-warning">{{ ucfirst($event->status) }}</span>
                                                @else
                                                <span class="label label-success">{{ ucfirst($event->status) }}</span>
                                                @endif
                                        </td>
                                        <td><i class="fa fa-clock-o"></i>  {{ ucfirst($event->start_date) }}</td>
                                        <td><i class="fa fa-clock-o"></i> {{ ucfirst($event->end_date) }}</td>
                                        <td class=""> {{ ucfirst($event->prime_amount) }} € </td>
                                        <td>{{ ucfirst($event->formule) }}</td>
                                        <td>
                                        <button type="button" data-toggle="modal" data-target="#om_{{$event->om_id}}" class="btn btn-info">
                                        </button>

                                        <div class="modal inmodal" id="om_{{$event->om_id}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">

                                            <div class="modal-dialog" style="width:1000px;">
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
                                                            <table class="table table-hover no-margins">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Status</th>
                                                                        <th>Start Date</th>
                                                                        <th>End Date</th>
                                                                        <th>Prime amount</th>
                                                                        <th>Formule</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                            <td>
                                                                                    @if(!strcmp($event->status,"Valide by DAF"))
                                                                                    <span class="label label-primary">{{ ucfirst($event->status) }}</span>
                                                                                    @elseif(!strcmp($event->status,"Valide by manager"))
                                                                                    <span class="label label-warning">{{ ucfirst($event->status) }}</span>
                                                                                    @else
                                                                                    <span class="label label-success">{{ ucfirst($event->status) }}</span>
                                                                                    @endif
                                                                            </td>
                                                                            <td><i class="fa fa-clock-o"></i>  {{ ucfirst($event->start_date) }}</td>
                                                                            <td><i class="fa fa-clock-o"></i> {{ ucfirst($event->end_date) }}</td>
                                                                            <td class=""> {{ ucfirst($event->prime_amount) }} € </td>
                                                                            <td>{{ ucfirst($event->formule) }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                            </table>
                                                                <hr />
                                                                <strong>Sessions informations</strong>
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
                                                                            <th>PDC</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($om as $even)
                                                                        @if($omid == $even->om_id)
                                                                        <tr>
                                                                            <td><span class="label">{{ ucfirst($even->title) }}</span></td>
                                                                            <td><i class="fa fa-clock-o"></i> {{ ucfirst($even->start_date) }}</td>
                                                                            <td><i class="fa fa-clock-o"></i> {{ ucfirst($even->end_date) }}</td>
                                                                            <td class=""> <i class="fa fa-map-marker"></i> {{ ucfirst($even->locator) }} </td>
                                                                            <td class=""> <i class="fa fa-id-card-o"></i> {{ ucfirst($even->customer) }} </td>
                                                                            <td class=""> <i class="fa fa-map-marker"></i> {{ ucfirst($even->location) }} </td>
                                                                            <td class="text-navy"> <i class="fa fa-level-up"></i> {{ ucfirst($even->delivery_days) }} </td>
                                                                           <!-- <form action="{{url('/instructor/pdc/uploads/')}}" method="post" enctype="multipart/form-data">-->
                                                                                <td class="md-2 pdc">
                                                                                <!--
                                                                                <?php $e= 0; ?>
                                                                                @if(count($sessions) != 0 )
                                                                                    @foreach($sessions as $session)
                                                                                        ****{{$session->events_id}} {{$even->id}}***
                                                                                        @if($even->id == $session->events_id)
                                                                                            <a href="{{url($session->attach_file)}}"><img src="{{url($session->attach_file)}}" style="width:50px"/></a>
                                                                                            <?php $e = 1; ?>

                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                                @if(count($sessions) == 0 || $e == 0)
                                                                                    <input type="file" class="form-control" name="photos[]" multiple />
                                                                                @endif-->
                                                                                    <button type="button" data-toggle="modal" data-target="#pdc_{{$even->id}}" class="btn btn-info">Add PDC</button>

                                                                                    <div class="modal" id="pdc_{{$even->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <div class="modal-dialog" style="width: 960px;">

                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                                                                                                        <h4 class="modal-title" id="upload-avatar-title">Add PDC</h4>
                                                                                                    </div>
                                                                                                    <div class="modal-body">

                                                                                                        <form class="pdcForm">
                                                                                                            @csrf
                                                                                                            <table class="table table-hover no-margins">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th>Label</th>
                                                                                                                        <th>Amount</th>
                                                                                                                        <th>Currency</th>
                                                                                                                        <th>Type de frais</th>
                                                                                                                        <th>Preuve</th>
                                                                                                                        <th>Pay</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td>
                                                                                                                        <input hidden value="{{$even->id}}" name="event_id" class="tripId"/>
                                                                                                                        <input hidden value="{{$event->om_id}}" name="om_id" class="omId"/>
                                                                                                                        <input type="text" name="label[]" class="form-control" placeholder="Label" value="" ></td>
                                                                                                                        <td><input type="text" name="amount[]" class="form-control" placeholder="Amount" value="" ></td>
                                                                                                                        <td><input type="text" name="currency[]" class="form-control" placeholder="Currency" value="" ></td>
                                                                                                                        <td style="vertical-align: middle;"><select name="type[]"><option value="1">Flight hotel</option><option value="2">Transport</option><option value="3">Stamp</option><option value="4">Assurance</option><option value="5">Parking</option><option value="6">Rent a car</option><option value="7">Fuel</option><option value="8">Payage</option></select></td>
                                                                                                                        <td><input type="file" class="form-control" name="photos[0][]" multiple /></td>
                                                                                                                        <td style="vertical-align: middle;"><select name="pay[]"><option value="cb">CB</option><option value="cash">Cash</option><option value="cheque">Chéque</option></select></td>

                                                                                                                        <!--<td class="radio"> <div class="switch"><input name="switch" id="one" type="radio" checked/><label for="one" class="switch__label">CB</label><input name="switch" id="two" type="radio" /><label for="two" class="switch__label">Cash</label><input name="switch" id="three" type="radio" /><label for="three" class="switch__label" >Cheque</label><div class="switch__indicator" /></div></div></td>-->
                                                                                                                        <!--<td><div class="switch-field"><input type="radio" id="switch_3_left" name="switch_3" value="cb" checked/><label for="switch_3_left">Payé par CB</label><input type="radio" id="switch_3_center" name="switch_3" value="cash" /><label for="switch_3_center">Payé par Cash</label><input type="radio" id="switch_3_right" name="switch_3" value="cheque" /><label for="switch_3_right">Payé par chéque</label></div></td>-->
                                                                                                                        <!--<td><div class="row"><label>Payé par CB </label><input class="align-right" type="radio" name="pay" /></div><div class="row"><label>Payé par Cash </label><input  class="align-right" type="radio" name="pay"/></div><div class="row"><label>Payé par chéque </label><input  class="align-right" type="radio" name="pay"/></div></td>-->
                                                                                                                    </tr>
                                                                                                                </tbody>

                                                                                                            </table>
                                                                                                            <br><br>
                                                                                                            <div class="btn-group">
                                                                                                                <button class="btn btn-success valid_pdc" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Valider</span></button>
                                                                                                                <button class="btn btn-success pdc_add" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add pdc</span></button>
                                                                                                                <input type="submit" class="btn btn-danger pdc_save" value="Save PDC" />
                                                                                                                <button type="button" class="btn btn-white align-right btnClose" >Close</button>
                                                                                                            </div>
                                                                                                        </form>

                                                                                                    </div>
                                                                                                </div><!-- /.modal-content -->


                                                                                        </div><!-- /.modal-dialog -->
                                                                                    </div>


                                                                                </td>
                                                                                <td class="action"><!--<input type="submit" class="btn btn-primary" value="Upload PDC" />-->
                                                                                    <input hidden value="{{$even->id}}" name="event_id" class="tripId"/>
                                                                                    <input hidden value="{{$event->om_id}}" name="om_id" class="omId"/>

                                                                                    @if(count($sessions) != 0 )
                                                                                        @foreach($sessions as $session)
                                                                                            @if(strcmp($session->validated_DAF,'1') == 0 && strcmp($event->user->title,"DAF") == 0)
                                                                                                PDC Valide by DAF
                                                                                                <?php break; ?>
                                                                                            @elseif(strcmp($session->validated_instructor,'1') == 0 && strcmp($event->user->title,"Instructor") == 0)
                                                                                                PDC valide by Instructor
                                                                                                <?php break; ?>
                                                                                            @endif
                                                                                            @if($even->id == $session->events_id && strcmp($even->status,'1') != 0 )
                                                                                            <a href="#" type="button" class="btn btn-success status" >Valider</a><br>
                                                                                            <?php break; ?>
                                                                                            @endif
                                                                                        @endforeach

                                                                                    @endif
                                                                                    @if(count($sessions) == 0 || $e == 0)
                                                                                      <!--  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>-->
                                                                                    @endif
                                                                                </td>
                                                                            </form>
                                                                        </tr>
                                                                        @endif
                                                                    @endforeach

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>

                                                    <div class="modal-footer">
                                                        <div class="btn-group">

                                                            <input hidden value="{{$event->id}}" name="id" class="tripId"/>
                                                            @if(!strcmp($event->user->title,"DAF") && !strcmp($event->status,"Valide by manager")  ||  !strcmp($event->user->title,"Manager") && !strcmp($event->status,"planned"))
                                                            <a href="#" type="button" class="btn btn-success validate" >Valider</a>
                                                            @endif
                                                            @if(!strcmp($event->status,"Valide by DAF"))
                                                            <a href="{{url('/instructor/om/generate/'.$event->om_id)}}" type="button" class="btn btn-success generateOm" >Generate OM</a>
                                                            @endif
                                                            @if(strcmp($session->validated_instructor,'1') == 0 && strcmp($session->validated_DAF,'1') == 0)
                                                            <a href="{{url('/instructor/pdc/generate/'.$event->id)}}" type="button" class="btn btn-primary generatePdc" >Generate PDC</a>
                                                            <a href="{{url('/instructor/facture/generate/'.$event->id)}}" type="button" class="btn btn-danger generateFacture" >Generate Facture</a>
                                                            @endif
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </form>
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
