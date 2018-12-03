@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.instructorLayout.instructor_header')

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


            @if(count($errors))

                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach($errors->all() as $message)
                            <li><strong>{{$message}}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                            <form action="{{url ('instructor/pdc/add')}}" method="post" class="form-horizontal">
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
                                        <select class="form-control" id="sel1" name="title" value="{{ old('title') }}" required>
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
                                    <label class="control-label">Payement </label>
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
                                    <label class="control-label">Attachement files</label>
                                    <table class="table table-striped table-bordered" id="dynamic_field">

                                        <tbody>
                                        <tr>
                                            <td class="taskDesc">
                                                <input type="text" name="name[]"placeholder="Google Drive Url" class="form-control name_list" required/>
                                            </td>
                                            <td>
                                                <button type="button" name="add" id="add" class="btn btn-success">Add
                                                    More
                                                </button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-e-margins"></div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-block ladda-button btn btn-primary">Submit for validation</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    var postURL = "<?php echo url('instructor/pdc/add'); ?>";
                    var i = 1;

                    $('#add').click(function () {
                        i++;
                        $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Google Drive Url" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });

                    $(document).on('click', '.btn_remove', function () {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                });
            </script>
            @include('layouts.instructorLayout.instructor_footer')
        </div>
@endsection
