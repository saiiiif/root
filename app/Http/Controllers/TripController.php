<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Trip;
use Notification;
use App\Events;

class TripController extends Controller
{
//    public function index()
//    {
//        if(Auth::User()->admin) {
//            $listtrip = Trip::All() ;
//        }else {
//            $listtrip = Trip::where('user_id', Auth::user()->id)->get();
//
//        }
//        return view('instructor.trips', ['trips'=>$listtrip]);
//    }

    public function index()
    {
        if (Auth::User()->admin) {
            $events = Events::all();
            //$listpdcs = Pdcs::where('id',$event->id);

        } else {

            $events = Events::where('user_id', Auth::user()->id)->get();
        }

        return view('instructor.trips', ['events' => $events]);
    }


    public function create() {
        $events = Events::all();
        return view('instructor.create_trip', ['events'=>$events]);

    }


    public function store(Request $request) {

        $trip = new Trip();
        $trip->user_id = Auth::user()->id;
        $trip->events_id = $request->input('title');

        $trip->name = $request->input('name');
        $trip->prime_amount = $request->input('amount');
        $trip->deposit = $request->input('deposit');
        $trip->ticket = $request->input('ticket');
        $trip->total = ($request->input('deposit'))+($request->input('ticket') );


        $trip->save();


        $user = \App\User::find(4);
        Notification::send($user, new \App\Notifications\Add_sessionsNotification($user));

        $notification = array(
            'message' => 'New Trip Added  Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/trips')->with($notification);


    }


    public function destroy($id=null) {
        Trip::where(['id'=>$id])->delete();
        $notification = array(
            'message' => 'Trip deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('/instructor/trips')->with($notification);
    }


    public function edit($id) {

        $trip = Trip::find($id);
      //  $this->authorize('update',$trip);

        return view('instructor.edit_trip', ['trip'=>$trip]);
    }


    public function update(Request $request, $id) {

        $trip = Trip::find($id);
        $trip->user_id = Auth::user()->id;
        $trip->name = $request->input('name');
        $trip->prime_amount = $request->input('amount');
        $trip->deposit = $request->input('deposit');
        $trip->ticket = $request->input('ticket');
        $trip->total = $request->input('total');





        $trip->save();
        $notification = array(
            'message' => 'Trip updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/trips/'.$id.'/edit_trip')->with($notification);

    }

}
