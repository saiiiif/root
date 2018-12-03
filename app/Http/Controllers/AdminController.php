<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Session;
use Socialite;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\AdminResetPassword;
use DB;
use Mail;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        $notification = array(
            'message' => 'You Are Logged Successfully',
            'alert-type' => 'success'
        );
        if ($request->isMethod('post')) {
            $data = $request->input();

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])) {
                //echo "Success";die;
               // return redirect('/instrutor')->with($notification);

            return view('admin.dashboard');
            } else if
                 (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '0'])) {

                    //echo "Success";die;
                    return redirect('/instructor')->with($notification);
                }  else {
                //echo "failed";die;
                return redirect('/')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('flash_message_success', 'Logged out Successfully');
    }


    public function redirectToProvider( $provider )
    {
        return Socialite::driver($provider)->redirect();
    }



    public function handleProviderCallback($provider)
    {

		$user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
		Auth::login($authUser, true);
        return redirect('instructor');

    }

    public function findOrCreateUser ($user, $provider) {
        $authUser = User::where('provider_id', $user->id)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id
        ]);
    }


    public function settings()
    {
        return view('admin.settings');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
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


    public function index()
    {
        return view('admin.admin_profile');
    }

    public function updateprofile(Request $request)
    {
        $admin_id = Auth::id();
        if($request->isMethod('post')) {
            $data = $request->all();
          // echo "<pre>"; print_r($data);die;
           // User::where(['id'=>$admin_id])->update(['name'=>$data['first_name'],'last_name'=>$data['last_name'],'email'=>['email'],'company'=>$data['company']]);
          //  print_r($data);die();

            $admin = User::find($admin_id);

            $admin->name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->email = $request->input('email');
            $admin->company = $request->input('company');

            $admin->save();
            return redirect('/admin/profile')->with('flash_message_success','Profile Updated Successfully');

        } else {

            return redirect('/admin/profile')->with('flash_message_success','Error when update your information');

        }
    }
    public function forgotPassword(){

        $admin= User::where('email',request('email'))->first();
        if(!empty($admin)){
            $token = app('auth.password.broker')->createToken($admin);
            $data=DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            return back()->with('flash_message_success','
Le lien de réinitialisation est envoyé. <br>
<a href="https://mailtrap.io/inboxes" class="text-info m-l-5">Clique ici</a>');;
        }
        return back();
    }

    public function resetPassword()
    {
        return view('admin.reset_password');
    }
    public function reset_password_post($token){

        $this->validate(request(),[
            'password'=>'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $chekck_token =DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if (!empty($chekck_token)){
            $admin= User::where('email',$chekck_token->email)->update([
                'email'=>$chekck_token->email,
                'password'=>bcrypt(request('password'))
            ]);
            DB::table('password_resets')->where('email',request('email'))->delete();
            admin()->attempt(['email' => $chekck_token->email, 'password' => request('password')], true);
            return redirect('admin/dashboard')->with('flash_message_success','Bienvenue.');
        }
        else{
            return redirect ('admin');
        }
    }
    public function reset_password($token){
        $chekck_token =DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if (!empty($chekck_token)){
            return view('admin.emails.admin_reset_password',['data'=> $chekck_token]);}
        else{
            return redirect('admin/reset');
        }
/*
        public function Post_Permission(Request $r)
           {  $id_user=Request('user');
             DB::DELETE("DELETE FROM `user`WHERE `id_user` = ?",[$id_user]);
             foreach (Request('per') as $key => $value) {
             DB::INSERT('INSERT INTO user (permission, id_user) VALUES(:permission, :id_user)',[$value,$id_user]);
            }
            return redirect('/admin/role');
           }
           public function roles_aff(Request $r)
           {
             $users=DB::Select('select id , name,last_name from stm_users');
             $users_per=DB::Select('select su.id, name,u.permission from stm_users as su left join user as u on su.id=u.id_user');
            return view("admin.manager_role",compact('users','users_per'));
           }
*/
    }
}
