<?php

namespace App\Controllers;

use App\Models\AuthorModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard_sections/contents/vw_dash_main');
    }

    public function records()
    {
        $db = db_connect();
        $categories = model('CategoryModel');
        $all_cat = $categories->findAll();
        $authors = model('AuthorModel');
        $books = $db->query("SELECT * FROM tbl_book
                                    INNER JOIN tbl_author ta on tbl_book.bk_authorId = ta.auth_id
                                    INNER JOIN tbl_user tu on tu.usr_id = tbl_book.bk_ownerId")->getResult();
        $all_author = $authors->findAll();
        return view('dashboard_sections/contents/vw_dash_category', [
                'categories' => $all_cat,
                'authors'    => $all_author,
                'books'      => $books
            ]);
    }

    public function add_record()
    {
        $categories = model('CategoryModel');
        $all_cat = $categories->findAll();
        return view('dashboard_sections/contents/vw_dash_add',[
                'categories' => $all_cat
            ]);
    }
    public function delete_category($id)
    {
        $cat = new AuthorModel();
        $result=$cat->where('auth_id',$id)->delete($id);

        return $this->response->setJSON(['result'=>$result]);
    }
}

