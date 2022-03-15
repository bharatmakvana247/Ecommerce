<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.pages.contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'subject' => 'required',
            // 'phone' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => $request->status,
        ]);

        $contact->save();

        return redirect('/userside')->with('message', "Your Contact Send Successfully.");
    }

}
