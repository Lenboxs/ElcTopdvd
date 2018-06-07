<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class SignInController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view( 'pages.sign-in' );
    }
}
