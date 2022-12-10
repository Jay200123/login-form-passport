<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getRegister(){
        return view('user.register');
    }

    public function getForm(){
        return view('user.signup_form');
    }
}
