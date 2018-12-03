<?php

namespace App\Http\Controllers;

use App\Pdcs;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Events;
use Validator;


class PdcsController extends Controller
{
    public function index()
    {
        if (Auth::User()->admin) {
            $events = Events::all();
            //$listpdcs = Pdcs::where('id',$event->id);

        } else {

            $events = Events::where('user_id', Auth::user()->id)->get();
        }

        return view('instructor.pdc', ['events' => $events]);
    }

    public function create_pdc($id)
    {
        //dd($id);
        $pdc = Events::find($id);

        return view('instructor.add_pdc', ['pdcs' => $pdc])->with('id', $id);

    }

    public function store_pdc(Request $request)
    {

        $pdc = new Pdcs();



        $pdc->user_id = Auth::user()->id;
        $pdc->events_id = $request->input('event_id');
        $pdc->locator = $request->input('locator');
        $pdc->title = $request->input('title');
        $pdc->payement = $request->input('payement');
        $pdc->date = $request->input('date');
        $pdc->currency = $request->input('currency');

        $pdc->amount = $request->input('amount');
        $pdc->type = "pdc";

        $attach_file = implode(',',$request->input('name'));
        $pdc->attach_file = $attach_file;

        print_r($pdc);
        $pdc->save();
        $notification = array(
            'message' => 'New Pdc Added  Successfully',
            'alert-type' => 'success'
        );

        return redirect('/instructor/session/' . $pdc->events_id . '/view_session')->with($notification);


    }

    public function edit($id)
    {

        $pdc = Pdcs::find($id);
        $this->authorize('update', $pdc);
        return view('instructor.edit_pdc', ['pdc' => $pdc]);
    }

    public function update(Request $request, $id)
    {

        $pdc = Pdcs::find($id);
        $pdc->locator = $request->input('locator');
        $pdc->title = $request->input('title');
        $pdc->payement = $request->input('payement');
        $pdc->date = $request->input('date');
        $pdc->currency = $request->input('currency');
        $pdc->amount = $request->input('amount');


        if ($request->hasFile('picture')) {
            $pdc->attach_file = $request->picture->store('image');
        }


        $pdc->save();
        return redirect('/instructor/pdc/' . $id . '/edit_pdc')->with('flash_message_success', 'Updated Successfully');

    }

    public function destroy($id = null)
    {
        Pdcs::where(['id' => $id])->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect('/instructor/pdc')->with($notification);
    }


    //Manage Missing Reciept

    public function create_missing_pdc($id)
    {
        //dd($id);
        $pdc = Events::find($id);

        return view('instructor.add_missing_pdc', ['pdcs' => $pdc])->with('id', $id);

    }


    public function store_missing_pdc(Request $request)
    {

        $pdc = new Pdcs();
        $pdc->user_id = Auth::user()->id;
        $pdc->events_id = $request->input('event_id');
        $pdc->locator = $request->input('locator');
        $pdc->title = $request->input('title');
        $pdc->payement = $request->input('payement');
        $pdc->date = $request->input('date');
        $pdc->currency = $request->input('currency');
        $pdc->amount = $request->input('amount');
        $pdc->reason = $request->input('reason');
        $pdc->type = "missing";

        $pdc->save();
        $notification = array(
            'message' => 'New Missing Pdc Added  Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/session/' . $pdc->events_id . '/view_session')->with($notification);


    }


    public function generate_pdc () {
        return view('instructor.pdc_template');
    }

}