<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class User extends BaseController {

    public function index()
    {
        //return view('profile');
        return view('listbooks');
    }

    public function create()
    {
        $validation =  \Config\Services::validation();

        if ($validation->run($this->request->getPost(),'validUserNew')) {
           $data = $this->request->getPost();
           $user = new UserEntity();
           $user->fill($data);
           $userModel = new UserModel();
           $userModel->save($user);
           return view('sign_in');
        }else {
            var_dump($validation->getErrors());
            return view('sign_up');
        }

    }
}