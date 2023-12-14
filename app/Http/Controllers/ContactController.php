<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{

    public function create()
    {
        return view('contact', ['form_sent' => false]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'email_subject' => 'required',
            'email_description' => 'required',
        ]);

        $data = $request->all();

        $contact = Contact::create($data);

        if ( $contact ) {
            return Redirect::to('contact')->with('success', 'Contact send successfully');
        } else {
            return Redirect::to('contact')->with('error', 'Error sending the message');
        }
    }
}
