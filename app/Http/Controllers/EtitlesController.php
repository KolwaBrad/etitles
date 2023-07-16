<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Title;
use App\Models\Subcounty;
use App\Models\Admin;
use App\Models\County;
use App\Models\Transaction;
use Hash;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoverPassword;
use App\Mail\ActivateYourMail;
use App\Mail\AdminRecoverPassword;
use App\Mail\AdminActivateYourMail;

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
                $request->session()->put('anyUserId',$user->id);
                $request->session()->put('anyUserfname',$user->firstName);
                $request->session()->put('anyUserlname',$user->lastName);
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

    public function enlistland(Request $request){

        $title = Title::where('title_id','=',$request->title_id)->first();  

        if($title){
            $title->market = 1;
            $title->save();
        }
        return view("market.landlisted");
    }

    public function withdrawland(Request $request){

        $title = Title::where('title_id','=',$request->title_id)->first();  

        if($title){
            $title->market = 0;
            $title->save();
        }
        return view("market.landwithdrawn");
    }

    public function mytitles()
    {
        $titles = Title::where('owner_id', session('anyUserId'))->get();
        $subcounties = SubCounty::all();

        $mergedCollection = $titles->map(function ($title) use ($subcounties) {
            $subcounty = $subcounties->firstWhere('id', $title->owner_id);
            $title->subcounty = $subcounty;
            return $title;
        });

        session(['mergedTitles' => $mergedCollection]);

        return view("market.mytitles");
    }
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            session(['firstName' => $data->firstName]);
            session(['lastName' => $data->lastName]);
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
 
public function admindashboard(){
    $admindata = array();
    if(Session::has('adminloginId')){
        $admindata = Admin::where('id','=',Session::get('adminloginId'))->first();
    }
    return view('admindashboard');

}


public function adminsignup(){
    return view("adminsignup");
}
public function actionadminsignup(Request $request)
    {
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:12',
            'nationalID'=>'required',
        ]);
        $admin = new Admin();
        $admin->firstName = $request->firstName;
        $admin->lastName = $request->lastName;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->nationalID = $request->nationalID;
        $admin->passwordrecovery = rand(100000, 999999);
        $admin->activationcode = rand(100000, 999999);
        $res = $admin->save();
        if($res) {
            $admin = Admin::where('email','=',$request->email)->first();
            if($admin){
                $adminactivationdata = array();
                $adminactivationdata = Admin::where('email','=',$request->email)->first();
    
                $adminactivationcode = $adminactivationdata['activationcode'];
                $email = $adminactivationdata['email'];
                
                // Store the variable in the session
                session()->put('adminmynewvariable', $adminactivationcode);
        
                Mail::to($email)->send(new AdminActivateYourMail());
               
                return view("adminactivationsent");
            } else {
                return back()->with('fail','Account not found');
            }
            
        } else {
            return back()->with('fail','Something went wrong');
            
        }
    }

public function adminlogin(){
    return view("adminlogin");
}
public function actionadminlogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:12',
        ]);
        $admin = Admin::where('email','=',$request->email)->first();
        if($admin){
            if($admin->active == 1){
            if(Hash::check($request->password,$admin->password)){
                $request->session()->put('adminloginId',$admin->id);
                $request->session()->put('anyUserId',$admin->id);
                $request->session()->put('anyUserfname',$admin->firstName);
                $request->session()->put('anyUserlname',$admin->lastName);

                $result = $this->admintransacts();
                return $result;
                //return redirect('admindashboard');
                
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

    public function proccedadmin(){
        $result = $this->admintransacts();
        return $result;    
    }

    public function admintransacts(){
        $transactions = Transaction::all();
        session(['alladmintransactions' => $transactions]);

        $kenyacounties = County::all();

        session(['counties' => $kenyacounties]);

        $pendingapprovalcount = Transaction::where('owner_approve', 1)
        ->where('bidder_approve', 1)
        ->where('admin_approve', 0)
        ->count();
        session(['pendingapprovalcount' => $pendingapprovalcount]);

        $pendingtransferscount = Transaction::where('admin_approve', 1)
        ->where('transfer', 0)
        ->count();
        session(['pendingtransferscount' => $pendingtransferscount]);

        $rejectedtransfercount = Transaction::where('transfer', 2)
        ->count();
        session(['rejectedtransfercount' => $rejectedtransfercount]);

        $completedtransfercount = Transaction::where('transfer', 1)
        ->count();
        session(['completedtransfercount' => $completedtransfercount]);

        $rejectedapprovalcount = Transaction::where('admin_approve', 2)
        ->count();
        session(['rejectedapprovalcount' => $rejectedapprovalcount]);

        $approvedtransfercount = Transaction::where('admin_approve', 1)
        ->count();
        session(['approvedtransfercount' => $approvedtransfercount]);

        $transactionscount = Transaction::count();

        $counts = [];

        for ($i = 1; $i <= 47; $i++) {
            $countyCode = str_pad($i, 3, '0', STR_PAD_LEFT);
            $counts[$countyCode] = Title::where('countycode', $countyCode)->count();
        }
        session(['county_counts' => $counts]);



        return redirect("admindashboard");
    }
/*
    public function myadmintransactions() {
        
        $transactions = Transaction::all();
        session(['alladmintransactions' => $transactions]);
    
    // return view('transact.mytransactionspage');
    }
    */

    public function pendingrequests() {
        return view('myadmin.pendingrequests');
    }
    public function actionadminchangepassword(Request $request){
        $request->validate([
            'recoverycode'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:12',
            
          ]);
        
          // Get the user from the database
          $admin = Admin::where('email','=',$request->email)->first();
          if($admin){
            if($request->recoverycode == $admin->passwordrecovery){
          // Update the user's information
          $admin->passwordrecovery = rand(100000, 999999);

          if ($request->password) {
            $admin->password = Hash::make($request->password);
          }
          
        
          // Save the user
          $res = $admin->save();
        
          if ($res) {
            return view('adminpasswordchanged')->with('success', 'Password changed successfully.');
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
    public function adminpasswordchanged(){
        return view("adminpasswordchanged");
    }

    public function actionadminforgotpassword(Request $request){
  
      
        $request->validate([
            'email'=>'required',
            
        ]);

        $admin = Admin::where('email','=',$request->email)->first();
        if($admin){
            $emaildata = array();
            $emaildata = Admin::where('email','=',$request->email)->first();

            $passwordrecovery = $emaildata['passwordrecovery'];
            $email = $emaildata['email'];
            
            // Store the variable in the session
            session()->put('adminmyvariable', $passwordrecovery);
    
            Mail::to($email)->send(new AdminRecoverPassword());
           
            return view("adminconfirmrecovery");
        } else {
            return back()->with('fail','Account not found');
        }
        
        
        
    }
    public function actionadminactivateaccount(Request $request){
        $request->validate([
            'activationcode'=>'required',
            'email'=>'required|email',

          ]);
        
          // Get the user from the database
          $admin = Admin::where('email','=',$request->email)->first();
          if($admin){
            if($request->activationcode == $admin->activationcode){
          // Update the user's information
          $admin->active = 1;


        
          // Save the user
          $res = $admin->save();
        
          if ($res) {
            return view('adminaccountactivated')->with('success', 'Account activated successfully.');
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
    public function adminforgotpassword(){
        return view("adminforgotpassword");
    }

    public function adminconfirmrecovery(){
        return view("adminconfirmrecovery");
    }

    public function adminrecovercode(){
        return view("adminrecovercode");
    }
    public function adminactivateaccount(){
        return view("adminactivateaccount");
    }

    public function adminlogout(){
        if(Session::has('adminloginId')) {
            Session::pull('adminloginId');
            return redirect('adminlogin');
        }
        else {
            echo('fail');
        }
    }
    public function adminapproverequest(Request $request) {

        $titleId = $request->input('title_id');
        $bidderId = $request->input('bidder_id');
        $createdAt = $request->input('created_at');
        $adminApprove = $request->input('admin_approve');
        $adminId = session('anyUserId');
        $adminFname = session('anyUserfname');
        $adminLname = session('anyUserlname');
        
        
        $transaction = Transaction::where('title_id', $titleId)
            ->where('bidder_id', $bidderId)
            ->where('created_at', $createdAt)
            ->first();
        
        if ($transaction) {
  
            $transaction->admin_approve = $adminApprove;
            $transaction->admin_id = $adminId;
            $transaction->admin_fname = $adminFname;
            $transaction->admin_lname = $adminLname;
            $transaction->save();
  
        } else {
            return back()->with('fail','An error Occurred');   
        }
        $result = $this->admintransacts();
        return $result;
    }
/*
    public function adminstatistics(){
        $counts = [];

    for ($i = 1; $i <= 47; $i++) {
    $countyCode = str_pad($i, 3, '0', STR_PAD_LEFT);
    $count = Title::where('countycode', $countyCode)->count();
    $counts[$countyCode] = $count;
        }
    session(['counts' => $counts]);
    }
    */
    
}
