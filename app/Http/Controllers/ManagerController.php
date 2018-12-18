<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Trip;
use App\Events;
use App\Pdcs;
use DB;


class ManagerController extends Controller
{
  public function showtrips()

        {
            // $events=Events::All();
         $trips =Trip::all();
         $users=User::all();
         $events=Events::all();
//            echo '<pre>';
//            foreach ($trips as $trip){
//                print_r($trip->events);
//            }
//
//            echo '<pre>';
//            die();

            //   DB::table('trips')->select('user_id','events_id','name','prime_amount','om_id','start_date','end_date','status')->get();

            return view('manager.manager',compact('trips','events','users'));




        }

        public function ValideManager(Request $request){
         $events=Events::All();

         $users=User::all();
         //$events=Events::all();


         if($request["submitbutton"]=="valide"){
            $aa=intval($request["id"]);
            $cc="Valide by Manager";
         DB::table('trips')
         ->where('id',$aa)
         ->update(['status'=>$cc]);


             $trips =Trip::all();
            return redirect ('/manager');
         }
         else{
        $aa=intval($request["id"]);
        $cc="Invalide by Manager ";
         DB::table('trips')
         ->where('id',$aa)
         ->update(['status'=>$cc]);
               $trips =Trip::all();

        return redirect('/manager');

         }

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
         ->update(['validated_manager'=>$cc]);
           $pdcs=Pdcs::all();

          return redirect('/managerpdc');
         }
         else{
         $cc=2;
         DB::table('pdcs')
         ->where('id',$aa)
         ->update(['validated_manager'=>$cc]);
           $pdcs=Pdcs::all();
         return redirect('/managerpdc');

         }


         }


         public function showpdcs()

               {
                $events=Events::All();
                $trips =Trip::all();
                $users=User::all();
                $events=Events::all();
                $pdcs=Pdcs::all();


                 //   DB::table('trips')->select('user_id','events_id','name','prime_amount','om_id','start_date','end_date','status')->get();

                   return view('manager.managerpdc',compact('trips','events','users','pdcs'));




               }






        }
