<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function create()
    {
        return view('contact', ['form_sent' => false]);
    }

    public function store(Request $request)
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

        if($contact->wasRecentlyCreated){
            $notification = 'Form sent successfully!';

            return view('contact', ['form_sent' => true, 'notification' => $notification]);
        } else {

        }

    }
}
