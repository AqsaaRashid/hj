<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{

    /* SHOW ALL USER MESSAGES */

    public function index()
    {

        $messages = ChatMessage::latest()->get();

        return view('admin.chats.index',compact('messages'));

    }


    /* ADMIN REPLY */

    public function reply(Request $request,$id)
    {

        $chat = ChatMessage::findOrFail($id);

        $chat->admin_reply = $request->reply;

        $chat->save();

        return redirect()->back()->with('success','Reply Sent Successfully');

    }

}