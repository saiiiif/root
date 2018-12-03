<!DOCTYPE html>
<html lang="en">

<head>
    <title>Smart Training Manager</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/matrix-login.css') }}" />
    <link href="{{ asset ('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


</head>
<body>
<div id="loginbox">
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
    <form id="loginform" class="form-vertical" method="post" action="{{ url('admin') }}"> {{ csrf_field() }}
        <div class="control-group normal_text"> <h3><img src="{{ asset ('images/backend_images/logo.png') }}" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" name="email" placeholder="Username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                </div>


            </div>
        </div>




        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">register with google</a></span>
            <span class="pull-right"><input type="submit" value="Login " class="btn btn-success" /> </span>
            <span><a href="{{ url('admin/google') }}"   class="btn btn-success pull-right" /> <i class="fab fa-google-plus-g"></i>Login with google </a></span>



        </div>
    </form>

</div>

<script src="{{ asset ('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset ('js/backend_js/matrix.login.js') }}"></script>
<script src="{{ asset ('js/backend_js/bootstrap.min.js') }}"></script>

</body>

</html>
