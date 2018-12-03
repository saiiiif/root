@extends('layouts.instructorLayout.instructor_design')
@section('content')
    <!--main-container-part-->
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">

        <div class="middle-box text-center animated fadeInDown">
            <h1>403</h1>
            <h3 class="font-bold">Opps, You're lost.</h3>

            <div class="error-desc">
                Sorry, but the page you are looking for your are not authorized. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.
                    <p>Access to this page is forbidden</p>
                    <a class="btn btn-warning btn-big"  href="{{ url('instructor') }}">Back to Home</a> </div>
            </div>
        </div>
    </div>

@endsection
<!--end-main-container-part-->
