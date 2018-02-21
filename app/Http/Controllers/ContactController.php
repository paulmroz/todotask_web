<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use App\Mail\AskEmail;

class ContactController extends Controller 
{
	public function create()
	{
		return view('contact.create');
	}

	public function sendEmail()
	{
		$validationEmail = request()->validate([

			'title'=>'required',
			'body'=>'required'

		]);

		$user=auth()->user();

		Mail::to('paulmroz97@gmail.com')->send(new AskEmail($validationEmail,$user));

		session()->flash('message','Email sended');

		return redirect()->back();
	}
}