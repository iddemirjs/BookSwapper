<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $books = model('BookModel');
        $allbooks = $books->findAll();
        return view('listbooks', [
            'books' => $allbooks
        ]);
        //return view('listbooks');
    }
    public function viewDetails()
    {
        return view ('bookdetails');
    }
    public function records()
    {
        $db = db_connect();
        $books = model('BookModel');
        $allbooks = $books->findAll();
        return view('bookdetails', [
            'books' => $allbooks
            ]);
    }
}