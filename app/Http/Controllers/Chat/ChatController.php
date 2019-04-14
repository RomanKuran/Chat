<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Messages;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() {
        return view('Chat\chats');
    }

    public function chat() {
        // ->orWhere()
        $urlArr = preg_split("/\//", url()->current());
        $id_interlocutor = $urlArr[4];
        if($id_interlocutor!=Auth::id()){
            $messages = Messages::where('id_user', Auth::id())->where('id_interlocutor', $id_interlocutor)->orwhere('id_user', $id_interlocutor)->where('id_interlocutor', Auth::id())->get();
            return view('Chat\chat', compact('messages'));
        }
        else{
            return view('Chat\chats');
        }
    }

    public function sendMessage(Request $request) {
        $id_interlocutor = $request->input('id_interlocutor');
        
            $message_body = $request->input('message_body');
            if(User::where('id',$id_interlocutor)->get() && $message_body){
                $message = new Messages();
                $message->id_user = Auth::id();
                $message->id_interlocutor = $id_interlocutor;
                $message->message_body = $message_body;
                $message->save();
                return response()->json(['date' => $message->created_at->toDateTimeString()]);
            }
            return 0;

    }
}
