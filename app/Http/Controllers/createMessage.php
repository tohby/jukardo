<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class createMessage extends Controller
{
    //
    public function send(Request $request){
        Message::create([
            'firstname' => $request->input('fname'),
            'lastname' => $request->input('lname'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')
        ]);
        return redirect('/contact')->with('success', 'Message sent, we will get back to you shortly');
    }
}
