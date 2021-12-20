<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\UserModel;

class User extends BaseController {

    public function index()
    {
        return view('profile');
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
            $this->alert_function($validation->getErrors());
            return view('sign_up');
        }
    }

    public function login()
    {
        $validation =  \Config\Services::validation();

        if ($validation->run($this->request->getPost(),'validUserLogin')) {
            $userModel = new UserModel();
            $user = $userModel->where('usr_username',$this->request->getVar('usr_username'))->first();
            if ($user){
                session()->set('user',[
                    'usr_username' => $user->usr_username,
                    'usr_id' => $user->usr_id,
                    'usr_name' => $user->usr_name,
                    'usr_surname' => $user->usr_username,
                    'usr_mail' => $user->usr_mail,
                    'usr_loggedIn' => true,
                ]);
                return redirect()->to(base_url('dashboard'));
            }
        }
        else {
            $this->alert_function($validation->getErrors());
            return view('sign_in');
        }
    }

    public function alert_function($errors)
    {
        $all_errors = '';
        foreach ($errors as $error){
            //
            $all_errors = $all_errors." || ".$error;
        }

        // Display the alert box
        echo "<script>alert('$all_errors');</script>";
    }
}