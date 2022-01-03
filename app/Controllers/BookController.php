<?php

namespace App\Controllers;
use App\Entities\Book;
use App\Entities\Book as BookEntity;
use App\Entities\User as UserEntity;
use App\Models\AuthorModel;
use App\Models\BookModel;
use App\Models\UserModel;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\ClassString;

define ('img_upload_dir', realpath(dirname('user_images')));

class BookController extends BaseController
{
    public function index()
    {
        $author_model = Model('AuthorModel');
        $authors = $author_model->findAll();
        $categories = model('CategoryModel')->findAll();
        $results_per_page = 9;
      
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

    public function bookAdd(){
        $data['authors'] = Model('AuthorModel')->findAll();
        return view('bookadding', $data);
    }

    public function view_details($bookId)
    {
        $bookModel = new BookModel();
        $book = $bookModel->find($bookId);
        return view('bookdetails',
            ['book' => $book
            ]);
    }

    public function create()
    {
        $validation =  \Config\Services::validation();
        if ($validation->run($this->request->getPost(),'validBookNew')) {
            $data = $this->request->getPost();
            $data['bk_ownerId'] = session()->get('user')['usr_id'];
            $book = new BookEntity();
            $book->fill($data);

            $imageName = time() . $_FILES['bk_mainImgUrl']['name'];
            $target =  img_upload_dir . '\uploads\book_images\\' . $imageName;

            $book->bk_mainImgUrl = $imageName;

            move_uploaded_file($_FILES['bk_mainImgUrl']['tmp_name'], $target);

            $bookModel = new BookModel();
            $bookModel->save($book);
            return view('main');
        }else {
            var_dump($validation->getErrors());
            return view('bookadding');
        }
    }
    public function book_update($bookId)
    {
        $book = Model('BookModel')->find($bookId);
        $authors = Model('AuthorModel')->findAll();
        return view('bookedit',[
            'book'=> $book,
            'authors'=>$authors]);
    }

    public function update($bookId)
    {
        $validation =  \Config\Services::validation();

        if ($validation->run($this->request->getPost(),'validBookNew')) {
            $data = $this->request->getPost();
            $book = new BookEntity();
            $book->bk_id = $bookId;
            $book->fill($data);

            $imageName = time() . $_FILES['bk_mainImgUrl']['name'];
            $target =  img_upload_dir . '\uploads\book_images\\' . $imageName;

            $book->bk_mainImgUrl = $imageName;

            move_uploaded_file($_FILES['bk_mainImgUrl']['tmp_name'], $target);

            $bookModel = new BookModel();
            $bookModel->update($book->bk_id,$book);
            return view('main');
        }else {
            var_dump($validation->getErrors());
            return view('bookadding');
        }
    }

    public function get_authors($bookId)
    {
        $db = db_connect();
        $authors = $db->query("SELECT auth_id,auth_name FROM tbl_author,tbl_book
                        WHERE bk_id = $bookId AND bk_authorId = auth_id")->getResult();
        return $authors;
    }

    public function get_categories($bookId)
    {
        $db = db_connect();
        $categories = $db->query("SELECT cat_id,cat_name FROM tbl_bookCategory,tbl_category 
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
            ->from('tbl_bookCategory')
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

    public function sort_by_author($authorId)
    {
        $results_per_page = 10;
        $book_model = new BookModel();
        $where_key = 'bk_authorId = ' . $authorId;
        $page_books['books'] = $book_model->select('bk_id,bk_ownerId,
                                    bk_title,bk_authorId,bk_description,bk_editionNumber,bk_mainImgUrl')
            ->from('tbl_bookCategory')
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

    public function getBookById($bookId)
    {
        $bookModel = new BookModel();
        $book = $bookModel->where(['bk_id'=>$bookId])->find();
        if (count($book) == 0){
            return json_encode(['status' => false]);
        }else{
            return json_encode(['status' => true,'book'=>$book[0]]);
        }
    }

    public function send_offer($bookId)
    {
        $data = $this->request->getPost();
        var_dump($data);
    }
}