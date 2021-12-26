<?php
namespace App\Controllers;

use CodeIgniter\Model;

class AuthorController extends BaseController
{
    public function index()
    {
        $author_model = Model('AuthorModel');
        $authors =  $author_model
            ->paginate(10);
        return view('list_authors',
            [
                'authors'=>$authors,
                'pager' =>$author_model->pager
            ]);
    }
    public function view_author($id)
    {
        $author = Model('AuthorModel') -> find($id);
        $book_model = Model('BookModel');
        $author_books['books'] = $book_model->select('*')
                        ->where('bk_authorId = '.$id)
                        ->paginate(10);
        $author_books['books_categories']= null;
        for($i = 0; $i<count($author_books['books']); $i++)
        {
            $id = $author_books['books'][$i]->bk_id;
            $author_books['books_categories'][$i] = (new BookController())->get_categories($id);
        }
        return view('author_details',
            [
                'author' => $author,
                'author_books' =>$author_books['books'],
                'books_categories'=>$author_books['books_categories'],
                'pager' =>$book_model->pager
            ]);
    }
}