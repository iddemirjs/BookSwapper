<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
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
    public function view_details($bookId)
    {
        //$db = db_connect();
        //$book =$db->query("SELECT * FROM tbl_book
         //                           WHERE tbl_book.bk_id= $bookId")->getResult();
        $bookModel = new BookModel();
        $book= $bookModel->find($bookId);
        return view ('bookdetails',
            [ 'book'=>$book
            ]);
    }

}