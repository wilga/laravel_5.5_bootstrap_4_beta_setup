<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function send(Request $request)
    {

        Mail::to([
            'info@example.com'
        ])->send(new Contact([
            'nameReceived' => $request->name,
            'emailReceived' => $request->email,
            'messageReceived' => nl2br($request->message),
            'optIn' => $request->optIn
        ]));

        return;
    
    }

}
