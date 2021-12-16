<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard_sections/contents/vw_dash_main');
    }

    public function category()
    {
        $categories = model('CategoryModel');
        $all_cat = $categories->findAll();
        return view('dashboard_sections/contents/vw_dash_category',['categories' => $all_cat]);
    }

}

