<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
{
    // Validate the incoming request data
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        // Authentication passed
        return redirect()->intended('/frontend.index'); // Redirect to the intended page after login
    }

    // Authentication failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

}
