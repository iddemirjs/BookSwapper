<?php

namespace App\Controllers;

class Book extends BaseController
{
    public function index()
    {
        return view('listbooks');
    }
    public function viewDetails()
    {
        return view ('bookdetails');
    }
}