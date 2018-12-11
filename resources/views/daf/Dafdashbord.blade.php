@extends('layouts.instructorLayout.instructor_design')
@section('content')


        <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Calendar</title>
    <script src="js/sweetalert.min.js"></script>


        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<body id="wrapper">


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
@include('layouts.instructorLayout.instructor_header')
        </div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInDown">

             <h1 class="center">List of missions</h1>
             <a href="{{ url('/dafpdc') }}" class="btn btn-success">  go to pdc </a>

              <table class="table" border="2">



                        <thead>
                        <tr>
                            <th scope="col">user id</th>
                            <th scope="col">user</th>
                            <th scope="col">event</th>
                            <th scope="col">name</th>
                            <th scope="col">prime_amount</th>
                            <th scope="col">order Mission</th>
                            <th scope="col">start date</th>
                            <th scope="col">end date</th>
                            <th scope="col">accept or not </th>
                            <th scope="col"> generate om </th>
                            <th scope="col">status </th>





                        </tr>
                        </thead>
                        <tbody>


                        <form action="/DafValide " method="POST" >
                          {{ csrf_field() }}

                          @foreach ($trips as $trip)
                            @if(($trip->status=="Valide by Manager")||($trip->status=="Valide by DAF")||($trip->status=="Montant_Bank"))
                        <tr>
                          <td >

                            <input type="text" name="id_name" value="{{$trip->id}}"  hidden >
                            </td>
                          <td name="username">

                              {{$trip->user->name}}
                            </td>

                          <td name="title">{{$trip->events->title}} </td>
                          <td name="name"> {{$trip->name}} </td>
                          <td name="prime_amount"> {{$trip->prime_amount}} </td>
                          <td >
                            <input type="hidden" name="om_id" value={{$trip->om_id}} >
                             {{$trip->om_id}} </td>
                          <td name="start_date"> {{$trip->start_date}} </td>
                          <td name="end_date"> {{$trip->end_date}} </td>
                            @if($trip->status=="Valide by Manager")
                          <td>
                              <a  type="submit" name="submitbutton" value="valide" class="btn btn-success" href="/DafValide?idDAF={{$trip->id}}&submit=valide"> valide </a>
                              <a type="submit" name="submitbutton" value="Invalide" class="btn btn-danger" href="/DafValide?idDAF={{$trip->id}}&submit=Invalide">Invalide </a>


                          </td>
                            @endif
                            @if($trip->status=="Valide by DAF")
                                <td>
                                    <a type="submit"   name="submitbutton" value="Montant_Bank" class="btn btn-success" href="/DafValide?idDAF={{$trip->id}}&submit=Montant_Bank" >Montant_Bank </a>
                                </td>
                            @endif
                            @if($trip->status=="Montant_Bank")
                                <td>
                                    <a type="submit"   name="submitbutton" value="Montant_Recu" class="btn btn-success" href="/DafValide?idDAF={{$trip->id}}&submit=Montant_Recu" >Montant_Recu </a>
                                </td>
                            @endif
                            <td> <a type="submit" name="submitbutton" value="generateOm" class="btn btn-default" href="/DafValide?idDAF={{$trip->om_id}}&submit=generateOm">Generate_OM  </a></td>
                          <td > {{$trip->status}} </td>




                        </tr>
                        @endif
                        @endforeach
                            </form>

                        </tbody>
                    </table>

        </div>



    </div>
</div>
</body>

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
<!-- sweet alert script  -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>




<script> swal("System Connected!", "You logged In", "success"); </script>

@endsection
