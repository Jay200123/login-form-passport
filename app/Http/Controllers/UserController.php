<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    //gets the customer register form
    public function getRegister(){
        return view('user.register');
    }

    public function getEmployee(){
        return view('user.employee_register');
    }

    //gets the form for sign up
    public function getForm(){
        return view('user.signup_form');
    }
 
    //message view for registered users
    public function getMessage(){
        return view('registration_message');
    }

    public function getLogin(){
        return view('user.login');
    }
}
