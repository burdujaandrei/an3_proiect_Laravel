<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUs;

class ContactController extends Controller
{
    public function index()
    {
    	return view('contact');
    }
     /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function send(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);
       ContactUs::create($request->all());
       return back()->with('success', 'Thanks for contacting us!');
   }
}
