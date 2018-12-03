<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Training Manager</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/matrix-style.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/matrix-media.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/uniform.css') }}" />

    <link href="{{ asset ('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset ('css/backend_css/jquery.gritter.css') }}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="{{ asset ('css/bootstrap.modal.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')
@yield('content')

@include('layouts.adminLayout.admin_footer')


<script src="{{ asset ('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset ('js/backend_js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset ('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/backend_js/jquery.uniform.js') }}"></script>
<script src="{{ asset ('js/backend_js/select2.min.js') }}"></script>
<script src="{{ asset ('js/backend_js/jquery.validate.js') }}"></script>
<script src="{{ asset ('js/backend_js/matrix.js') }}"></script>
<script src="{{ asset ('js/backend_js/matrix.form_validation.js') }}"></script>
<script src="{{ asset ('js/backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('js/backend_js/matrix.tables.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>




<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:

    $(document).ready(function() {

            
                $(document).on('show.bs.modal', '.modal', function () {
                    var zIndex = 1040 + (10 * $('.modal:visible').length);
                    $(this).css('z-index', zIndex);
                    setTimeout(function() {
                        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                    }, 0);
                  alert('yes');
                });
                $(document).on('hidden.bs.modal', '.modal', function () {
                    $('.modal:visible').length && $(document.body).addClass('modal-open');
                    alert('N');
                });
});

    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
