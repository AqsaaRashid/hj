<?php

namespace App\Http\Controllers;

use App\Models\ChatRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ChatMessage;
use Illuminate\Support\Str;

class ChatController extends Controller
{

    /* ==============================
       STORE CHAT REQUEST FROM POPUP
    ============================== */

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        ChatRequest::create([
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }


    /* ==============================
       ADMIN PAGE
    ============================== */

    public function index()
    {

        $requests = ChatRequest::latest()->get();

        return view('admin.chat.index', compact('requests'));

    }


    /* ==============================
       SEND EMAIL TO SELECTED USERS
    ============================== */

    public function notify(Request $request)
    {

        $ids = $request->ids;

        $users = ChatRequest::whereIn('id', $ids)->get();

        foreach ($users as $user) {

            Mail::send('emails.chat-notify', [
                'user' => $user
            ], function ($message) use ($user) {

                $message->to($user->email)
                        ->subject('Hangry Joe\'s Customer Support');

            });

        }

        return response()->json([
            "success" => true
        ]);
    }


    /* ==============================
       FAQ CHATBOT RESPONSE
    ============================== */


public function chatbot(Request $request)
{

    $message = strtolower($request->message);

    $faqs = Faq::all();

    foreach ($faqs as $faq) {

        $keywords = explode(',', strtolower($faq->question));

        foreach ($keywords as $keyword) {

            if(str_contains($message, trim($keyword))){

                return response()->json([
                    'reply' => $faq->answer
                ]);

            }

        }

    }

    /* NO MATCH → SAVE MESSAGE */

    $session = session()->getId();

    $chat = ChatMessage::create([
        'session_id' => $session,
        'message' => $message
    ]);

    return response()->json([
'reply' => 'Thanks for reaching out! We are assigning a support representative to assist you.',
        'chat_id' => $chat->id
    ]);

}
  
public function checkReply($id)
{

    $chat = ChatMessage::find($id);

    return response()->json([
        'reply' => $chat->admin_reply
    ]);

}

}