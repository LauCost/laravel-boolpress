<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    //

    public function contacts()
    {

        return view('guest.contacts.form');
    }

    public function sendContactForm(Request $request)
    {
        //ddd($request->all());

        $validate_data = $request->validate([
            'name' => ['required', 'min:4', 'max:50'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:30', 'max:500'],
        ]);

        //ddd($validate_data);

        Mail::to('admin@example.com')->send(new ContactFormMail($validate_data));

        return redirect()->back()->with('message', 'Grazie della sua email');

        //return (new ContactFormMail($validate_data))->render();
    }
}
