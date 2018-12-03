@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Pdc Request</h5>
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
                            <form action="{{url ('instructor/pdc')}}" method="post" class="form-horizontal"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" value="{{$id}}" name="event_id">
                                <div class="form-group">
                                    <label class="control-label">Locator </label>
                                    <div class="controls">
                                        <input type="text" name="locator" class="form-control"
                                               value="{{ $pdcs->locator }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Date </label>
                                    <div class="controls">
                                        <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Title </label>
                                    <div class="controls">
                                        <select class="form-control" id="form-control" name="title"
                                                value="{{ old('title') }}" required>
                                            <option></option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ammount </label>
                                    <div class="controls">
                                        <input type="number" name="amount" class="form-control" placeholder="amount"
                                               value="{{ old('amount') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Payement :</label>
                                    <div class="controls">
                                        <select class="form-control" id="sel1" name="payement"
                                                value="{{ old('payement') }}" required>
                                            <option>Upk</option>
                                            <option>Smart Skills CC</option>
                                            <option>Cash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Currency </label>
                                    <div class="controls">
                                        <select class="form-control" id="sel1" name="currency"
                                                value="{{ old('currency') }}" required>
                                            <option>Tnd</option>
                                            <option>Euro</option>
                                            <option>Dollar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Reason </label>
                                    <div class="controls">
                                        <textarea value="{{ old('amount') }}" name="reason" style="width: 100%"
                                                  rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-block btn-outline btn-primary">Submit for validation
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                @include('layouts.instructorLayout.instructor_footer')
            </div>
@endsection
