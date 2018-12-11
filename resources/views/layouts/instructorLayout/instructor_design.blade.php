<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Training Manager</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset ('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset ('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset ('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ asset ('css/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/plugins/fullcalendar/fullcalendar.print.css') }}" rel='stylesheet' media='print'>
    <link href="{{ asset ('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">
    <!--  <link href="{{ asset ('css/bootstrap.modal.css') }}" rel="stylesheet" type="text/css">  -->


</head>
<body>

@include('layouts.instructorLayout.instructor_sidebar')

@yield('content')



<script src="{{ asset ('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset ('js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset ('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset ('js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset ('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset ('js/plugins/flot/jquery.flot.spline.js') }}"></script>
<script src="{{ asset ('js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset ('js/plugins/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset ('js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset ('js/demo/peity-demo.js') }}"></script>
<script src="{{ asset ('js/inspinia.js') }}"></script>
<script src="{{ asset ('js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset ('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>


<!--end-Footer-part-->
<script src="{{ asset ('js/plugins/gritter/jquery.gritter.min.js') }}"></script>
<script src="{{ asset ('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset ('js/demo/sparkline-demo.js') }}"></script>
<script src="{{ asset ('js/plugins/chartJs/Chart.min.js') }}"></script>
<script src="{{ asset ('js/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset ('js/backend_js/matrix.form_validation.js') }}"></script>
<!-- iCheck -->
<script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });

</script>
<!-- Full Calendar -->
<script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script>
    $(document).ready(function() {

                
                $(document).on('show.bs.modal', '.modal', function () {
                    var zIndex = 1040 + (10 * $('.modal:visible').length);
                    $(this).css('z-index', zIndex);
                    setTimeout(function() {
                        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                    }, 0);
                });
                $(document).on('hidden.bs.modal', '.modal', function () {
                    $('.modal:visible').length && $(document.body).addClass('modal-open');
                });
                

                @if(Session::has('message'))

                    var type = "{{ Session::get('alert-type', 'info') }}";
                    switch(type){
                        case 'info':
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.info("{{ Session::get('message') }}");
                            break;

                        case 'warning':
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.warning("{{ Session::get('message') }}");
                            break;

                        case 'success':
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.success("{{ Session::get('message') }}");
                            break;

                        case 'error':
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.error("{{ Session::get('message') }}");
                            break;
                    }
                @endif


        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        ];
        var data2 = [
            [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis:{
                },
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            }
        );

        var doughnutData = {
            labels: ["App","Software","Laptop" ],
            datasets: [{
                data: [300,50,100],
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
            }]
        } ;


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };


        var ctx4 = document.getElementById("doughnutChart").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        var doughnutData = {
            labels: ["App","Software","Laptop" ],
            datasets: [{
                data: [70,27,85],
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
            }]
        } ;


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };


        var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

    });
</script>
<!-- ChartJS-->
<script src="{{asset('js/plugins/chartJs/Chart.min.js') }}"></script>

<script>
    $(document).ready(function() {


        var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
        var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

        var data1 = [
            { label: "Data 1", data: d1, color: '#17a084'},
            { label: "Data 2", data: d2, color: '#127e68' }
        ];
        $.plot($("#flot-chart1"), data1, {
            xaxis: {
                tickDecimals: 0
            },
            series: {
                lines: {
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    },
                },
                points: {
                    width: 0.1,
                    show: false
                },
            },
            grid: {
                show: false,
                borderWidth: 0
            },
            legend: {
                show: false,
            }
        });

        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Example dataset",
                    backgroundColor: "rgba(26,179,148,0.5)",
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [48, 48, 60, 39, 56, 37, 30]
                },
                {
                    label: "Example dataset",
                    backgroundColor: "rgba(220,220,220,0.5)",
                    borderColor: "rgba(220,220,220,1)",
                    pointBackgroundColor: "rgba(220,220,220,1)",
                    pointBorderColor: "#fff",
                    data: [65, 59, 40, 51, 36, 25, 40]
                }
            ]
        };

        var lineOptions = {
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});


    });

    $(document).ready(function() {

        function calculateDaysDiffrence(date1, date2){
            //https://stackoverflow.com/a/8619982
            // Here are the two dates to compare
            //var date1 = '2011-12-24';
            //var date2 = '2012-01-01';

            // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
            date1 = date1.split('-');
            date2 = date2.split('-');

            // Now we convert the array to a Date object, which has several helpful methods
            date1 = new Date(date1[0], date1[1], date1[2]);
            date2 = new Date(date2[0], date2[1], date2[2]);

            // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
            date1_unixtime = parseInt(date1.getTime() / 1000);
            date2_unixtime = parseInt(date2.getTime() / 1000);

            // This is the calculated difference in seconds
            var timeDifference = date2_unixtime - date1_unixtime;

            // in Hours
            var timeDifferenceInHours = timeDifference / 60 / 60;

            // and finaly, in days :)
            var timeDifferenceInDays = timeDifferenceInHours  / 24;

            return timeDifferenceInDays;
        } 

        function refreshElement(){
            // Collapse ibox function
            $(document).find('.collapse-link').off().on('click', function () {
                var ibox = $(this).closest('div.ibox');
                var button = $(this).find('i');
                var content = ibox.children('.ibox-content');
                content.slideToggle(200);
                button.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
                ibox.toggleClass('').toggleClass('border-bottom');
            /* setTimeout(function () {
                    ibox.resize();
                    ibox.find('[id^=map-]').resize();
                }, 50);*/
            });

            // Close ibox function
            $(document).find('.close-link').off().on('click', function () {
                var content = $(this).closest('div.ibox');
                content.remove();
            });

            var $delivery = $('input[name="delivery_days[]"]');
            var number = $delivery.map(function(){return $(this).val();}).get().length;
            $delivery.on('keyup input',function(){

                var prime = 0;

                var c = calculateDaysDiffrence($('[name="start_trip_date"]').val(),$('[name="end_trip_date"]').val());
                prime = (c.toFixed(0)*20); 
                formule = "("+c.toFixed(0)+"*20)";
                console.log(formule);
                var val = 0;
                $delivery.each(function(index){
                    if(number <= 15){
                        val += ( parseInt($(this).val(), 10)*55 );
                        formule = formule +"+"+ $(this).val() + "*55";
                    }
                    else if(number > 16 && number < 30) {

                    }   
                    else if( number > 30 ) {

                    }     
                });
                $("[name='amount']").val((prime+val).toFixed(3));
                $("[name='formule']").val(formule);
            });
        }
        setTimeout(() => {

            var $delivery = $('input[name="delivery_days[]"]');
            var number = $delivery.map(function(){return $(this).val();}).get().length;
            console.log(number);
            $delivery.on('keyup input',function(){
                var prime = 0;
                var formule = "";
                var c = calculateDaysDiffrence($('[name="start_trip_date"]').val(),$('[name="end_trip_date"]').val());
                prime = (c*20); 
                formule = "("+c+"*20)";
                console.log(formule);
                var val = 0;
                $delivery.each(function(index){
                    if(number <= 15){
                        val += ( parseInt($(this).val(), 10)*55 );
                        formule = formule +"+"+ $(this).val() + "*55";
                    }
                    else if(number > 16 && number < 30) {

                    }   
                    else if( number > 30 ) {

                    }     
                });
                console.log(formule);
                $("[name='amount']").val(prime+val);
                $("[name='formule']").val(formule);
            });
            
            $("#session_add").on('click',function(e) {
                //prevent Default functionality
                e.preventDefault();
                var content = '<div class="ibox float-e-margins"> <div class="ibox-title"> <h5>Please fill session fields</h5> <div class="ibox-tools"> <a class="collapse-link" href="#"> <i class="fa fa-chevron-up"></i> </a> <a class="close-link" href="#"> <i class="fa fa-times"></i> </a> </div> </div> <div class="ibox-content" style=""> <div class="form-group"> <label class="control-label">Title</label> <input type="text" name="name_session[]" class="form-control" placeholder="Name of training" value="" required> </div> <div class="form-group"> <label>Country</label> <select class="form-control m-b" id="sel1" name="country[]" value="" required> <option>Tunisia</option> <option>French</option> <option>belgium</option> </select> </div> <div class="form-group"> <label class="control-label">City</label> <input type="text" name="locator[]" class="form-control" placeholder="Locator" value=""> </div> <div class="form-group"> <label class="control-label">Customer</label> <input type="text" name="customer[]" class="form-control" placeholder="Customer" value=""> </div> <div class="form-group"> <label class="control-label">Location</label> <input type="text" name="location[]" class="form-control" placeholder="Location" value=""> </div> <div class="form-group"> <label class="control-label">Start training date </label> <input type="date" class="form-control" id="TextBox1" name="start_training_date[]" value="" required> </div> <div class="form-group"> <label class="control-label">End training date :</label> <input type="date" class="form-control" id="TextBox2" onblur="myFunction()" name="end_training_date[]" value="" required> </div> <div class="form-group"> <label class="control-label">Delivery Days</label> <input type="text" name="delivery_days[]" id="TextBox3" class="form-control" > </div> <div class="form-group"> <label class="control-label">Optional : Hotel name & Contact</label> <textarea type="text" name="hotel_name[]" class="form-control" ></textarea> </div> <div>  </div> </div>'
                $('.wrapper-content .col-lg-6').eq(1).append(content);
                refreshElement();
            });

            
            $('.btn-success.status').click(function(e){
                e.preventDefault();
                //alert("status");

                $.ajax({
                        url: '/STM_/instructor/pdc/validateStatus',
                        type: 'get',
                        //dataType: 'application/json',
                        data: 'event_id='+ $(this).parent().find( ".tripId" ).val(),
                        success: function(data) {
                            console.log('success = ' + data);  
                        },error: function(xhr, ajaxOptions, thrownError){
                            console.log("error "+ xhr.status+" ,"+" "+ajaxOptions+", "+thrownError);
                        }
                });
                setTimeout(() => {
                    location.reload();
                }, 100);
                
            });



            $("#om_submit_modif").click(function(e) {
                //prevent Default functionality
                e.preventDefault();
                document.forms['om_form'].action = '/instructor/session/saveModif';
                document.forms['om_form'].target = '_self';
                document.forms['om_form'].submit();
                //get the action-url of the form
                //var actionurl = e.currentTarget.action;
                // var actionurl = $("#om_form").attr("action");
                //do your own request an handle the results

            });














            $("#om_submit").click(function(e) {
                    //prevent Default functionality
                e.preventDefault();
                document.forms['om_form'].action = '/instructor/session';
                document.forms['om_form'].target = '_self';
                document.forms['om_form'].submit();
                    //get the action-url of the form
                    //var actionurl = e.currentTarget.action;
                   // var actionurl = $("#om_form").attr("action");
                    //do your own request an handle the results

               /* $.ajax({
                        url: actionurl,
                        type: 'post',
                        //dataType: 'application/json',
                        data: $("#om_form").serialize()+"&picture="+$("[name='picture']").val(),
                        success: function(data) {
                        console.log('success = ' + data);  
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success(data.message);
                        },error: function(xhr, ajaxOptions, thrownError){
                            console.log("error "+ xhr.status+" ,"+" "+ajaxOptions+", "+thrownError);
                        }
                });*/

            });        
            
            $('.btn-success.validate').click(function(e){
                //prevent Default functionality
                e.preventDefault();
                //console.log($(this).parent().find('.tripId').val());
                $.ajax({
                        url: '/STM_/instructor/session/validateStatus',
                        type: 'get',
                        //dataType: 'application/json',
                        data: 'om_id='+ $(this).parent().find('.tripId').val(),
                        success: function(data) {
                        console.log('success = ' + data);  
                        },error: function(xhr, ajaxOptions, thrownError){
                            console.log("error "+ xhr.status+" ,"+" "+ajaxOptions+", "+thrownError);
                        }
                });
                setTimeout(() => {
                    location.reload();
                }, 100);
                //$(".ibox-content").load(self);
               // console.log($(this).parent().parent().parent().parent().attr("id"));
               // console.log($("#"+$(this).parent().parent().parent().parent().attr("id"))));
            });

            // modal close button
            $('.btnClose').click(function(){
                $("[id^='pdc_']:visible").modal('toggle');
            });
            i = 0;
            $(".pdc_add").click(function(e){
                i = i + 1;
                //console.log($(this).parent().parent().parent());
                $(this).parent().parent().parent().find("table tbody").append('<tr><td>  <input type="text" name="label[]" class="form-control" placeholder="Label" value="" ></td><td><input type="text" name="amount[]" class="form-control" placeholder="Amount" value="" ></td><td><input type="text" name="currency[]" class="form-control" placeholder="Currency" value="" ></td><td style="vertical-align: middle;"><select name="type[]"><option value="1">Flight hotel</option><option value="2">Transport</option><option value="3">Stamp</option><option value="4">Assurance</option><option value="5">Parking</option><option value="6">Rent a car</option><option value="7">Fuel</option><option value="8">Payage</option><option value="9">Perdiem</option></select></td><td><input type="file" class="form-control" name="photos['+i+'][]" multiple /></td><td style="vertical-align: middle;"><select name="pay[]"><option value="cb">CB</option><option value="cash">Cash</option><option value="cheque">Chéque</option></select></td></tr>');
            });

            $(".pdc_save").click(function(e){
                e.prevntDefault();
            });

             $('.pdcForm').on('submit', function(e){
                console.log("Submit");

                e.preventDefault();


                $.ajax({
                    url:"{{ route('ajaxupload.action') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success(data.message);
                        $(this)[0].reset();
                        i = 0;
                        $(this).find('tbody tr').not(':first').remove();
                        //$('#message').css('display', 'block'); $('#message').html(data.message); $('#message').addClass(data.class_name); $('#uploaded_image').html(data.uploaded_image);
                    }
                });

 
                return false;

            });

        }, 50);


});
</script>
</body>
</html>