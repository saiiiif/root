@extends('layouts.instructorLayout.instructor_design')
@section('content')


    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/instructor')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
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
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Edit-Pdc</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{url ('instructor/pdc/'.$pdc->id)}}" method="post" class="form-horizontal" >
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}

                            <div class="control-group">
                                <label class="control-label">Locator :</label>
                                <div class="controls">
                                    <input type="text" name="locator" class="span11" placeholder="Locator" value="{{ $pdc->locator }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group">
                                    <label class="control-label">Title :</label>
                                    <div class="controls">
                                        <select class="form-control" id="sel1" name="title" value="">
                                            <option>{{ $pdc->title }}</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group">
                                    <label class="control-label">Payement :</label>
                                    <div class="controls">
                                        <select class="form-control" id="sel1" name="payement" >
                                            <option>{{ $pdc->payement }}</option>
                                            <option>Upk</option>
                                            <option>Smart Skills CC</option>
                                            <option>Cash</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group">
                                    <label class="control-label">Currency :</label>
                                    <div class="controls">
                                        <select class="form-control" id="sel1" name="currency" >
                                            <option>{{ $pdc->currency }}</option>
                                            <option>Tnd</option>
                                            <option>Euro</option>
                                            <option>Dollar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Date :</label>
                                <div class="controls">
                                    <input type="date" class="span11" name="date" value="{{ $pdc->date }}">
                                </div>
                            </div>




                            <div class="control-group">
                                <label class="control-label">Attach file</label>
                                <div class="controls">
                                    <div class="uploader" id="uniform-undefined"><input type="file" name="picture" size="19" style="opacity: 0;"><span class="filename">No file selected</span><span class="action">Choose File</span></div>
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
@endsection
<!--end-main-container-part-->
