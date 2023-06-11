<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function store(Request $request){
        $contact = new Contact();

        $contact->name = $request->input('Name');
        $contact->email = $request->input('Email');
        $contact->object = $request->input('Object');
        $contact->message = $request->input('Message');

        $contact->save();

        return redirect()->route('home', ['#contact-us'])->with('success', 'Message envoyé');
    }
}
