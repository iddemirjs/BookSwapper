<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\UserModel;

function alert_function(string $message)
{
    // Display the alert box
    echo "<script>alert('$message');</script>";
}

class User extends BaseController {

    public function index()
    {
        return view('profile');
        //return view('listbooks');
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
            //$debug_export = $this->validator->getError();
            alert_function("Error Message");
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
            //var_dump($validation->getErrors());
            alert_function("Error Message");
            return view('sign_in');
            //return redirect()->to(base_url('sign_in'));
        }
    }


}