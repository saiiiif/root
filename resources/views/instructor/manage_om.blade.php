@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Order Mission Information </h5>
                            <div class="ibox-tools">

                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-6 b-r">
                                    <p>Please fill all the fields</p>

                        <form action="{{url ('instructor/om/store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="control-group">
                                <div class="form-group">
                                    <label class="control-label">Training Name :</label>
                                    <div class="controls">
                                        <select class="form-control" id="sel1" name="title" >
                                            @foreach( $events as $event)
                                            <option value="{{$event->id}}">{{$event->title}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Country :</label>
                                <div class="controls">
                                    <select class="form-control" id="sel1" name="country" value="{{old('country')}}" required>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">City :</label>
                                <div class="controls">
                                    <select class="form-control" id="sel1" name="city" value="{{old('city')}}" required>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Adress :</label>
                                <div class="controls">
                                    <input type="text" class="form-control" name="adress" value="{{old('adress')}}" required>
                                </div>

                            </div>




                            <div class="form-group">
                                <label class="control-label">Start date :</label>
                                <div class="controls">
                                    <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}" required >
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">End date :</label>
                                <div class="controls">
                                    <input type="date" class="form-control" name="end_date" value="{{old('end_date')}}" required>
                                </div>
                            </div>

                            <hr>

                            <div>
                                <button class="btn btn-white" type="button" onclick="window.history.go(-1)">Cancel</button>

                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                            </div>
                                </div>
                                <div class="col-sm-6 b-r">
                                    <div class="form-group">
                                        <label class="control-label">Inject The Invoice Amount</label>
                                        <input type="file" name="picture" class="form-control" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Amount :</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="amount" value="{{old('extra_amount')}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Edit :</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="edit_amount" value="{{old('modif_ex_amount')}}" required>
                                        </div>
                                    </div>

                                </div>




                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.instructorLayout.instructor_footer')
        </div>
@endsection
