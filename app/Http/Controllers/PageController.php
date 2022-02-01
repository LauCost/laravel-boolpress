<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

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

        ddd($validate_data);
    }
}
