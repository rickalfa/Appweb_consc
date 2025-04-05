<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
    
 public function notice()
 {

    return back()->with('status', 'verification-link-sent');


 }

 public function verify(EmailVerificationRequest $request)
 {

    if ($request->user()->hasVerifiedEmail()) {
    
        return redirect()->intended('/'. '?verified=1');

    }

    if ($request->user()->markEmailAsVerified()) {
        
        event( new Verified($request->user()));

    }


    return redirect()->intended('/' . '?verified=1');


 }

 public function resend()
 {

    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');

 }


}
