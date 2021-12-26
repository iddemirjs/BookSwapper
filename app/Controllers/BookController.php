<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    public function index()
    {

        $results_per_page = 1;
        $book_model = model('BookModel');
        $page_books = $book_model->paginate($results_per_page);
        return view('listbooks', [
            'books' =>  $page_books,
            'pager'=>$book_model->pager
        ]);
    }
    public function view_details($bookId)
    {

        $bookModel = new BookModel();
        $book= $bookModel->find($bookId);
        return view ('bookdetails',
            [ 'book'=>$book
            ]);
    }

}