<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    public function index()
    {


        $authors = model('AuthorModel')->findAll();
        $categories = model('CategoryModel')->findAll();
        $results_per_page = 10;
        $book_model = model('BookModel');
        $page_books['books'] = $book_model->paginate($results_per_page);
        for($i = 0; $i<count($page_books['books']); $i++)
        {
            $id = $page_books['books'][$i]->bk_id;
            $page_books['books_categories'][$i] = $this->get_categories($id);
        }

        return view('listbooks', [
            'books' =>  $page_books['books'],
            'pager'=> $book_model->pager,
            'authors' => $authors,
            'categories' => $categories,
            'books_categories' => $page_books['books_categories']
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
    public function get_categories($bookId)
    {
        $db = db_connect();
        $categories = $db->query("SELECT cat_id,cat_name FROM tbl_bookcategory,tbl_category 
                        WHERE bc_bookId = $bookId AND cat_id = bc_catId" )->getResult();
        return $categories;
    }
    public function sort_by_category($categoryId)
    {
        $db = db_connect();
        $results_per_page = 10;
        $book_model = new BookModel();
        /*
        $query = $db ->query("SELECT *  FROM tbl_book as book,tbl_bookcategory,tbl_category
                         WHERE bk_id = bc_bookId AND cat_id = bc_catId AND cat_id = $categoryId")->getResult();
        */


        $where_key = 'bk_id = bc_bookId AND cat_id = bc_catId AND cat_id = ' . $categoryId;
        $page_books['books'] = $book_model->select('bk_id,bk_ownerId,
                                    bk_title,bk_authorId,bk_description,bk_editionNumber,bk_mainImgUrl')
            ->from('tbl_bookcategory')
            ->from('tbl_category')
            ->where($where_key)
            ->paginate($results_per_page);
        $authors = model('AuthorModel')->findAll();
        $categories = model('CategoryModel')->findAll();
        for($i = 0; $i<count($page_books['books']); $i++)
        {
            $id = $page_books['books'][$i]->bk_id;
            $page_books['books_categories'][$i] = $this->get_categories($id);
        }


        return view('listbooks', [
            'books' =>  $page_books['books'],
            'pager'=> $book_model->pager,
            'authors' => $authors,
            'categories' => $categories,
            'books_categories' => $page_books['books_categories']
        ]);

    }

}