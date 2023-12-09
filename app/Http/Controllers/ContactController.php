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

        // $request->validate([
        //     'firstname' => 'required',
        //     'surname' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'specialrequest' => 'required',
        // ]);

        $contact = Contact::create($request);
        // $contact = Contact::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('number'),
        //     'email_subject' => $request->input('subject'),
        //     'email_description' => $request->input('message'),
        //     'date' => now()->format('Y-m-d'),
        //     'date_time' => now()->format('Y-m-d H:i:s'),
        //     'is_archived' => false,
        // ]);

        if($contact->wasRecentlyCreated){
            $notification = 'Form sent successfully!';

            return view('contact', ['form_sent' => true, 'notification' => $notification]);
        } else {

        }

    }
}
