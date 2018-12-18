<?php

namespace App\Http\Controllers;
use App\Events;
use App\Http\Requests\eventRequest;
use Illuminate\Http\Request;
use Notification;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Pdcs;
use App\Trip;
use Auth;
use DB;
use PDF;

class EventsController extends Controller
{
    public function index()
    {

        if (Auth::User()->admin) {
            $listevent = Events::All();

            $session_list = Pdcs::All();
            $om_id = Trip::All();

            $om = DB::table('trips')
                ->join('events', 'trips.om_id', '=', 'events.om_id')
                ->select('events.*', 'trips.status as om_status', 'trips.start_date as om_startDate', 'trips.end_date as om_endDate')
                ->get()->toArray();

            //  echo '<pre>'; print_r($om); die;
            //  echo '<pre>'; print_r($listevent); die;

        } else {
            $listevent = Events::where('user_id', Auth::user()->id)->get();
            $session_list = Pdcs::All();
            $om = DB::table('trips')
                ->join('events', 'trips.om_id', '=', 'events.om_id')
                ->select('events.*', 'trips.status as om_status', 'trips.start_date as om_startDate', 'trips.end_date as om_endDate')
                ->where('trips.user_id', Auth::user()->id)
                ->get();
            //echo '<pre>'; print_r($om); die;
            $om_id = Trip::where('user_id', Auth::user()->id)->get();


        }
        //return $session_list;
        return view('instructor.manage_all_session', ['events' => $listevent])->with(['om' => $om])->with(['omList' => $om_id])->with(['sessions' => $session_list]);
    }

    public function create()
    {

        // Trip::find( Auth::user()->id );

        $pass = substr(md5(uniqid(mt_rand(), true)), 0, 8);

        return view('instructor.create_session', ['pass' => $pass]);
    }

    public function validateStatus(Request $request)
    {

        if (Auth::user()->admin == 1 && !strcmp(Auth::user()->title, "DAF")) {
            $event = Trip::find($request->input('om_id'));
            if (!empty($event)) {
                $event->status = "Valide by DAF";
                $event->save();
            }
        } else if (Auth::user()->admin == 1 && !strcmp(Auth::user()->title, "Manager")) {
            $event = Trip::find($request->input('om_id'));
            if (!empty($event)) {
                $event->status = "Valide by manager";
                $event->save();
            }
        } else {
            return array('Error' => 'You can not validate an OM ');
        }
        return array('Success' => 'OM valide');
    }

    public function validatePdc(Request $request)
    {

        $pdcs = Pdcs::where('events_id', $request->event_id)->get();

        foreach ($pdcs as $pdc) {
            if (strcmp(Auth::user()->title, "DAF") == 0)
                $pdc->validated_DAF = 1;
            else if (strcmp(Auth::user()->title, "Instructor") == 0)
                $pdc->validated_instructor = 1;
            $pdc->save();
        }

        $notification = array(
            'message' => 'PDC valider avec success',
            'alert-type' => 'success'
        );
        return redirect('/instructor/sessions')->with($notification);
    }
    public function validatePdcInstructor(Request $request)
    { $id = Request('idtest');
     $pdc=DB::Update("Update stm_pdcs set 	validated_instructor = '1' where 	events_id=$id");
        $notification = array(
            'message' => 'PDC valider avec success',
            'alert-type' => 'success'
        );
       return redirect('/instructor/sessions')->with($notification);
       // return $id;
    }
    public function generate_om($id)
    {

        $listevent = Events::where('om_id', $id)->get();
        $listOm = Trip::where('om_id', $id)->get();

        $data = ['title' => 'Ordre de Mission'];

        //$pdf = PDF::loadView('instructor.om_template', $data);

        //return $pdf->download('hdtuto.pdf');
        return view('instructor.om_template', ['events' => $listevent])->with(['om' => $listOm]);
    }

    public function generate_pdc($id)
    {

        $trip = Trip::find($id);
        $listPdc = Pdcs::where('events_id', $trip->events_id)->get();
        $listevent = Events::find($trip->events_id);

        $data = ['title' => 'Piece de caisse'];

        //$pdf = PDF::loadView('instructor.om_template', $data);

        //return $pdf->download('hdtuto.pdf');
        return view('instructor.pdc_template', ['pdcs' => $listPdc])->with(['event' => $listevent]);
    }

    public function generate_facture($id)
    {

        $trip = Trip::find($id);
        $trip->events_id;
        $listPdc = Pdcs::where('events_id', $trip->events_id)->get();
        $listevent = Events::find($trip->events_id);

        for ($i = 1; $i <= 10; $i++) {
            $pdcType[$i]["amount"] = "";
            $pdcType[$i]["currency"] = "";
        }

        foreach ($listPdc as $pdc) {
            $pdcType[$pdc->type]["amount"] = $pdc->amount;
            $pdcType[$pdc->type]["currency"] = $pdc->currency;
        }


        $data = ['title' => 'Facture'];

        //$pdf = PDF::loadView('instructor.om_template', $data);

        //return $pdf->download('hdtuto.pdf');
        return view('instructor.facture_template', ['pdcs' => $listPdc])->with(['event' => $listevent])->with(["pdcType" => $pdcType]);

    }

    public function generate_excel(Request $request)
    {

        header('Content-Type: application/force-download');
        header('Content-disposition: attachment; filename=facture.xls');
        // Fix for crappy IE bug in download.
        header("Pragma: ");
        header("Cache-Control: ");

        $data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
                    <head>
                        <!--[if gte mso 9]>
                        <xml>
                            <x:ExcelWorkbook>
                                <x:ExcelWorksheets>
                                    <x:ExcelWorksheet>
                                        <x:Name>Sheet 1</x:Name>
                                        <x:WorksheetOptions>
                                            <x:Print>
                                                <x:ValidPrinterInfo/>
                                            </x:Print>
                                        </x:WorksheetOptions>
                                    </x:ExcelWorksheet>
                                </x:ExcelWorksheets>
                            </x:ExcelWorkbook>
                        </xml>
                        <![endif]-->
                    </head>

                    <body>';


        $data = $data . $request->dataPost . '</body></html>';

        echo $data;

    }

    public function deliveryDay()
    {

        $listevent = Events::where('user_id', Auth::user()->id)->get();
        $deliverydays = 0;
        foreach ($listevent as $event) {
            $deliverydays = $deliverydays + $event->delivery_days;
        }
        return array(
            'delivery_days' => $deliverydays
        );

    }

    public function imagesUploadPost(Request $request)
    {

        /*
        request()->validate([
            'photos' => 'required',
        ]);
        */
        $pdc_count = count($request->input("label"));


        // echo "<pre>";  print_r($request->all()); exit;


        // save pdc
        $image_url = "";
        $success = true;
        for ($i = 0; $i < $pdc_count; $i++) {
            /* A decommenter */
            if ($request->hasFile('photos')) {

                $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
                $files = $request->file('photos');
                $image_url = "";

                //foreach ($files as $key => $file) {
                // $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                //$value->move(public_path('images'), $imageName);
                for ($j = 0; $j < count($request->file('photos')[$i]); $j++) {

                    $image_name = $i . $files[$i][$j]->getClientOriginalName();
                    $ext = strtolower($files[$i][$j]->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = 'imagew/';
                    $image_url = $upload_path . $image_full_name . "," . $image_url;
                    $success = $files[$i][$j]->move($upload_path, $image_full_name);

                }
            }

            //if($success) {


            $pdc = new Pdcs();
            $pdc->user_id = Auth::user()->id;
            $pdc->events_id = $request->input('event_id');
            $pdc->om_id = $request->input('om_id');
            $pdc->title = $request->input('label')[$i];
            $pdc->currency = $request->input('currency')[$i];
            $pdc->type = $request->input('type')[$i];
            $pdc->amount = $request->input('amount')[$i];
            $pdc->pay = $request->input('pay')[$i];
            $pdc->status = "unpaied";
            $pdc->attach_file = $image_url;
            $pdc->save();

            //}

        }


        return response()->json(['message' => 'PDCs added Successfully.']);

        /*$notification = array(
             'message' => 'Images Uploaded Successfully',
             'alert-type' => 'success'
         );*/
        //return redirect('/instructor/sessions')->with($notification);


    }

    public function store(Request  $request)
    {
        //$result = Trip::find($request->input("om_id"));
        //foreach ($a as $key => $value) {
        //  if (($request->input('start_trip_date')> $value->start_date &&  $request->input('start_trip_date') <$value->end_date )||($request->input('end_trip_date') > $value->start_date&& $request->input('end_trip_date') <$value->end_date))
        //  }
        $result_Date = DB::SELECT("select start_date, end_date from stm_trips where user_id=?",[Auth::user()->id]) ;
        foreach ($result_Date as $key => $value) {
            if (($request->input('start_trip_date')> $value->start_date &&  $request->input('start_trip_date') <$value->end_date )||($request->input('end_trip_date') > $value->start_date&& $request->input('end_trip_date') <$value->end_date))
            {$user=Auth::user();
                Notification::send($user, new \App\Notifications\Add_sessionsNotification($user));

                $notification = array(
                    'message' => 'conflit du session ',
                    'alert-type' => 'Erreur'
                );
                return redirect('/instructor/session/create')->with('flash_message_error', 'conflit des session');
            }}


        //if ($result == null)
            $count = 0;
        //else
          //  $count = count($result);
        $eventId = 0;
        $session_count = count($request->input("name_session"));

        if ($count == 0) {
            // save OM

            // save session
            for ($i = 0; $i < $session_count; $i++) {

                $event = new Events();
                $event->user_id = Auth::user()->id;
                $event->country = $request->input('country')[$i];
                $event->locator = $request->input('locator')[$i];
                $event->title = $request->input('name_session')[$i];
                $event->om_id = $request->input('om_id');
                $event->customer = $request->input('customer')[$i];
                $event->start_date = $request->input('start_training_date')[$i];
                $event->end_date = $request->input('end_training_date')[$i];
                $event->location = $request->input('location')[$i];
                $event->delivery_days = $request->input('delivery_days')[$i];
                $event->hotel_contact = $request->input('hotel_name')[$i];
                $event->status = "DRAFT";
                $event->save();

                $eventId = $event->id;
                //print_r($eventId);
                //die;
                //dd($eventId);

            }
            $trip = new Trip();
            $trip->user_id = Auth::user()->id;
            $trip->start_date = $request->input('start_trip_date');
            $trip->end_date = $request->input('end_trip_date');
            $trip->om_id = $request->input('om_id');
            $trip->prime_amount = $request->input('amount');
            $trip->formule = $request->input('formule');
            $trip->status = "DRAFT";
            $trip->events_id = $eventId; // this is a fix for table insert error
            // we need to upload image and save the link
            $image = $request->file('picture');
            if ($image) {
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;

                $upload_path = 'imagew/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if ($success) {
                    $trip->ticket = $image_url;
                }

            }

            $trip->save();
        }

        $user = Auth::user();
        Notification::send($user, new \App\Notifications\Add_sessionsNotification($user));

        $notification = array(
            'message' => 'New Session Added  Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/sessions')->with($notification);
    }



    public function edit($id)
    {

        $event = Events::find($id);
        $this->authorize('update', $event);

        return view('instructor.edit_session', ['event' => $event]);
    }

    public function view($id)
    {

        $event = Events::find($id);
        $this->authorize('update', $event);


        $listpdc = Pdcs::where('events_id', $event->id)->get()->where('type', 'pdc');
        //dd($listpdc);

        $count = $listpdc->sum('amount');

        $list_missing_pdc = Pdcs::where('events_id', $event->id)->get()->where('type', 'missing');
        $count_missing = $list_missing_pdc->sum('amount');

        return view('instructor.view_session', ['event' => $event])->with('count', $count)->with('count_missing', $count_missing);
    }


    public function update(eventRequest $request, $id)
    {

        $event = Events::find($id);
        $event->user_id = Auth::user()->id;
        $event->country = $request->input('country');
        $event->locator = $request->input('locator');
        $event->title = $request->input('title');
        $event->customer = $request->input('customer');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->location = $request->input('location');
        $event->delivery_days = $request->input('delivery_days');


        $event->save();
        $notification = array(
            'message' => ' Session updated  Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/session/' . $id . '/edit_session')->with($notification);

    }

    public function destroy($id = null)
    {
        Events::where(['id' => $id])->delete();
        $notification = array(
            'message' => 'Session deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('/instructor/sessions')->with($notification);
    }

    public function calendar()
    {
        $tasks = Events::all();
        return view('instructor.home', compact('tasks'));

    }

    public function planned_mission(Request $request)
    {
        $result = Trip::find($request->input("om_id"));
        //foreach ($a as $key => $value) {
        //  if (($request->input('start_trip_date')> $value->start_date &&  $request->input('start_trip_date') <$value->end_date )||($request->input('end_trip_date') > $value->start_date&& $request->input('end_trip_date') <$value->end_date))
        //  }
        $result_Date = DB::SELECT("select start_date, end_date from stm_trips where user_id=?",[Auth::user()->id]) ;
        foreach ($result_Date as $key => $value) {
            if (($request->input('start_trip_date')> $value->start_date &&  $request->input('start_trip_date') <$value->end_date )||($request->input('end_trip_date') > $value->start_date&& $request->input('end_trip_date') <$value->end_date))
            {$user=Auth::user();
                Notification::send($user, new \App\Notifications\Add_sessionsNotification($user));

                $notification = array(
                    'message' => 'conflit du session ',
                    'alert-type' => 'Erreur'
                );
                return redirect('/instructor/session/create')->with('flash_message_error', 'conflit des session');
            }}


        if ($result == null)
            $count = 0;
        else
            $count = count($result);
        $eventId = 0;
        $session_count = count($request->input("name_session"));

        if ($count == 0) {
            // save OM

            // save session
            for ($i = 0; $i < $session_count; $i++) {

                $event = new Events();
                $event->user_id = Auth::user()->id;
                $event->country = $request->input('country')[$i];
                $event->locator = $request->input('locator')[$i];
                $event->title = $request->input('name_session')[$i];
                $event->om_id = $request->input('om_id');
                $event->customer = $request->input('customer')[$i];
                $event->start_date = $request->input('start_training_date')[$i];
                $event->end_date = $request->input('end_training_date')[$i];
                $event->location = $request->input('location')[$i];
                $event->delivery_days = $request->input('delivery_days')[$i];
                $event->hotel_contact = $request->input('hotel_name')[$i];
                $event->status = "planned";
                $event->save();

                $eventId = $event->id;
                //print_r($eventId);
                //die;
                //dd($eventId);

            }
            $trip = new Trip();
            $trip->user_id = Auth::user()->id;
            $trip->start_date = $request->input('start_trip_date');
            $trip->end_date = $request->input('end_trip_date');
            $trip->om_id = $request->input('om_id');
            $trip->prime_amount = $request->input('amount');
            $trip->formule = $request->input('formule');
            $trip->status = "planned";
            $trip->events_id = $eventId; // this is a fix for table insert error
            // we need to upload image and save the link
            $image = $request->file('picture');
            if ($image) {
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;

                $upload_path = 'imagew/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if ($success) {
                    $trip->ticket = $image_url;
                }

            }

            $trip->save();
        } else {
            // save session if OM exist
            for ($i = 0; $i < $session_count; $i++) {
                $event = new Events();
                $event->user_id = Auth::user()->id;
                $event->country = $request->input('country')[$i];
                $event->locator = $request->input('locator')[$i];
                $event->title = $request->input('name_session')[$i];
                $event->om_id = $request->input('om_id');
                $event->customer = $request->input('customer')[$i];
                $event->start_date = $request->input('start_training_date')[$i];
                $event->end_date = $request->input('end_training_date')[$i];
                $event->location = $request->input('location')[$i];
                $event->delivery_days = $request->input('delivery_days')[$i];
                $event->hotel_contact = $request->input('hotel_name')[$i];
                $event->status = "planned";
                $event->save();

            }
        }
        $user = Auth::user();
        Notification::send($user, new \App\Notifications\Add_sessionsNotification($user));

        $notification = array(
            'message' => 'New Session Added  and valideted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/sessions')->with($notification);

    }
    public function  ValideDRAFT(Request $request)
    {$result = Request("id");
        DB::table('trips')->where('om_id',$result)->update(array('status'=>"planned"));
        return redirect("/instructor/sessions ");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  ModifOM(Request $request)
    {$result = Request("id");
        $listevent = DB::select('SELECt * from stm_events where om_id=?',[$result]);
        $listrips=DB::select('SELECt * from stm_trips where om_id=?',[$result]);
   //  return $listevent;
     return view('instructor.Modif_session', compact( 'listevent','listrips'));
    }
    public function  planned_missionmodif(Request $request)
    {
        // check if om with id exist
        $eventId = 0;
        $session_count = count($request->input("name_session"));
        // save OM
        // save session
        for ($i = 0; $i < $session_count; $i++) {
            if (isset($request->input('id_session')[$i]))
            {
                DB::table('events')
                    ->where('id',$request->input('id_session')[$i])
                    ->update(['country' => $request->input('country')[$i],'title' => $request->input('name_session')[$i],
                        'start_date' => $request->input('start_training_date')[$i],'end_date' => $request->input('end_training_date')[$i],
                        'delivery_days' => $request->input('delivery_days')[$i],'location' => $request->input('location')[$i],'Customer' => $request->input('Customer')[$i],'locator' => $request->input('locator')[$i],'status'=>'Planned']);
            }
            else
            {// save session if OM exist
                $event = new Events();
                $event->user_id = Auth::user()->id;
                $event->country = $request->input('country')[$i];
                $event->locator = $request->input('locator')[$i];
                $event->title = $request->input('name_session')[$i];
                $event->om_id = $request->input('om_id');
                $event->customer = $request->input('customer')[$i];
                $event->start_date = $request->input('start_training_date')[$i];
                $event->end_date = $request->input('end_training_date')[$i];
                $event->location = $request->input('location')[$i];
                $event->delivery_days = $request->input('delivery_days')[$i];
                $event->hotel_contact = $request->input('hotel_name')[$i];
                $event->status = "Planned";
                $event->save();
            }


        }
        DB::table('trips')
            ->where('om_id',$request->input('om_id'))
            ->update(['prime_amount' => $request->input('amount'),'start_date' => $request->input('start_trip_date'),
                'end_date' => $request->input('end_trip_date'),'formule' => $request->input('formule'),'status'=>'Planned']);

        $notification = array(
            'message' => 'Session Edit Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/sessions')->with($notification);
    }
    public function  storeModif(Request $request)
    {
        // check if om with id exist
        $eventId = 0;
        $session_count = count($request->input("name_session"));
         // save OM
            // save session
            for ($i = 0; $i < $session_count; $i++) {
               if (isset($request->input('id_session')[$i]))
                  {
                      DB::table('events')
                          ->where('id',$request->input('id_session')[$i])
                          ->update(['country' => $request->input('country')[$i],'title' => $request->input('name_session')[$i],
                              'start_date' => $request->input('start_training_date')[$i],'end_date' => $request->input('end_training_date')[$i],
                              'delivery_days' => $request->input('delivery_days')[$i],'location' => $request->input('location')[$i],'Customer' => $request->input('Customer')[$i],'locator' => $request->input('locator')[$i]]);
                  }
    else
                      {// save session if OM exist
                          $event = new Events();
                          $event->user_id = Auth::user()->id;
                          $event->country = $request->input('country')[$i];
                          $event->locator = $request->input('locator')[$i];
                          $event->title = $request->input('name_session')[$i];
                          $event->om_id = $request->input('om_id');
                          $event->customer = $request->input('customer')[$i];
                          $event->start_date = $request->input('start_training_date')[$i];
                          $event->end_date = $request->input('end_training_date')[$i];
                          $event->location = $request->input('location')[$i];
                          $event->delivery_days = $request->input('delivery_days')[$i];
                          $event->hotel_contact = $request->input('hotel_name')[$i];
                          $event->status = "DRAFT";
                          $event->save();
                      }


            }
         DB::table('trips')
            ->where('om_id',$request->input('om_id'))
            ->update(['prime_amount' => $request->input('amount'),'start_date' => $request->input('start_trip_date'),
                'end_date' => $request->input('end_trip_date'),'formule' => $request->input('formule')]);

        $notification = array(
            'message' => 'Session Edit Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/sessions')->with($notification);
        // return $notification;

        //return response()->json(['message'=>'New OM added Successfully.']);
    }
    public function  SupOM(Request $request)
    {$result = Request("id");
        DB::table('Trips')->where('om_id', '=', $result)->delete();
        DB::table('events')->where('om_id', '=', $result)->delete();

        $notification = array(
            'message' => 'Session Edit Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/sessions')->with($notification);
    }
}
