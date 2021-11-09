<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('main');
    }
    public function signUp(){
        return view('sign_up');
    }
}
