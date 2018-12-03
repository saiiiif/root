@extends('layouts.instructorLayout.instructor_design')
@section('content')

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('layouts.instructorLayout.instructor_header')
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>List of missions</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="http://127.0.0.1:8000">Dashboard</a>
                    </li>
                    <li class="active">
                        <strong>List of missions</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="{{ url('/managerpdc') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> New
                        PDC </a>
                </div>
            </div>

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Basic Table</h5>
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

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Instructor Name</th>
                                    <th scope="col">Session Name</th>
                                    <th scope="col">Prime Amount</th>
                                    <th scope="col">OM ID</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Options</th>
                                    <th scope="col">comment</th>
                                    <th scope="col">status</th>


                                </tr>
                                </thead>
                                <tbody>


                                <form action="{{action('ManagerController@ValideManager')}} " method="POST">
                                    {{ csrf_field() }}
                                    <?php

                                    //dd($events);
                                    //die();

                                    foreach ($trips as $trip):
                                    if($trip->status == "planned"){

                                    $aa = $trip->id;

                                    ?>
                                    <tr>

                                        <td>
                                            <input type="hidden" name="id" value="{{$aa}}">#
                                        </td>

                                        <td>

                                            {{$trip->user->name}}
                                        </td>

                                        <td>{{$trip->events->title}} </td>
                                        <td>{{$trip->prime_amount}} </td>
                                        <td> {{$trip->om_id}} </td>
                                        <td> {{$trip->start_date}} </td>
                                        <td> {{$trip->end_date}} </td>
                                        <td>
                                            <input type="submit" name="submitbutton" value="valide"
                                                   class="btn btn-success">


                                            <input type="submit" name="submitbutton" value="Invalide"
                                                   class="btn btn-danger">
                                        </td>
                                        <td>
                                            <input type="text" name="comment" placeholder="Enter text here">
                                        </td>
                                        <td>

                                            <?php if ($trip->status == "planned")

                                                $status = "warning";
                                            ?>

                                            <span class="label label-<?=$status?>"> {{$trip->status}}</span>

                                        </td>


                                    </tr>
                                <?php
                                }
                                endforeach; ?>


                                </tbody>


                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<!-- Mainly scripts -->
<script src="js/plugins/fullcalendar/moment.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI  -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>






@endsection
