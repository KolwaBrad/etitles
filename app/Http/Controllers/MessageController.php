<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewMessage;
use App\Models\User;
use App\Models\Title;
use App\Models\Subcounty;
use App\Models\Admin;
use App\Models\Message;
use Hash;
use Session;


class MessageController extends Controller
{
    //
    public function storemessage(Request $request)
{

    $message = new Message();
    $message->sender_id = session('anyUserId');
    $message->receiver_id = $request->input('receiver_id');
    $message->text_message = $request->input('text_message');
    $message->save();
    $result = $this->getmessages();
    return $result;
    // Broadcast the message
    // broadcast(new NewMessage($message))->toOthers();

    //return response()->json($message);
}

public function getmessages()
{
    //$messages = Message::with('user')->latest()->get();

    $users = User::all();
    $messages = Message::with('user')
    ->where(function ($query) {
        $query->where('receiver_id', session('anyUserId'))
              ->orWhere('sender_id', session('anyUserId'));
    })->oldest()
    ->get();
   
    $data = array();
    if(Session::has('loginId')){
        $data = User::where('id','=',Session::get('loginId'))->first();
    }
    session(['allmessages' => $messages]);
    session(['allusers' => $users]);

    $mergedCollection = $messages->map(function ($message) use ($users) {
        if ($message->receiver_id == session('anyUserId')) {
            $user = $users->firstWhere('id', $message->sender_id);
        } else {
            $user = $users->firstWhere('id', $message->receiver_id);
        }
        $message->user = $user;
        return $message;
    });
    session(['mergedData' => $mergedCollection]);

    //$mymessagedata = $messages;
    //$result = $this->chatarea($allmessages);
    $result = $this->chatarea();
    return $result;
}

public function chatarea(){

    return view('chatmod.chatarea');

}
public function allchats(){
    
    return view('chatmod.allchats');
}

public function replychatarea(){
    return view('chatmod.replychatarea');
}
}
