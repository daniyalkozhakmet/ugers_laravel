<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('profile');
            // User is logged in
        } else {
            return redirect()->route('login');
            // User is not logged in
        }
    }
}
