@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row wrapper border-bottom white-bg page-heading">
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {!! session('flash_message_error') !!}<a class="alert-link" href="#"></a>.
                    </div>
    @endif
                    <div class="col-lg-8">
                        <h2>Ordre Mission</h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                <strong>Add New OM</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-4">
                        <div class="title-action">
                        </div>
                    </div>
            </div>
            <div class="wrapper wrapper-content">

                <div class="row">
                    <form id="om_form" role="form" action="/instructor/session/valideMof" method="post" >

                        <div class="col-lg-6">

                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>OM Information </h5>
                                    <div class="ibox-tools"></div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-12 b-r">
                                            <p class="bold">Please fill all the fields of your OM</p>
                                            @csrf
                                            <div class="form-group" >
                                                <label class="control-label">ID </label>
                                                <input type="text" class="form-control" name="om_id" value="{{$listrips[0]->om_id}}"  readonly>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label">Start trip date </label>
                                                <input type="date" class="form-control" name="start_trip_date" value="{{$listrips[0]-> start_date}}" required>
                                            </div>



                                            <div class="form-group">
                                                <label class="control-label">End trip date :</label>
                                                <input type="date" class="form-control" name="end_trip_date" value="{{ $listrips[0]-> end_date}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Prime amount</label>
                                                <input type="text" name="amount" class="form-control" placeholder="Prime amount" value="{{$listrips[0]-> prime_amount}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Formule</label>
                                                <input type="text" name="formule" class="form-control" placeholder="Formule" value="{{ $listrips[0]-> formule}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Flight Ticket</label>
                                                <input type="file" name="picture" class="form-control" accept="image/*"  value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Hotel</label>
                                                <input type="file" name="picture" class="form-control" accept="image/*">
                                            </div>

                                            <hr>

                                            <div>
                                                <button id="session_add" class="btn btn-success " type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add session</span></button>
                                                <button id="valide_submit" class="btn btn-primary pull-right " type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;<span class="bold">Valide</span></button>
                                                <button id="om_submit_modif" name='enregistrer' class="btn btn-primary  " type="button"><i class="fa fa-save"></i>&nbsp;&nbsp;<span class="bold">Save</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            @foreach($listevent as $event)

                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Please fill session fields</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link" href="#"> <i class="fa fa-chevron-up"></i> </a>
                                            <a class="close-link" href="#"> <i class="fa fa-times"></i> </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content" style="">
                                        <div class="form-group">
                                            <label class="control-label">Title</label>
                                            <input type="text" name="name_session[]" class="form-control" placeholder="Name of training" value="{{$event->title}}" required>
                                        </div>
                                        <div class="ibox-content" style="">
                                            <div class="form-group">
                                                <label class="control-label">id</label>
                                                <input type="text" name="id_session[]" class="form-control" placeholder="Name of training" value="{{$event->id}}" required>
                                            </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control m-b" id="sel1" name="country[]" value="" required>
                                                @if($event->country=="Tunisia")
                                                <option selected>Tunisia</option>
                                                <option>French</option>
                                                    <option>belgium</option>
                                                    @elseif ($event->country=="French")
                                                    <option >Tunisia</option>
                                                    <option selected>French</option>
                                                    <option>belgium</option>
                                                    @elseif($event->country=="belgium")
                                                    <option >Tunisia</option>
                                                    <option >French</option>
                                                    <option selected>belgium</option>
                                                    @else
                                                    <option >Tunisia</option>
                                                    <option >French</option>
                                                    <option >belgium</option>
                                                    @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <input type="text" name="locator[]" class="form-control" placeholder="Locator" value="{{$event->locator}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Customer</label>
                                            <input type="text" name="customer[]" class="form-control" placeholder="Customer" value="{{$event->customer}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Location</label>
                                            <input type="text" name="location[]" class="form-control" placeholder="Location" value="{{$event->location}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Start training date </label>
                                            <input type="date" class="form-control" id="TextBox1" name="start_training_date[]" value="{{$event->start_date}}" required>
                                        </div>
                                            <div class="form-group">
                                            <label class="control-label">End training date :</label>
                                            <input type="date" class="form-control" id="TextBox2" onblur="myFunction()" name="end_training_date[]" value="{{$event->end_date}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Delivery Days</label>
                                            <input type="text" name="delivery_days[]" id="TextBox3" class="form-control" value="{{$event->delivery_days}}" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Optional : Hotel name & Contact</label>
                                            <textarea type="text" name="hotel_name[]" class="form-control"  value="{{$event->hotel_contact}}">

                                            </textarea>
                                        </div>
                                        <div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                                </div>
                    </form>
                </div>
                </div>
            </div>
            @include('layouts.instructorLayout.instructor_footer')

        </div>




@endsection

