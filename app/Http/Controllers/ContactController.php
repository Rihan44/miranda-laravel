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
        if ($request->isMethod('post')) {
            Contact::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('number'),
                'email_subject' => $request->input('subject'),
                'email_description' => $request->input('message'),
                'date' => now()->format('Y-m-d'),
                'date_time' => now()->format('Y-m-d H:i:s'),
                'is_archived' => true,
            ]);

            $form_sent = true;
            $notification = 'Form sent successfully!';
            return view('contact', ['form_sent' => $form_sent, 'notification' => $notification]);
        } else {
            return view('contact');
        }
    }
}
