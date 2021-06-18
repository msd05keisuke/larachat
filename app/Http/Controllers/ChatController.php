<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        //DB接続テスト用
        //Message::create(['user_id' => 1, 'message' => 'OK']);
        //dd(Auth::user());
        
        return view('post');
    }
 
    public function fetchMessages()
    {
        //dd(Message::with('user')->get());
        return Message::with('user')->get();
    }
 
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        
 
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        //dd($request);
 
        event(new MessageSent($user, $message));
 
        return ['status' => 'Message Sent!'];
    }

    //現在ログインしているユーザーのidを返す
    public function getAuth()
    {
        return Auth::user();
    }
}