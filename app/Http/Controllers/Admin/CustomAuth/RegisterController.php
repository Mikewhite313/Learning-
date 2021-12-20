<?php

namespace App\Http\Controllers\Admin\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
}
