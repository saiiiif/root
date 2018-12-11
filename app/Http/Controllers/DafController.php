<?php

namespace App\Http\Controllers;

use App\User;
use App\Trip;
use App\Events;
use App\Pdcs;
use DB;
use Notification;
use Alert;
//use App\Providers\SweetAlertServiceProvider;

use Illuminate\Http\Request;

class DafController extends Controller
{
  public function index() {

      return view('Daf.DafDashbord');
  }

public function showtrips()

      {
       $trips =Trip::all();
       $users=User::all();
       $events=Events::all();
       $pdcs=Pdcs::all();


        //   DB::table('trips')->select('user_id','events_id','name','prime_amount','om_id','start_date','end_date','status')->get();

            Alert::message('Robots are working!');
          return view('Daf.DafDashbord',compact('trips','events','users','pdcs'));




      }
 public function ValideDaf(Request $request){
  $events=Events::All();

  $users=User::all();
  $events=Events::all();

$aa=$request["idDAF"];
$cc="Valide by DAF";
//dd($aa);
//die();

     switch($request->input('submit')){
  case 'valide':
    // code...

       DB::table('trips')
                ->where('id',$aa )
                ->update(['status' => $cc]);
              Alert::message('Message', 'Optional Title');
           $trips =Trip::all();
Alert::message('Robots are working!');
     return redirect ('/daf');
break;

case 'Invalide':
  $aa=intval($request["idDAF"]);
  $cc="Invalide by DAF" ;
  DB::table('trips')
->where('id',$aa)
->update(['status'=>$cc]);
 $trips =Trip::all();
  Alert::message('Robots are working!');
return redirect ('/daf');
  break;

case 'generateOm':

$bb=$request->input("idDAF");
  $listevent = Events::where('om_id', $bb)->get();
  $listOm    = Trip::where('om_id', $bb)->get();

  $data = ['title' => 'Ordre de Mission'];
    return view('instructor.om_template', ['events' => $listevent])->with(['om' => $listOm]);
    break;
  case 'Montant_Bank' :
        $aa=intval($request["idDAF"]);
       $cc="Montant_Bank" ;
        DB::table('trips')
           ->where('id',$aa)
            ->update(['status'=>$cc]);
        $trips =Trip::all();
        Alert::message('Robots are working!');
      return redirect ('/daf');
      break;
         case 'Montant_Recu' :
             $aa=intval($request["idDAF"]);
             $cc="Montant_Recu" ;
             DB::table('trips')
                 ->where('id',$aa)
                 ->update(['status'=>$cc]);
             $trips =Trip::all();
             return redirect ('/daf');
             break;
  //$pdf = PDF::loadView('instructor.om_template', $data);

  //return $pdf->download('hdtuto.pdf');
  return view('instructor.om_template', ['events'=>$listevent])->with(['om'=>$listOm]);
  break;
}

} 






               //$trips=Trip::all();
               //dd($trips);
               //die

   //return redirect('Daf.DafDashbord',compact('trips','events','users'));


 public function showpdcs()

       {
        $events=Events::All();
        $trips =Trip::all();
        $users=User::all();
        $events=Events::all();
        $pdcs=Pdcs::all();


         //   DB::table('trips')->select('user_id','events_id','name','prime_amount','om_id','start_date','end_date','status')->get();
Alert::message('Robots are working!');
           return view('daf.PdcDaf',compact('trips','events','users','pdcs'));




       }

public function validepdcs(Request $request){

  $events=Events::All();
  $trips =Trip::all();
  $users=User::all();
  $events=Events::all();



$aa=intval($request["id"]);
$cc=1;

if($request["submitbutton"]=="valide"){
DB::table('pdcs')
->where('id',$aa)
->update(['validated_DAF'=>$cc]);
  $pdcs=Pdcs::all();

Alert::message('Robots are working!');
 return redirect('/dafpdc');
}
else{
$cc=0;
DB::table('pdcs')
->where('id',$aa)
->update(['validated_DAF'=>$cc]);
  $pdcs=Pdcs::all();
return redirect('/dafpdc');
Alert::message('Robots are working!');
}


}



}
