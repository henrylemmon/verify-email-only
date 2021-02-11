<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationEmailController extends Controller
{
  public function __invoke()
  {
    request()->validate([
      'name' => 'required|min:3|max:255|string',
      'email' => 'required|email|unique:emails,email,'
    ]);

    $signedURL = url()->temporarySignedRoute(
      'save-email', now()->addMinutes(30), ['email' => request('email'), 'name' => request('name')]
    );

    Mail::to(request('email'))
      ->send(new Verifyemail($signedURL));

    return back()->with('verified-message', 'Check your email for a verification link.');
  }
}
