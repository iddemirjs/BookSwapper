<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\UserModel;

class User extends BaseController {

    public function index()
    {
        return view('profile');
    }
    public function view_profile($userId)
    {

        $user_books = (new BookController)->get_user_books($userId);
        $user = Model('UserModel')->find($userId);

        if(count($user_books['books']) != 0)
        {

            return view('profile',[
                'user' => $user,
                'books' => $user_books['books'],
                'books_categories'=> $user_books['books_categories'],
                'have_books' => true
            ]);
        }
        else
        {
            return view('profile',[
                'user' => $user,
                'have_books' => false
            ]);
        }
    }
    public function view_user_books($userId)
    {
        $user_books = (new BookController)->get_user_books($userId);
        $bcount = count($user_books['books']);
        $author_model = Model('AuthorModel');
        for ($i = 0;$i<$bcount;$i++)
        {
            $user_books['books_authors'][$i] = $author_model->find($user_books['books'][$i]->bk_authorId);
        }

        if(count($user_books['books']) != 0)
        {

            return view('list_user_books',[
                'books' => $user_books['books'],
                'books_categories'=> $user_books['books_categories'],
                'have_books' => true,
                'books_authors' => $user_books['books_authors']
            ]);
        }
        else
        {
            return view('list_user_books',[
                'have_books' => false
            ]);
        }
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