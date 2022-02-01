<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //

    public function show_contacts()
    {

        return view('guest.contacts.form');
    }

    public function store(Request $request)
    {
        //ddd($request->all());

        $validate_data = $request->validate([
            'name' => ['required', 'min:4', 'max:50'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:30', 'max:500'],
        ]);

        $contact = Contact::create($validate_data);

        //ddd($validate_data);

        Mail::to('admin@example.com')->send(new ContactFormMail($contact));

        return redirect()->back()->with('message', 'Grazie della sua email');

        //return (new ContactFormMail($validate_data))->render();
    }
}
