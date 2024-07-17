<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\contacts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function index()
    {
        return view('layouts.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        contacts::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');

 }


    public function send(Request $request)
    {
        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

//        try {
//            Mail::to('fateimalakhal4@gmail.com')->send(new ContactMail($details));
//            Log::info('Email sent successfully.');
//        } catch (\Exception $e) {
//            Log::error('Failed to send email: ' . $e->getMessage());
//        }
//
//        return back()->with('success', 'Message sent successfully!');
//

}



}

