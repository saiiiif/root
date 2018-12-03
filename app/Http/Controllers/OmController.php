<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Om;
use App\Http\Requests\omRequest;
use Auth;
use Illuminate\Http\UploadedFile;
use App\Events;


class OmController extends Controller
{
    //
    public function index() {

        if(Auth::User()->admin) {
            $listom = Om::All() ;
        }else {
            $listom = Om::where('user_id', Auth::user()->id)->get();
        }


        return view('instructor.om', ['oms'=>$listom]);
    }

    public function create() {
        $events = Events::all();

        return view('instructor.manage_om')->with('events', $events);

    }

    public function store(Request $request) {

        $om = new Om();
        $om->user_id = Auth::user()->id;
        $om->events_id = $request->input('title');
        $event = Events::find($om->events_id);

        $om->title = $event->title;

        $om->country = $request->input('country');
        $om->city = $request->input('city');
        $om->adress = $request->input('adress');
        $om->start_date = $request->input('start_date');
        $om->end_date = $request->input('end_date');
        $om->extra_amount = $request->input('amount');
        $om->modif_ex_amount = $request->input('edit_amount');



        $image=$request->file('picture');

        if($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='imagew/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success) {
                $om->invoice_amount = $image_url;


                $om->save();
                $notification = array(
                    'message' => 'Om Added Successfully',
                    'alert-type' => 'success'
                );
                return redirect('/instructor/om')->with($notification);

            }

        }

        $om->invoice_amount ='';
        $om->save();
        $notification = array(
            'message' => 'Om Added Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/om')->with($notification);
    }

    public function edit($id) {

        $om = Om::find($id);
        $this->authorize('update',$om);
        return view('instructor.edit_om', ['om'=>$om]);
    }

    public function update(Request $request, $id) {


        $om = Om::find($id);
        $om->title = $request->input('title');
        $om->country = $request->input('country');
        $om->city = $request->input('city');
        $om->adress = $request->input('adress');
        $om->start_date = $request->input('start_date');
        $om->end_date = $request->input('end_date');
        $om->extra_amount = $request->input('amount');
        $om->modif_ex_amount = $request->input('edit_amount');

        $image=$request->file('picture');

        if($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='imagew/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success) {
                $om->invoice_amount = $image_url;


        $om->save();
        $notification = array(
            'message' => 'Om updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/'.$id.'/edit_om')->with($notification);

            }

        }

        $om->invoice_amount ='';
        $om->save();
        $notification = array(
            'message' => 'Om updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/instructor/'.$id.'/edit_om')->with($notification);

    }

    public function destroy($id=null) {
        Om::where(['id'=>$id])->delete();
        $notification = array(
            'message' => 'Om deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect('/instructor/om')->with($notification);
    }
}

