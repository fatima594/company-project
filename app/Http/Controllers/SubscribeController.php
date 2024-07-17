<?php

namespace App\Http\Controllers;

use App\Models\subscribes;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:Subscribes,email',
        ]) ;
        subscribes::create([
            'email'=>$request->email,

        ]);
        return back()->with('success' , 'you have successfully subscribed');

    }


}
