<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class User extends BaseController {

    public function index()
    {
        return view('sing_up');
    }

    public function create()
    {
        $validation =  \Config\Services::validation();
        $rules = [
            'usr_username' => [
                'label' => 'Username',
                'rules' => 'required'
            ],
            'usr_mail' => [
                'label' => 'user mail',
                'rules' => 'required|valid_email'],
            'usr_password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[30]'
            ],
            'usr_passwordAgain' => [
                'label' => 'Password Again',
                'rules' => 'required|min_length[6]|max_length[30]|matches[usr_password]'
            ],
            'usr_name' => [
                'label' => 'name user',
                'rules' => 'required|min_length[1]|max_length[50]'
            ],
            'usr_surname' => [
                'label' => 'user surname',
                'rules' => 'required|min_length[1]|max_length[50]'
            ]
        ];
        $validation->setRules($rules);

        if ($validation->withRequest($this->request)->run()) {
           $data = $this->request->getPost();
           $user = new UserEntity();
           $user->fill($data);
           $userModel = new UserModel();
           $userModel->save($user);
        }else {
            var_dump($validation->getErrors());
        }
        return view('sign_in');
    }
}