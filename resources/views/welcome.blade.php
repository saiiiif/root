<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Training Manager | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/bootstrapSocial/bootstrap-social.css" rel="stylesheet">


</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name" style="height: 100px;"></h1>

        </div>
        <h3>Welcome to STM</h3>
        <p>Smart Training Manager
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {!! session('flash_message_error') !!}<a class="alert-link" href="#"></a>.
            </div>
        @endif
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {!! session('flash_message_success') !!}<a class="alert-link" href="#"></a>.
            </div>
        @endif
        <form class="m-t" role="form"  method="post" action="{{ url('admin') }}"> {{ csrf_field() }}
            <!--<div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email adress " required="">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            -->
            <a href="{{ url('admin') }}"   class="btn btn-block btn-social btn-google full-width m-b btn-outline" /> <i class="fa fa-google"></i> Login with google </a>
            <!--
            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('/admin') }}">Create an account</a>
            -->
        </form>
        <p class="m-t"> <small></small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>





