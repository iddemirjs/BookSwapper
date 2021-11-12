<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        var_dump(session()->get('user'));
        echo 'welcome_dasboard';
    }
}