<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{

    // store form
public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    $contact = Contact::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message
    ]);

Mail::to($contact->email)->send(new ContactFormMail($contact));
    return back()->with('success','Message sent successfully');
}


    // admin page
   public function index()
{
    Contact::where('is_seen', false)->update([
        'is_seen' => true
    ]);

    $contacts = Contact::latest()->get();

    return view('admin.contacts.index', compact('contacts'));
}

    // delete contact message
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully');
    }
    public function show($id)
{
    $contact = Contact::findOrFail($id);

    return view('admin.contacts.show', compact('contact'));
}
public function reply(Request $request, $id)
{
    $request->validate([
        'reply_message' => 'required'
    ]);

    $contact = Contact::findOrFail($id);

    Mail::to($contact->email)->send(
        new ContactReplyMail($contact, $request->reply_message)
    );

    return back()->with('success','Reply sent successfully');
}
}