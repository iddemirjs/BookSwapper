<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('bookadding');
    }
    public function signUp(){
        return view('sign_up');
    }
    public function signIn(){
        return view('sign_in');
    }
}
