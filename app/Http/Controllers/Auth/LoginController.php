<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    // Validate the request...

    if (Auth::attempt($request->only('username', 'password'))) {
      return redirect()->intended('home');
    }

    return back()->withErrors([
      'username' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return redirect('/');
  }
}
