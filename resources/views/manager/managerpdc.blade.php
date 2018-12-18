@extends('layouts.instructorLayout.instructor_design')
@section('content')


        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Calendar</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

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
                        <strong>List of PDC</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="{{ url('/manager') }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Mission</a>
                </div>
            </div>

        </div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInDown">

              <table class="table" border="2">



                        <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">event</th>
                          <th scope="col">locator</th>
                          <th scope="col">date</th>
                          <th scope="col">currency</th>
                          <th scope="col">amount</th>
                          <th scope="col">title</th>

                          <th scope="col">validated_instructor</th>
                          <th scope="col">pay</th>
                          <th scope="col">misson id</th>
                          <th scope="col">status</th>
                          <th scope="col">validated_DAF</th>
                          <th scope="col"> action </th>
                          <th scope="col"> manager </th>






                        </tr>
                        </thead>
                        <tbody>


                        <form action="/managerpdc " method="POST" >
                          {{ csrf_field() }}
                          <?php

                        //dd($events);
                        //die();

                          foreach ($pdcs as $pdc):
                            if($pdc->validated_DAF==1 && $pdc->validated_instructor==1){



                            ?>
                            <tr>

                            <td>
                              <input type="text" name="iddddd" value={{$pdc->id}} >
                            </td>

                              <td >

                             {{$pdc->events_id}}

                                </td>

                              <td >     {{$pdc->locator}}            </td>
                              <td >     {{$pdc->date}}               </td>
                              <td >     {{$pdc->currency}}           </td>
                              <td >     {{$pdc->amount}}             </td>
                              <td >     {{$pdc->title}}              </td>

                              <td>
                                    {{$pdc->validated_instructor}}
                              </td>

                              <td > {{$pdc->pay}} </td>

                                <td > {{$pdc->om_id}} </td>

                                  <td > {{$pdc->status}} </td>

                                  <td >
                                    {{$pdc->validated_DAF}}
                                  </td>
                                  <td>
                                      <a   class="btn btn-success"  href="/managerpdcValide?id={{$pdc->id}}&&submitbutton=valide"> Valide </a>
                                      <a  class="btn btn-danger" href="/managerpdcValide?id={{$pdc->id}}&&submitbutton=Invalide" > Invalide </a>
                                  </td>
                                  <td>
                                    {{$pdc->validated_manager}}

                                  </td>

                            </tr>
                            <?php
                             }
                          endforeach; ?>

                          </tbody>
                    </table>

                    <form>
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
