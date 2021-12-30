<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\UserModel;
use CodeIgniter\Model;

class User extends BaseController
{

    public function index()
    {
        $data = session()->get('user');
        $user = new \App\Entities\User();
        $user->fill($data);

        $user_books = (new BookController)->get_user_books($user->usr_id);

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

    public function view_profile($userId)
    {

        $user_books = (new BookController)->get_user_books($userId);
        $user = Model('UserModel')->find($userId);

        if (count($user_books['books']) != 0) {

            return view('profile', [
                'user' => $user,
                'books' => $user_books['books'],
                'books_categories' => $user_books['books_categories'],
                'have_books' => true
            ]);
        } else {
            return view('profile', [
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
        $user_books['books_authors'] = null;
        for ($i = 0; $i < $bcount; $i++) {
            $user_books['books_authors'][$i] = $author_model->find($user_books['books'][$i]->bk_authorId);
        }

        $offer_model = Model('OfferModel');
        //offer status 0 Waiting 1 Accepted 2 Rejected
        $user_offers['received_offers'] = $this->categorize_offers($offer_model->get_received_user_offers($userId));
        $user_offers['send_offers'] = $this->categorize_offers($offer_model->get_send_user_offers($userId));

        return view('list_user_books', [
            'books' => $user_books['books'],
            'books_categories' => $user_books['books_categories'],
            'books_authors' => $user_books['books_authors'],
            'received_offers' => $user_offers['received_offers'],
            'send_offers'=> $user_offers['send_offers']
        ]);

    }

    private function categorize_offers($offers)
    {
        $cat_offers['Waiting'] = [];
        $cat_offers['Accepted'] = [];
        $cat_offers['Rejected'] = [];
        foreach ($offers as $offer) {
            if($offer->of_status == 0)
            {
                $cat_offers['Waiting'][] = $offer;
            }
            elseif($offer->of_status == 1)
            {
                $cat_offers['Accepted'][] = $offer;
            }
            else
                $cat_offers['Rejected'][] = $offer;
        }
        return $cat_offers;
    }

    public function create()
    {
        $validation = \Config\Services::validation();

        if ($validation->run($this->request->getPost(), 'validUserNew')) {
            $data = $this->request->getPost();
            $user = new UserEntity();
            $user->fill($data);
            $userModel = new UserModel();
            $userModel->save($user);
            return view('sign_in');
        } else {
            $this->alert_function($validation->getErrors());
            return view('sign_up');
        }
    }

    public function login()
    {
        $validation = \Config\Services::validation();

        if ($validation->run($this->request->getPost(), 'validUserLogin')) {
            $userModel = new UserModel();
            $user = $userModel->where('usr_username', $this->request->getVar('usr_username'))->first();
            if ($user) {
                session()->set('user', [
                    'usr_username' => $user->usr_username,
                    'usr_id' => $user->usr_id,
                    'usr_name' => $user->usr_name,
                    'usr_surname' => $user->usr_username,
                    'usr_mail' => $user->usr_mail,
                    'usr_type' => $user->usr_type,
                    'usr_loggedIn' => true,
                ]);
                if ($user->user_type == 1)
                    return redirect()->to(base_url('dashboard'));
                else
                    return redirect()->to(base_url('home'));
            }
        } else {
            $this->alert_function($validation->getErrors());
            return view('sign_in');
        }
    }

    public function alert_function($errors)
    {
        $all_errors = '';
        foreach ($errors as $error) {
            //
            $all_errors = $all_errors . " || " . $error;
        }

        // Display the alert box
        echo "<script>alert('$all_errors');</script>";
    }

    public function upload()
    {
        helper(['form', 'url']);

        $database = db_connect();
        // Tablo ilişkisi düzeltilecek
        $builder = $database->table('users');

        $validateImage = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
                'max_size[file, 4096]',
            ],
        ]);

        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image could not upload"
        ];

        if ($validateImage) {
            $imageFile = $this->request->getFile('file');
            $imageFile->move(WRITEPATH . 'uploads');

            $data = [
                'img_name' => $imageFile->getClientName(),
                'file'  => $imageFile->getClientMimeType()
            ];

            $save = $builder->insert($data);

            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "Image successfully uploaded"
            ];
        }

        return $this->response->setJSON($response);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('home'));
    }
}