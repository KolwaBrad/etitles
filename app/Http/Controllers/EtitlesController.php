<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoverPassword;
use App\Mail\ActivateYourMail;

class EtitlesController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function signup(){
        return view("auth.signup");
    }
    public function actionsignup(Request $request)
    {
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:12',
            'nationalID'=>'required',
        ]);
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->nationalID = $request->nationalID;
        $user->passwordrecovery = rand(100000, 999999);
        $user->activationcode = rand(100000, 999999);
        $res = $user->save();
        if($res) {
            $user = User::where('email','=',$request->email)->first();
            if($user){
                $activationdata = array();
                $activationdata = User::where('email','=',$request->email)->first();
    
                $activationcode = $activationdata['activationcode'];
                $email = $activationdata['email'];
                
                // Store the variable in the session
                session()->put('mynewvariable', $activationcode);
        
                Mail::to($email)->send(new ActivateYourMail());
               
                return view("activationsent");
            } else {
                return back()->with('fail','Account not found');
            }
            
        } else {
            return back()->with('fail','Something went wrong');
            
        }
    }
    public function activationsent(){
        return view("activationsent");
    }


    public function actionlogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:12',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if($user->active == 1){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            } else {

                return back()->with('fail','Incorrect password or email');   
            }
        }  else {

            return back()->with('fail','Your account is not activated');   
        }

        } else {
            return back()->with('fail','Wrong password or email');
        }
    }
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
        else {
            echo('fail');
        }
    }
    public function sendMail($emaildata){
        $passwordrecovery = $emaildata['passwordrecovery'];
        $email = $emaildata['email'];



        Mail::to('$email')->send(new RecoverPassword());
        return view('recovercode');


      
    }

    public function sendActiveMail($emaildata){
        $activationcode = $activationdata['activationcode'];
        $email = $activationdata['email'];



        Mail::to($email)->send(new ActivateYourMail());
        return view('recovercode');


      
    }
    public function forgotpassword(){
        return view("forgotpassword");
    }

    public function actionforgotpassword(Request $request){
  
      
        $request->validate([
            'email'=>'required',
            
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            $emaildata = array();
            $emaildata = User::where('email','=',$request->email)->first();

            $passwordrecovery = $emaildata['passwordrecovery'];
            $email = $emaildata['email'];
            
            // Store the variable in the session
            session()->put('myvariable', $passwordrecovery);
    
            Mail::to($email)->send(new RecoverPassword());
           
            return view("confirmrecovery");
        } else {
            return back()->with('fail','Account not found');
        }
        
        
        
    }

    public function confirmrecovery(){
        return view("confirmrecovery");
    }

    public function recovercode(){
        return view("recovercode");
    }
    public function actionchangepassword(Request $request){
        $request->validate([
            'recoverycode'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:12',
            
          ]);
        
          // Get the user from the database
          $user = User::where('email','=',$request->email)->first();
          if($user){
            if($request->recoverycode == $user->passwordrecovery){
          // Update the user's information
          $user->passwordrecovery = rand(100000, 999999);

          if ($request->password) {
            $user->password = Hash::make($request->password);
          }
          
        
          // Save the user
          $res = $user->save();
        
          if ($res) {
            return view('passwordchanged')->with('success', 'Password changed successfully.');
          } else {
            return back()->with('fail', 'Something went wrong.');
          }
            } else {

                return back()->with('fail','Incorrect recovery code');   
            }

        } else {
            return back()->with('fail','Wrong recoverycode or email');
        }


    }
    public function passwordchanged(){
        return view("passwordchanged");
    }
    public function activateaccount(){
        return view("activateaccount");
    }
    public function actionactivateaccount(Request $request){
        $request->validate([
            'activationcode'=>'required',
            'email'=>'required|email',

          ]);
        
          // Get the user from the database
          $user = User::where('email','=',$request->email)->first();
          if($user){
            if($request->activationcode == $user->activationcode){
          // Update the user's information
          $user->active = 1;


        
          // Save the user
          $res = $user->save();
        
          if ($res) {
            return view('accountactivated')->with('success', 'PAccount activated successfully.');
          } else {
            return back()->with('fail', 'Something went wrong.');
          }
            } else {

                return back()->with('fail','Incorrect activation code');   
            }

        } else {
            return back()->with('fail','Wrong activation code or email');
        }


    }

}
