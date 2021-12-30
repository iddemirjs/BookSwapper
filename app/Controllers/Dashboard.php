<?php

namespace App\Controllers;

use App\Entities\Author;
use App\Entities\Category;
use App\Entities\User;
use App\Models\AuthorModel;
use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        if (session()->get('user')['usr_type'] === '0') {
            die('unauthorized access');
        }
    }

    public function index()
    {
        return view('dashboard_sections/contents/vw_dash_main');
    }

    public function records()
    {
        $db = db_connect();
        $categories = new CategoryModel();
        $authors = new AuthorModel();
        $userModel = new UserModel();
        $all_cat = $categories->findAll();
        $books = $db->query("SELECT * FROM tbl_book
                                    INNER JOIN tbl_author ta on tbl_book.bk_authorId = ta.auth_id
                                    INNER JOIN tbl_user tu on tu.usr_id = tbl_book.bk_ownerId")->getResult();
        $all_author = $authors->findAll();
        $users = $userModel->findAll();
        return view('dashboard_sections/contents/vw_dash_category', [
            'categories' => $all_cat,
            'books' => $books,
            'authors' => $all_author,
            'users' => $users
        ]);
    }

    public function add_record()
    {
        $authors = new AuthorModel();
        $userModel = new UserModel();
        $categories = model('CategoryModel');
        $all_cat = $categories->findAll();
        $all_author = $authors->findAll();
        $users = $userModel->findAll();
        return view('dashboard_sections/contents/vw_dash_add', [
            'categories' => $all_cat,
            'authors' => $all_author,
            'users' => $users
        ]);
    }

    public function delete_author($id)
    {
        $auth = new AuthorModel();
        $result = $auth->where('auth_id', $id)->delete($id);

        return $this->response->setJSON(['result' => $result]);
    }

    public function update_author($id)
    {
        if ($this->request->getPost('auth_id')) {
            $data = $this->request->getPost();
            $authorModel = new AuthorModel();
            $author = new Author();
            $author->fill($data);
            $authorModel->update($id, $author);
            return redirect()->to(base_url('dashboard/records'));
        } else {
            $categories = model('CategoryModel');
            $author = new AuthorModel();
            $edit_auth = $author->find($id);
            $all_cat = $categories->findAll();
            return view('dashboard_sections/contents/vw_dash_add', [
                'categories' => $all_cat,
                'author' => $edit_auth
            ]);
        }
    }

    public function delete_category($id)
    {
        $auth = new CategoryModel();
        $result = $auth->where('cat_id', $id)->delete($id);

        return $this->response->setJSON(['result' => $result]);
    }

    public function update_category($id)
    {
        if ($this->request->getPost('cat_id')) {
            $data = $this->request->getPost();
            $categoryModel = new CategoryModel();
            $category = new Category();
            $category->fill($data);
            $categoryModel->update($id, $category);
            return redirect()->to(base_url('dashboard/records'));
        } else {
            $categories = model('CategoryModel');
            $category = new CategoryModel();
            $edit_category = $category->find($id);
            $all_cat = $categories->findAll();
            return view('dashboard_sections/contents/vw_dash_add', [
                'categories' => $all_cat,
                'categoryEdit' => $edit_category
            ]);
        }
    }

    public function delete_book($id)
    {
        $auth = new CategoryModel();
        $result = $auth->where('cat_id', $id)->delete($id);

        return $this->response->setJSON(['result' => $result]);
    }

    public function update_book($id)
    {

        if ($this->request->getPost('usr_id')) {
            $data = $this->request->getPost();
            $userModel = new UserModel();
            $user = new User();
            $user->fill($data);
            $userModel->update($id, $user);
            return redirect()->to(base_url('dashboard/records'));
        } else {
            $authors = new AuthorModel();
            $userModel = new UserModel();
            $categories = new CategoryModel();
            $bookModel = new BookModel();
            $all_cat = $categories->findAll();
            $all_author = $authors->findAll();
            $users = $userModel->findAll();
            $editBook= $bookModel->find($id);
            return view('dashboard_sections/contents/vw_dash_add', [
                'categories' => $all_cat,
                'authors' => $all_author,
                'users' => $users,
                'bookEdit' => $editBook
            ]);
        }
    }

    public function delete_user($id)
    {
        $user = new UserModel();
        $result = $user->where('usr_id', $id)->delete($id);

        return $this->response->setJSON(['result' => $result]);
    }

    public function update_user($id)
    {
        if ($this->request->getPost('usr_id')) {
            $data = $this->request->getPost();
            unset($data['usr_id']);
            if ($data['usr_password'] == null) {
                unset($data['usr_password']);
                unset($data['usr_password_again']);
            } else {
                unset($data['usr_password_again']);
            }
            $userModel = new UserModel();
            $user = new User();
            $user->fill($data);
            $userModel->update($id, $user);
            return redirect()->to(base_url('dashboard/records'));
        } else {
            $categories = model('CategoryModel');
            $userModel = new UserModel();
            $all_cat = $categories->findAll();
            $edit_user = $userModel->find($id);
            return view('dashboard_sections/contents/vw_dash_add', [
                'categories' => $all_cat,
                'userEdit' => $edit_user
            ]);
        }
    }
}

