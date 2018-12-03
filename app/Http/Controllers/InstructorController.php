<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Instructor;
use Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class InstructorController extends Controller
{
    public function indexInstructor(){
        $list_instructors = Instructor::all();
        return view('admin.instructor',['instructors'=> $list_instructors]);
    }

    public function createInstructor(){
        return view('admin.create_instructor');
    }

    public function InsProfile(){
        return view('instructor.instructor_profile');
    }

    public function updateprofile(Request $request)
    {
        $instructor_id = Auth::id();
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            // User::where(['id'=>$admin_id])->update(['name'=>$data['first_name'],'last_name'=>$data['last_name'],'email'=>['email'],'company'=>$data['company']]);
            //  print_r($data);die();

            $instructor = User::find($instructor_id);

            $instructor->name = $request->input('name');
            $instructor->last_name = $request->input('last_name');
            $instructor->email = $request->input('email');
            $instructor->company = $request->input('company');
            $instructor->title = $request->input('title');
            $instructor->grade = $request->input('grade');
            $instructor->passport_number = $request->input('passport_number');
            $instructor->passport_validation = $request->input('passport_validation');

            $instructor->save();
            $notification = array(
                'message' => 'Instructor profile updated  Successfully',
                'alert-type' => 'success'
            );
            return redirect('/instructor/profile')->with($notification);

        } else {
            $notification_error = array(
                'message' => 'Error when update your information',
                'alert-type' => 'success'
            );
            return redirect('/instructor/profile')->with($notification_error);

        }
    }

    public function storeInstructor(Request $request){

        $instructor = new Instructor();
         $instructor->first_name = $request->input('first_name');
         $instructor->last_name = $request->input('last_name');
        $instructor->email = $request->input('email');
        $instructor->title = $request->input('title');
        $instructor->company = $request->input('company');
        $instructor->save();

        return redirect('/admin/instructor')->with('flash_message_success','Instructor Added Successfully');

    }

    public function editInstructor($id){
        $instructor =  Instructor::find($id);
        return view('admin.edit_instructor',['instructor'=> $instructor]);
    }


    public function updateInstructor(Request $request, $id){

        $instructor =  Instructor::find($id);
        $instructor->first_name = $request->input('first_name');
        $instructor->last_name = $request->input('last_name');
        $instructor->email = $request->input('email');
        $instructor->title = $request->input('title');
        $instructor->company = $request->input('company');
        $instructor->save();

        return redirect('/admin/instructor')->with('flash_message_success','Instructor profile updated  Successfully');

    }

    public function destroyInstructor( $id=null){
        Instructor::where(['id'=>$id])->delete();
        return redirect('/admin/instructor')->with('flash_message_error','Instructor profile deleted  Successfully');

    }



    public function dashboard()
    {

        return view('instructor.home');
    }

    public function settings()
    {
        return view('instructor.settings');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];

        $check_password = User::where(['admin' => '0'])->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/settings')->with('flash_message_success','Password Updated Successfully');
            } else {
                return redirect('/settings')->with('flash_message_error','Incorrect Current Password');

            }
        }
    }



}
