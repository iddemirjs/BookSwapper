<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\BookModel;
use App\Models\UserModel;
use CodeIgniter\Model;

class User extends BaseController {

    public function index()
    {
        return view('profile');
    }
    public function view_profile($userId)
    {
        //Bu kitap şeyi aslında kitap kontrolcüsünde olmalı ama viewları nasıl ayarlıyacağıma
        //kafam basmadı o yüzden şu anlık burada duruyor idris baba akıl ver bize.

        $user = Model('UserModel')->find($userId);
        $book_model = new BookModel();
        //Tablo olarak defaultta zaten tbl_bookdaydı o yüzden ekstra from yazmaya gerek yok

        $user_books['books'] = $book_model
                ->select('bk_id,bk_ownerId,
                                    bk_title,bk_authorId,bk_description,bk_editionNumber,bk_mainImgUrl')
                ->from('tbl_user')
                ->where('bk_ownerId = '. $userId)
                ->groupBy('bk_id')
                ->paginate(5);
        if(count($user_books['books']) != 0)
        {
            for($i = 0; $i<count($user_books['books']); $i++)
            {
                $id = $user_books['books'][$i]->bk_id;
                $user_books['books_categories'][$i] = (new BookController)->get_categories($id);
            }
            return view('profile',[
                'user' => $user,
                'books' => $user_books['books'],
                'books_categories'=> $user_books['books_categories'],
                'pager' => $book_model->pager,
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