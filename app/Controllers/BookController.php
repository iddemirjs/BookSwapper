<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\ClassString;

class BookController extends BaseController
{
    public function index()
    {

        $author_model = Model('AuthorModel');
        $authors = $author_model->findAll();
        $categories = model('CategoryModel')->findAll();
        $results_per_page = 10;
        $book_model = model('BookModel');
        $page_books['books'] = $book_model->paginate($results_per_page);
        for ($i = 0; $i < count($page_books['books']); $i++) {
            $id = $page_books['books'][$i]->bk_id;
            $page_books['books_categories'][$i] = $this->get_categories($id);
            $page_books['books_authors'][$i] = $author_model->find($page_books['books'][$i]->bk_authorId);
        }

        return view('listbooks', [
            'books' => $page_books['books'],
            'pager' => $book_model->pager,
            'authors' => $authors,
            'categories' => $categories,
            'books_categories' => $page_books['books_categories'],
            'books_authors' => $page_books['books_authors']
        ]);
    }

    public function view_details($bookId)
    {

        $bookModel = new BookModel();
        $book = $bookModel->find($bookId);
        return view('bookdetails',
            ['book' => $book
            ]);
    }

    public function get_categories($bookId)
    {
        $db = db_connect();
        $categories = $db->query("SELECT cat_id,cat_name FROM tbl_bookcategory,tbl_category 
                        WHERE bc_bookId = $bookId AND cat_id = bc_catId")->getResult();
        return $categories;
    }

    public function sort_by_category($categoryId)
    {
        $results_per_page = 10;
        $book_model = new BookModel();
        /*
        $query = $db ->query("SELECT *  FROM tbl_book as book,tbl_bookcategory,tbl_category
                         WHERE bk_id = bc_bookId AND cat_id = bc_catId AND cat_id = $categoryId")->getResult();
        */

        //Tablo olarak defaultta zaten tbl_bookdaydı o yüzden ekstra from yazmaya gerek yok
        $where_key = 'bk_id = bc_bookId AND cat_id = bc_catId AND cat_id = ' . $categoryId;
        $page_books['books'] = $book_model->select('bk_id,bk_ownerId,
                                    bk_title,bk_authorId,bk_description,bk_editionNumber,bk_mainImgUrl')
            ->from('tbl_bookcategory')
            ->from('tbl_category')
            ->where($where_key)
            ->groupBy('bk_id')
            ->paginate($results_per_page);

        $author_model = Model('AuthorModel');
        $authors = $author_model->findAll();
        $categories = Model('CategoryModel')->findAll();

        $page_books['books_categories'] = null;
        $page_books['books_authors'] = null;
        for ($i = 0; $i < count($page_books['books']); $i++) {
            $id = $page_books['books'][$i]->bk_id;
            $page_books['books_categories'][$i] = $this->get_categories($id);
            $page_books['books_authors'][$i] = $author_model->find($page_books['books'][$i]->bk_authorId);
        }


        return view('listbooks', [
            'books' => $page_books['books'],
            'pager' => $book_model->pager,
            'authors' => $authors,
            'categories' => $categories,
            'books_categories' => $page_books['books_categories'],
            'books_authors' => $page_books['books_authors']
        ]);


    }

    public function get_user_books($userId)
    {

        $book_model = new BookModel();
        //Tablo olarak defaultta zaten tbl_bookdaydı o yüzden ekstra from yazmaya gerek yok

        /*
        $query = $db ->query("SELECT 'bk_id,bk_ownerId,
                                    bk_title,bk_authorId,bk_description,bk_editionNumber,bk_mainImgUrl'
                            FROM tbl_user WHERE bk_ownerId = $userId
                            GROUP BY bk_id)->getResult();
        */

        $user_books['books'] = $book_model
            ->select('bk_id,bk_ownerId,
                                    bk_title,bk_authorId,bk_description,bk_editionNumber,bk_mainImgUrl')
            ->from('tbl_user')
            ->where('bk_ownerId = ' . $userId)
            ->groupBy('bk_id')
            ->findAll();
        $user_books['book_model'] = $book_model;
        $user_books['books_categories'] = null;
        for ($i = 0; $i < count($user_books['books']); $i++) {
            $id = $user_books['books'][$i]->bk_id;
            $user_books['books_categories'][$i] = $this->get_categories($id);
        }
        return $user_books;
    }

    public function make_an_offer($bookId)
    {
        return view('make_offer', [
            'bookId' => $bookId
        ]);
    }

    public function send_offer($bookId)
    {
        $data = $this->request->getPost();
        var_dump($data);
    }
}