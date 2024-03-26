<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware(['guest']);
    // }

    public function index()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('profile');
    }
    public function logout()
    {
   
        auth()->logout();

        return redirect()->route('home');
    }
}
