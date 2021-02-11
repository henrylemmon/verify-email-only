<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class SaveVerifiedEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(403);
        }

        Email::create([
            'name' => request('name'),
            'email' => request('email'),
        ]);

        return redirect('/')->with('verification-success', 'You have been successfully added to the mailing list');
    }
}
