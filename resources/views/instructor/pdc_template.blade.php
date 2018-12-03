<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STM | Invoice Print</title>

    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.1.1.min.js') }}"></script>
</head>
<style>
    .main-content {
        direction: rtl;  /* Right to Left */
    }
</style>
<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
        <div class="container">

        <div class="row">
            <div class="col-sm-6">
            <button class="btn btn-primary hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
            </div>

            <div class="col-sm-6 text-right">
                <img src="{{asset('images/frontend_images/logo-light.png') }}">
            </div>
        </div>
<hr>
        <div class="col-md-offset-3">
            <h2><strong>Pièce de Caisse {{$event->user->name}} - </strong></h2>
        </div>

        <div class="row">
            <div class="col-sm-6">

            </div>

            <div class="col-sm-6 text-right">
                <p>
                    <span><small>Date: {{date("d/m/Y")}}</small></span><br>
                </p>
            </div>
        </div>


        <br>
        <br>
        <br>
        <br>


    <div class="row">
        <div class="col-sm-6">
            <strong> Taux de change :oanda.com <span id="date" contenteditable="true">({{date("d/m/Y")}})</span><br> 1<span id="currency" contenteditable="true"> EUR</span> = <span id="taux" contenteditable="true">3.1</span> TND</strong>

        </div>

        <div class="col-sm-6 text-right">

        </div>
    </div>
    <br>
    <br>
    <div class="table-bordered ">
            <table class="table ">
                <thead>
                <tr>
                    <th>Objet</th>
                    <th>Total</th>
                    <th>Devise</th>
                    <th>Total TND</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pdcs as $pdc)
                <tr>
                    <td>
                        <p>{{$pdc->title}}</p>
                    </td>
                    <td class="amount">{{$pdc->amount}} </td>
                    <td class="currency">{{$pdc->currency}} </td>
                    <td class="total">
                    @if(@strcmp($pdc->currency, 'TND') == 0) 
                        {{$pdc->amount}}
                    @endif
                    </td>

                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Total:</p></td>
                    <td id="total"></td>
                </tr>

                </tbody>
            </table>
        </div><!-- /table-responsive -->
            <br>
            <p>NB :<br><br> - Prière de regrouper les pièces justificatives par thème/mission en les collant sur une feuille A4 et l’agrafer à la présente pièce de caisse.
            </p>
<br>
            <div class="col-md-offset-4">
                <div class="col-md-4" >L’intéressé </div>
                <div class="col-md-4" >Direction </div>

            </div>
<br>
            <hr>
<div class="col-md-6">
    <p>SmartSkills SARL • Appartement B-14, 2ème étage Nour</p>
    <p>Centre, Avenue Hedi Chaker 7100 LeKef Est, Le Kef</p>
    <p>Tél: 29 48 44 25 / 29 48 44 26  </p>
    <p>RC: Kef B11192632016 Code TVA: 1473926/A/A/M/000</p>
</div>
<div class="col-md-6 main-content">
    <p>    ﺳﻣﺎرت ﺳﻛﯾﻠس ش.ذ.م.م ﺷﻘﺔ ب • . 14- اﻟطﺎﺑﻖ اﻟﺛﺎﻧﻲ . ﺷﺎرع اﻟﮭﺎدي ﺷﺎﻛر   اﻟﻧور ﺳﻧﺗر ، 7100 اﻟﻛﺎف             </p>
    <p> اﻟﻛﺎف ، اﻟﺷرﻗﯾﺔ</p>
    <p>  اﻟﮭﺎﺗف :  44 48 29 / 25 44 48 29 </p>
    <p>اﻟدﻓﺗر اﻟﺗﺟﺎري:Kef B11192632016-اﻟﺗرﻗﯾم اﻟﺟﺑﺎﺋﻲ :Kef B1A/A/M/000/  1473926    </p>
</div>

        </div>

    </div>

</div>

<!-- Mainly scripts -->
<script src="{{asset('js/bootstrap.min.js') }}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js') }}"></script>

<script type="text/javascript">
    //window.print();
    $(document).ready(function(){
        var sum = 0;

        $(".total").each(function(i, obj)  {
            if($.trim($(".currency:eq("+i+")").html()) == "TND") {
                $('.total:eq('+i+')').html($(".amount:eq("+i+")").html());
            }
            else {
                $(this).html((parseFloat($(".amount:eq("+i+")").html())*parseFloat($("#taux").text())).toFixed(2));
            }
            sum += parseFloat($(this).html());
        });
        $("#total").html(sum);



        $("#taux").on('input',function(){
            //Do calculation and change value of other span2,span3 here
            console.log("Taux changed");
            var total = 0;
            $(".total").each(function(i, obj)  {
                if($.trim($(".currency:eq("+i+")").html()) == "TND") {
                    $('.total:eq('+i+')').html($(".amount:eq("+i+")").html());
                }
                else {
                    $(this).html((parseFloat($(".amount:eq("+i+")").html())*parseFloat($("#taux").text())).toFixed(2));
                }
                total += parseFloat($(this).html());
            });
            $("#total").html(total);
        });

       window.print(); 
    });

</script>

</body>

</html>
