<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('resend');
        $this->middleware("not.verified")->only("index");
    }

    public function index()
    {
        return view('pages.auth.verify')->with("title", "Email Verification");
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return to_route("index");
    }

    public function resend (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
