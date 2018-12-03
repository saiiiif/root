<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Invoice Print</title>

    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    <script>
 var tablesToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,'
            , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
            + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
            + '<Styles>'
            + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
            + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
            + '</Styles>'
            + '{worksheets}</Workbook>'
            , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
            , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
            return function(tables, wsnames, wbname, appname) {
            var ctx = "";
            var workbookXML = "";
            var worksheetsXML = "";
            var rowsXML = "";

            for (var i = 0; i < tables.length; i++) {
                if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
                for (var j = 0; j < tables[i].rows.length; j++) {
                rowsXML += '<Row>'
                for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
                    var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
                    var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
                    var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
                    dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
                    var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
                    dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
                    ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                        , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                        , data: (dataFormula)?'':dataValue
                        , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                        };
                    rowsXML += format(tmplCellXML, ctx);
                }
                rowsXML += '</Row>'
                }
                ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
                worksheetsXML += format(tmplWorksheetXML, ctx);
                rowsXML = "";
            }

            ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
            workbookXML = format(tmplWorkbookXML, ctx);

        //console.log(workbookXML);

            var link = document.createElement("A");
            link.href = uri + base64(workbookXML);
            link.download = wbname || 'Workbook.xls';
            link.target = '_blank';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            }
        })();
    </script>
</head>
<style>
    .main-content {
       /*direction: rtl;*/  /* Right to Left */
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
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
    <div class="row">
        <div class="col-sm-6">
        <!--form id="excel"  action="{{url('instructor/excel/generate/')}}" method="POST" >
            @csrf
            <input type="hidden" id="dataPost" name="dataPost" />
            <button type="submit" class="btn-excel btn btn-primary hidden-print"><span class="glyphicon glyphicon-pdf" aria-hidden="true"></span> Excel</button>
        </form>-->

        <button class="btn btn-primary hidden-print" onclick="tablesToExcel(['invoice','account_expenses'], ['Invoice','Account of expenses'], 'facture.xls', 'Excel')">Export to Excel</button>

        </div>

        <div class="col-sm-6 text-right">

        </div>
    </div>
    <br>
    <br>
    <div class="table-bordered" >
        <!--<table class="table" id="account_expenses"> <tbody> <tr> <td style="width:10%;" class="text-center"></td> <td></td> <td><div class="softmerge-inner" style="width: 366px; left: -1px;"><span style="font-size:16pt;font-family:Arial;font-weight:bold;color:#000000;">ACCOUNT OF EXPENSES </span></div></td> <td></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"></td> <td></td> <td><span style="font-size:14pt;font-family:Arial;font-weight:bold;color:#000000;">Attachment to Invoice</span></td> <td><span style="font-size:14pt;font-family:Arial;font-weight:bold;color:#000000;">02/2018</span></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"></td> <td></td> <td></td> <td><span style="font-size:10pt;font-family:Arial;">17 janvier 2018</span></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"><span style="font-size:9pt;font-family:Arial;color:#000000;">Traveller name</span></td> <td></td> <td></td> <td><span style="font-size:10pt;font-family:Arial;"></span></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">Smart Skills</span></td> <td></td> <td></td> <td><span style="font-size:10pt;font-family:Arial;"></span></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"><span style="font-size:9pt;font-family:Arial;color:#000000;">Travel reason</span></td> <td></td> <td></td> <td><span style="font-size:10pt;font-family:Arial;"></span></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"></td> <td></td> <td></td> <td><span style="font-size:10pt;font-family:Arial;"></span></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"><span style="font-size:9pt;font-family:Arial;color:#000000;">Rates</span></td> <td></td> <td></td> <td> </td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center"></td> <td><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">oanda.com</span> <strong id="date" contenteditable="true">({{date("d/m/Y")}})</strong></td> <td><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;" id="taux" contenteditable="true">3.1</span><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;"> TND = 1</span> <span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;" id="currency" contenteditable="true"> EUR</span> </td> <td></td> <td> </td> </tr> <tr> <td style="width:10%;" class="text-center">Receipt No</td> <td>Description</td> <td>Amount</td> <td>Currency</td> <td>Total TND</td> </tr> <tr id="flight" data-type="1"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">1</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Flight</span> </td> <td>0,00 </td> <td>EUR </td> <td>0,00 </td> </tr> <tr id="transport" data-type="2"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">2</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Transport</span> </td> <td>0,00 </td> <td>EUR </td> <td>0,00 </td> </tr> <tr id="stamp" data-type="3"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">3</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Stamp</span> </td> <td>0,00 </td> <td>TND </td> <td>0,00 </td> </tr> <tr id="assurance" data-type="4"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">4</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Assurance</span> </td> <td> </td> <td> </td> <td> </td> </tr> <tr id="parcking" data-type="5"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">5</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Parcking</span> </td> <td> </td> <td> </td> <td> </td> </tr> <tr id="rentCar" data-type="6"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">6</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">rent a car</span> </td> <td> </td> <td> </td> <td> </td> </tr> <tr id="fuel"> <td class="text-center" data-type="7"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">7</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Fuel</span> </td> <td> </td> <td> </td> <td> </td> </tr> <tr id="payage"> <td class="text-center" data-type="8"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">8</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Payage</span> </td> <td> </td> <td> </td> <td> </td> </tr> <tr id="perdiem"> <td class="text-center"> <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">9</span></td> <td> <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Perdiem</span> </td> <td> </td> <td> </td> <td> </td> </tr> <tr> <td></td> <td></td> <td></td> <td><p class="pull-right"><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">TOTAL / EUR</span></p></td> <td><span style="font-size:10pt;font-family:Arial;font-style:italic;color:#800000;">146,68 </span></td> </tr> </tbody></table>-->

            <table class="table" id="invoice">
                    <tr>
                        <td></td>
                        <td class="text-center font-weight-bold"><span style="font-size:16pt;font-family:Arial;font-weight:bold;color:#000000;">INVOICE - FACTURA</span></td>
                        <td class="text-center" colspan="3"><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">Smart Skills</span></td>
                    </tr>
                    <tr>
                        <td>Invoicing address</td>
                        <td></td>
                        <td>Invoice date</td>
                        <td colspan="2" contenteditable="true">17/01/2018</td>
                    </tr>
                    <tr>
                        <td></td>

                        <td class="text-center font-weight-bold">

                        <span contenteditable="true">Upknowledge Oy Hiomotie 19	00380 Helsinki	Finlandia	</span></td>
                        <td >Invoice number</td>
                        <td colspan="2">02/2018</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Terms of payment</td>
                        <td colspan="2" contenteditable="true">14 days</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Bank</td>
                        <td colspan="2">Zitouna Bank</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>SWIFT</td>
                        <td colspan="2">BZITTNTTXXX	</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>IBAN</td>
                        <td colspan="2">TN5925002000000037943115</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Account</td>
                        <td colspan="2">5925002000000037943115</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Currency</td>
                        <td colspan="2">EUR</td>
                    </tr>
                    <tr>
                        <td>Customer VAT ID</td>
                        <td>FI10234484</td>
                        <td colspan="3" rowspan="6">Other information
                        Reverse charge.
                        Smart Skills
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div>
                        <div>Customer invoice approver</div>
                        </div>
                        </td>
                        <td>Ari Kallio</td>

                    </tr>
                    <tr>
                        <td >Customer e-mail</td>
                        <td>invoice@upknowledge.com</td>

                    </tr>
                    <tr>
                        <td>Customer telephone</td>
                        <td>+358 (0) 40 480 5806</td>

                    </tr>
                    <tr>
                        <td>
                        <div>
                        <div>Customer purchase order number</div>
                        </div>
                        </td>
                        <td>----</td>

                    </tr>
                    <tr>
                        <td>
                        <div>
                        <div>Customer other references</div>
                        </div>
                        </td>
                        <td>----</td>

                    </tr>

                    <tr>
                        <td>Product(s)</td>
                        <td>Explanation</td>
                        <td>Units</td>
                        <td>Unit price </td>
                        <td>Total</td>
                    </tr>
                    <tr>
                    <!-- rowspan="5"-->
                        <td >TRAVEL</td>
                        <td contenteditable="true"><p>S.A107189 LCW 444 H/ AAA R10 /UPK customer</p>
                        <p>Location: GREECE</p>
                        <p>Course date: from 30/01/2018  to 02/02//2018 & from 05/02 to 07/02/2018</p>
                        <p>Trainer: Wajih LETAIEF</p>		</td>
                        <td id="u">{{$event->delivery_days}}</td>
                        <td id="up"contenteditable="true">0.00 </td>
                        <td><span id="totalTravel">0.00</span> €</td>
                    </tr>
                    <tr>
                        <td ></td>
                        <td>See account of expenses</td>
                        <td>1</td>
                        <td> </td>
                        <td><span id="accountExpenses">146.68</span> €</td>
                    </tr>
                    <tr>
                        <td ></td>
                        <td>Total EUR (VAT 0%)</td>
                        <td></td>
                        <td> </td>
                        <td><span id="totalExpenses">146.68</span> €</td>
                    </tr>
                    <tr>
                        <td ></td>
                        <td>VAT 0%</td>
                        <td></td>
                        <td> </td>
                        <td><span id="vat">0.00</span> €</td>
                    </tr>
                    <tr>
                        <td ></td>
                        <td>Total</td>
                        <td></td>
                        <td> </td>
                        <td><span id="totalFacture">146.68</span> €</td>
                    </tr>
                    <tr>
                        <td rowspan="4">Invoicing company address</td>
                        <td rowspan="4">Smart Skills
                        Appartement B-14, 2ème étage Nour Centre, Avenue Hedi Chaker 7100 LeKef Est, Le Kef
                        Tunisia	</td>
                        <td colspan="2">VAT number or Personal ID</td>
                        <td >1473926A </td>

                    </tr>
                    <tr>
                        <td colspan="2">Business Identity Code</td>
                        <td >B11192632016 </td>

                    </tr>
                    <tr>

                        <td colspan="2">Telephone</td>
                        <td>21629484426	 </td>

                    </tr>
                    <tr>

                        <td colspan="2">E-mail</td>
                        <td>contact@smartskills.tn</td>

                    </tr>
            </table>

            <table class="table" id="account_expenses">
                <tr>
                <td style="width:10%;" class="text-center"></td>
                    <td></td>
                    <td><div class="softmerge-inner" style="width: 366px; left: -1px;"><span style="font-size:16pt;font-family:Arial;font-weight:bold;color:#000000;">ACCOUNT OF EXPENSES </span></div></td>
                    <td></td>
                    <td> </td>

                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"></td>
                    <td></td>
                    <td><span style="font-size:14pt;font-family:Arial;font-weight:bold;color:#000000;">Attachment to Invoice</span></td>
                    <td><span style="font-size:14pt;font-family:Arial;font-weight:bold;color:#000000;">02/2018</span></td>
                    <td> </td>

                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"></td>
                    <td></td>
                    <td></td>
                    <td><span style="font-size:10pt;font-family:Arial;">17 janvier 2018</span></td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"><span style="font-size:9pt;font-family:Arial;color:#000000;">Traveller name</span></td>
                    <td></td>
                    <td></td>
                    <td><span style="font-size:10pt;font-family:Arial;"></span></td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">Smart Skills</span></td>
                    <td></td>
                    <td></td>
                    <td><span style="font-size:10pt;font-family:Arial;"></span></td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"><span style="font-size:9pt;font-family:Arial;color:#000000;">Travel reason</span></td>
                    <td></td>
                    <td></td>
                    <td><span style="font-size:10pt;font-family:Arial;"></span></td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"></td>
                    <td></td>
                    <td></td>
                    <td><span style="font-size:10pt;font-family:Arial;"></span></td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"><span style="font-size:9pt;font-family:Arial;color:#000000;">Rates</span></td>
                    <td></td>
                    <td></td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width:10%;" class="text-center"></td>
                    <td><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">oanda.com</span> <strong id="date" contenteditable="true">({{date("d/m/Y")}})</strong></td>
                    <td><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;" id="taux" contenteditable="true">3.32</span><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;"> TND =  1</span> <span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;" id="currency" contenteditable="true"> EUR</span>
                    </td>
                    <td></td>
                    <td> </td>
                </tr> 
                <tr>
                    <td style="width:10%;" class="text-center">Receipt No</td>
                    <td>Description</td>
                    <td>Amount</td>
                    <td>Currency</td>
                    <td>EUR</td>
                </tr>
                <tr id="flight" data-type="1">
                    <td  class="text-center">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">1</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Flight</span>
                    </td>
                    <td class="amount">{{$pdcType[1]["amount"]}}</td>
                    <td class="currency">{{$pdcType[1]["currency"]}}</td>
                    <td class="total">@if($pdcType[1]["currency"] == "EUR")
                     {{$pdcType[1]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="transport" data-type="2">
                    <td  class="text-center">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">2</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Transport</span>
                    </td>
                    <td class="amount">{{$pdcType[2]["amount"]}}</td>
                    <td class="currency">{{$pdcType[2]["currency"]}}</td>
                    <td class="total">@if($pdcType[2]["currency"] == "EUR")
                     {{$pdcType[2]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="stamp" data-type="3">
                    <td  class="text-center">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">3</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Stamp	</span>
                    </td>
                    <td class="amount">{{$pdcType[3]["amount"]}}</td>
                    <td class="currency">{{$pdcType[3]["currency"]}}</td>
                    <td class="total">@if($pdcType[3]["currency"] == "EUR")
                     {{$pdcType[3]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="assurance" data-type="4">
                    <td  class="text-center">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">4</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Assurance	</span>
                    </td>
                    <td class="amount">{{$pdcType[4]["amount"]}}</td>
                    <td class="currency">{{$pdcType[4]["currency"]}}</td>
                    <td class="total">@if($pdcType[4]["currency"] == "EUR")
                     {{$pdcType[4]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="parcking" data-type="5">
                    <td  class="text-center">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">5</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Parcking	</span>
                    </td>
                    <td class="amount">{{$pdcType[5]["amount"]}}</td>
                    <td class="currency">{{$pdcType[5]["currency"]}}</td>
                    <td class="total">@if($pdcType[5]["currency"] == "EUR")
                     {{$pdcType[5]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="rentCar" data-type="6">
                    <td  class="text-center">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">6</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">rent a car	</span>
                    </td>
                    <td class="amount">{{$pdcType[6]["amount"]}}</td>
                    <td class="currency">{{$pdcType[6]["currency"]}}</td>
                    <td class="total">@if($pdcType[6]["currency"] == "EUR")
                     {{$pdcType[6]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="fuel">
                    <td  class="text-center" data-type="7">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">7</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Fuel</span>
                    </td>
                    <td class="amount">{{$pdcType[7]["amount"]}}</td>
                    <td class="currency">{{$pdcType[7]["currency"]}}</td>
                    <td class="total">@if($pdcType[7]["currency"] == "EUR")
                     {{$pdcType[7]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="payage">
                    <td  class="text-center" data-type="8">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">8</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Payage</span>
                    </td>
                    <td class="amount">{{$pdcType[8]["amount"]}}</td>
                    <td class="currency">{{$pdcType[8]["currency"]}}</td>
                    <td class="total">@if($pdcType[8]["currency"] == "EUR")
                     {{$pdcType[8]["amount"]}}
                     @endif </td>
                </tr>
                <tr id="perdiem">
                    <td  class="text-center" data-type="9">
                        <span style="font-size:9pt;font-family:Arial;font-weight:bold;color:#000000;">9</span></td>
                    <td>
                        <span style="font-size:8pt;font-family:Arial;font-weight:bold;color:#000000;">Perdiem</span>
                    </td>
                    <td class="amount">{{$pdcType[9]["amount"]}}</td>
                    <td class="currency">{{$pdcType[9]["currency"]}}</td>
                    <td class="total">@if($pdcType[9]["currency"] == "EUR")
                     {{$pdcType[9]["amount"]}}
                     @endif </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right"><span style="font-size:10pt;font-family:Arial;font-weight:bold;color:#000000;">TOTAL / EUR</span></p></td>
                    <td id="total"><span style="font-size:10pt;font-family:Arial;font-style:italic;color:#800000;">146.68  </span></td>
                </tr>

            </table>

    </div><!-- /table-responsive -->



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
   // window.print();

    $(document).ready(function(){

        var total = 0;
        for(i=1; i< $(".total").length; i++){
            if($.trim($(".total:eq("+i+")").html()) == "" && $.trim($(".amount:eq("+i+")").html()) != ""){
            // console.log(i + " " +$.trim($(".amount:eq("+i+")").html()));
                $(".total:eq("+i+")").html( (parseFloat($(".amount:eq("+i+")").html()) / parseFloat($("#taux").html())).toFixed(2) );
            }
            if($.trim($(".total:eq("+i+")").html()) != "") {
                total = total + parseFloat($(".total:eq("+i+")").html());
            }
        }
        // console.log(total);
        $("#total span").html(total);
        $("#accountExpenses").html(total);

        $("#totalExpenses").html(parseFloat($("#totalTravel").html())+parseFloat($("#accountExpenses").html()));
        $("#totalFacture").html(parseFloat($("#vat").html())+parseFloat($("#totalExpenses").html()));
        $("#totalTravel").html(parseFloat($("#u").html())*parseFloat($("#up").html()));

        $("#taux").on('input',function(){
            //Do calculation and change value of other span2,span3 here
            console.log("Taux changed");
            var total = 0;
            $(".total").each(function(i, obj)  {
                if($.trim($(".currency:eq("+i+")").html()) == "EUR") {
                    $('.total:eq('+i+')').html($(".amount:eq("+i+")").html());
                }
                if($.trim($(".total:eq("+i+")").html()) != "" ){
                    if($.trim($(".currency:eq("+i+")").html()) != "EUR")
                        $(this).html((parseFloat($(".amount:eq("+i+")").html())/parseFloat($("#taux").html())).toFixed(2));

                    total = total + parseFloat($(".total:eq("+i+")").html());
                }



                console.log(total);
            });
            $("#total span").html(total);
            $("#accountExpenses").html(total);
            $("#totalExpenses").html(parseFloat($("#totalTravel").html())+parseFloat($("#accountExpenses").html()));
            $("#totalFacture").html(parseFloat($("#vat").html())+parseFloat($("#totalExpenses").html()));

        });

        $("#up").on('input',function(){
            $("#totalTravel").html(parseFloat($("#u").html())*parseFloat($("#up").html()));
            $("#totalExpenses").html(parseFloat($("#totalTravel").html())+parseFloat($("#accountExpenses").html()));
            $("#totalFacture").html(parseFloat($("#vat").html())+parseFloat($("#totalExpenses").html()));
        });

        $("#excel").on('submit',function(e){
            //e.preventDefault();
            var dataPost = $.trim($("#account_expenses").parent().html());
            console.log(dataPost);
/*
            $.ajax({
                    url:"{{url('instructor/excel/generate/')}}",
                    method:"POST",
                    data: JSON.stringify( {"dataPost" :dataPost}),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        console.log("success");

                    }
                });
*/
           // return false;
        });

        $('.btn-excel').click(function(){
            var dataPost = $.trim($("#account_expenses").parent().html())
            $("#dataPost").val(dataPost);
            //console.log("{{url('instructor/excel/generate/')}}/"+encodeURI($("#account_expenses").parent().html()));

  //          window.location = "{{url('instructor/excel/generate/')}}/"+encodeURI($("#account_expenses").parent().html());
        });
    });


</script>

</body>

</html>
