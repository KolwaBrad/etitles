<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Block;
use App\Models\CBlock;
use App\Models\User;
use App\Models\Title;
use App\Models\Transaction;
use App\Models\Subcounty;
use App\Models\Admin;
use Hash;
use Session;

class TransactionController extends Controller
{
    //
    public function requestpurchase(Request $request) {

        $transaction = new Transaction();

        $transaction->title_id = $request->input('title_id');
        $transaction->location_name = $request->input('location_name');
        $transaction->owner_id = $request->input('owner_id');
        $transaction->bidder_id = session('anyUserId');
        $transaction->bidder_fname = session('anyUserfname');
        $transaction->bidder_lname = session('anyUserlname');

        $transaction->save();

        $result = $this->mytransactions();
        return $result;
    
    }

    public function mytransactions() {
        $anyUserId = session('anyUserId');
        $transactions = Transaction::where('bidder_id', $anyUserId)
    ->orWhere('owner_id', $anyUserId)
    ->get();
    session(['alltransactions' => $transactions]);
    return view('transact.mytransactionspage');
    }

    public function mytransactionspage(){
        return view('transact.mytransactionspage');
    }
    public function incomingrequests(){
        return view('transact.incomingrequests');
    }
    public function outgoingrequests(){
        return view('transact.outgoingrequests');
    }
    public function appincomingrequests(){
        return view('transact.appincomingrequests');
    }
    public function appoutgoingrequests(){
        return view('transact.appoutgoingrequests');
    }
    public function rejincomingrequests(){
        return view('transact.rejincomingrequests');
    }
    public function rejoutgoingrequests(){
        return view('transact.rejoutgoingrequests');
    }
    public function rejectedtransfers(){
        return view('transact.rejectedtransfers');
    }

    public function finalisepurchase(){
        return view('transact.finalisepurchase');
    }

    public function respondrequest(Request $request) {

        $titleId = $request->input('title_id');
        $bidderId = $request->input('bidder_id');
        $createdAt = $request->input('created_at');
        $ownerId = session('anyUserId');
        $ownerFname = session('anyUserfname');
        $ownerLname = session('anyUserlname');
        $ownerApprove = $request->input('owner_approve');
        
        $transaction = Transaction::where('title_id', $titleId)
            ->where('bidder_id', $bidderId)
            ->where('owner_id', $ownerId)
            ->where('created_at', $createdAt)
            ->first();
        
        if ($transaction) {
            $transaction->owner_approve = $ownerApprove;
            $transaction->owner_fname = $ownerFname;
            $transaction->owner_lname = $ownerLname;
            $transaction->save();
        } else {
            return back()->with('fail','An error Occurred');   
        }
        $result = $this->mytransactions();
        return $result;
    }

    public function completerequest(Request $request) {

        $titleId = $request->input('title_id');
        $ownerId = $request->input('owner_id');
        $bidderId = session('anyUserId');
        $createdAt = $request->input('created_at');
        $bidderApprove = $request->input('bidder_approve');
        $newPrice = $request->input('cost');
        
        $transaction = Transaction::where('title_id', $titleId)
            ->where('bidder_id', $bidderId)
            ->where('owner_id', $ownerId)
            ->where('created_at', $createdAt)
            ->first();
        
        if ($transaction) {
            if($transaction->bidder_approve == 2)
            {
                $transaction->bidder_approve = $bidderApprove;
                $transaction->save();      
            } else {
            $transaction->bidder_approve = $bidderApprove;
            $transaction->cost = $newPrice;
            $transaction->save();
            }
        } else {
            return back()->with('fail','An error Occurred');   
        }
        $result = $this->mytransactions();
        return $result;
    }

    public function addpayments(Request $request){
        $titleId = $request->input('title_id');
        $ownerId = $request->input('owner_id');
        $bidderId = session('anyUserId');
        $createdAt = $request->input('created_at');
        $bidderApprove = $request->input('bidder_approve');

        $transaction = Transaction::where('title_id', $titleId)
        ->where('bidder_id', $bidderId)
        ->where('owner_id', $ownerId)
        ->where('created_at', $createdAt)
        ->first();

        if ($transaction) {


            if($bidderApprove == 1)
            {
                if ($request->hasFile('bank_statement')) {
                    $bank_statement = $request->file('bank_statement');
                    $bank_statementName = time() . '.' . $bank_statement->getClientOriginalExtension();
                    $bank_statement->storeAs('transaction_bank_statements', $bank_statementName);
                    $transaction->bank_statement = 'transaction_bank_statements/' . $bank_statementName;

                }
                $transaction->save();
                $myresult = $this->mytransactions();
                return $myresult; 
            
                
                  
               
            } else {
            $transaction->bidder_approve = $bidderApprove;
            $transaction->save();

            $result = $this->mytransactions();
            return $result;
            }
        } else {
            return back()->with('fail','An error Occurred');   
        }
       
     
    } 




}
