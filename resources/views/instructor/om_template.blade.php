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

            </div>

            <div class="col-sm-6 text-right">
                <img src="{{asset('images/frontend_images/logo-light.png') }}">
            </div>
        </div>
<hr>
        <div class="col-sm-12 text-right">
                <p>
                    <span><strong>Tunis le {{date("d/m/Y")}}</strong></span><br>
                </p>
        </div>
        <div class="text-center">
            <h2><strong>Ordre de mission</strong></h2>
            <h3><strong>{{$om[0]->om_id}} 
            @foreach( $events as $event )
                {{$event->country}}/{{$event->customer}} 
            @endforeach
            </strong></h3>
        </div>

        <div class="row">
            <div class="col-sm-6">

            </div>

            
        </div>


        <br>
        <br>

    <div class="row">
        <div class="col-sm-6">

        </div>

        <div class="col-sm-6 text-right">

        </div>
    </div>

    <div class="row">
        <div class="text-center">
            <h3>Monsieur {{$event->user->name}} Formateur IP/MPLS, doit se rendre à : </h3><br>
        </div>
    </div>


    @foreach($events as $event)
    <div class="text-center">
        <h3>{{$event->customer}} , {{$event->location}} , {{$event->country}}</h3>
    </div>
    @endforeach
    <div class="row">
        <div class="text-center">
        <h3>Pour animer une / des formation(s) intitulées :</h3>
            @foreach($events as $event)
                <h3>{{$event->title}}</h3>
            @endforeach
        </div>

    </div><!-- /table-responsive -->
    <br><br>
        <div class="row">
            <div class="col-sm-6">
                <h3><strong>Date de d&eacute;  part :</strong> {{date_format(date_create($om[0]->start_date), 'd/m/Y')}} </h3>
                <h3><strong>Date de retour : </strong>{{date_format(date_create($om[0]->end_date), 'd/m/Y')}}</h3>
                <h3><strong>Somme &aacute;  recevoir :</strong> {{$om[0]->prime_amount}} €</h3>
                <h3><strong>Visa : </strong>Oui</h3>
                <h3><strong>N°/Passeport :</strong> {{$event->user->passport_number}} </h3>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <hr>
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <p>SmartSkills SARL • Appartement B-14, 2ème étage Nour</p>
                    <p>Centre, Avenue Hedi Chaker 7100 LeKef Est, Le Kef</p>
                    <p>Tél: 29 48 44 25 / 29 48 44 26  </p>
                    <p>RC: Kef B11192632016 Code TVA: 1473926/A/A/M/000</p>
                </td>
                <td style="vertical-align: top;">
                    <p> ﺳﻣﺎرت ﺳﻛﯾﻠس ش.ذ.م.م ﺷﻘﺔ ب • . 14- اﻟطﺎﺑﻖ اﻟﺛﺎﻧﻲ . ﺷﺎرع اﻟﮭﺎدي ﺷﺎﻛر   اﻟﻧور ﺳﻧﺗر ، 7100 اﻟﻛﺎف             </p>
                    <p> اﻟﻛﺎف ، اﻟﺷرﻗﯾﺔ</p>
                    <p>  اﻟﮭﺎﺗف :  44 48 29 / 25 44 48 29 </p>
                    <p>اﻟدﻓﺗر اﻟﺗﺟﺎري:Kef B11192632016-اﻟﺗرﻗﯾم اﻟﺟﺑﺎﺋﻲ :Kef B1A/A/M/000/  1473926    </p>
                </td>
            </tr>
            </table>
        <div class="row">
       
           
            <!--<div class="col-md-6">
                <p>SmartSkills SARL • Appartement B-14, 2ème étage Nour</p>
                <p>Centre, Avenue Hedi Chaker 7100 LeKef Est, Le Kef</p>
                <p>Tél: 29 48 44 25 / 29 48 44 26  </p>
                <p>RC: Kef B11192632016 Code TVA: 1473926/A/A/M/000</p>
            </div>
            <div class="col-md-6 main-content text-right">
                <p>    ﺳﻣﺎرت ﺳﻛﯾﻠس ش.ذ.م.م ﺷﻘﺔ ب • . 14- اﻟطﺎﺑﻖ اﻟﺛﺎﻧﻲ . ﺷﺎرع اﻟﮭﺎدي ﺷﺎﻛر   اﻟﻧور ﺳﻧﺗر ، 7100 اﻟﻛﺎف             </p>
                <p> اﻟﻛﺎف ، اﻟﺷرﻗﯾﺔ</p>
                <p>  اﻟﮭﺎﺗف :  44 48 29 / 25 44 48 29 </p>
                <p>اﻟدﻓﺗر اﻟﺗﺟﺎري:Kef B11192632016-اﻟﺗرﻗﯾم اﻟﺟﺑﺎﺋﻲ :Kef B1A/A/M/000/  1473926    </p>
            </div>
            -->
        </div>

    </div>

</div>

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js') }}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js') }}"></script>

<script type="text/javascript">
    window.print();
</script>

</body>

</html>
