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


    <div id="page-wrapper" class="white-bg">
        <div class="row border-bottom">
            @include('layouts.instructorLayout.instructor_header')
        </div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInDown">
              <h1 class="center">List of missions</h1>
              <a href="{{ url('/managerpdc') }}" class="btn btn-success">  go to pdc </a>

              <table class="table" border="2">



                        <thead>
                        <tr>
                             <th scope="col">id</th>
                            <th scope="col">user</th>
                            <th scope="col">event</th>
                            <th scope="col">name</th>
                            <th scope="col">prime_amount</th>
                            <th scope="col">order Mission</th>
                            <th scope="col">start date</th>
                            <th scope="col">end date</th>
                            <th scope="col">action </th>
                            <th scope="col">action</th>
                            <th scope="col">comment </th>
                            <th scope="col">status </th>






                        </tr>
                        </thead>
                        <tbody>


                        <form action="{{action('ManagerController@ValideManager')}} " method="POST" >
                          {{ csrf_field() }}
                          <?php

                        //dd($events);
                        //die();

                          foreach ($trips as $trip):
                            if($trip->status=="planned"){

                              $aa=$trip->id;

                            ?>
                        <tr>

                <td>
            <input type="hidden" name="id" value="{{$aa}}" >
                </td>

                          <td>

                              {{$trip->user->name}}
                            </td>

                          <td>{{$trip->events->title}} </td>
                          <td> {{$trip->name}} </td>
                          <td>{{$trip->prime_amount}} </td>
                          <td > {{$trip->om_id}} </td>
                          <td> {{$trip->start_date}} </td>
                          <td> {{$trip->end_date}} </td>
                          <td>
                            <input type="submit"   name="submitbutton" value="valide" class="btn btn-success"  >

                            </td>
                            <td>
                               <input type="submit" name="submitbutton" value="Invalide" class="btn btn-danger" >
                            </td>
                              <td>
                          <input type="text" name="comment" placeholder="Enter text here">
                            </td>
                          <td> {{$trip->status}} </td>




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
