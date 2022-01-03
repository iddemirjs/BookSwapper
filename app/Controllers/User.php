<?php

namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\BookModel;
use App\Models\OfferLineModel;
use App\Models\OfferModel;
use App\Models\UserModel;
use CodeIgniter\Model;
use function PHPUnit\Framework\equalTo;

class User extends BaseController
{

    public function index()
    {
        $data = session()->get('user');
        $user = new UserEntity();
        $user->fill($data);

        $user_books = $this->get_user_books_details($user->usr_id);
        $user_offers = $this->get_user_offers_details($user->usr_id);

        return view('profile', [
            'user' => $user,
            'books' => $user_books['books'],
            'books_categories' => $user_books['books_categories'],
            'books_authors' => $user_books['books_authors'],
            'received_offers' => $user_offers['received_offers'],
            'send_offers' => $user_offers['send_offers']
        ]);
    }

    public function profile($userId = -1)
    {
        if (session()->get('user') && $userId == -1) {
            $userId = session()->get('user')['usr_id'];
        }
        $offerModel = new OfferModel();
        $user = Model('UserModel')->find($userId);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $waitingOffers = $offerModel->select('CONCAT(t.usr_name," ",t.usr_surname) as targetName')->
        select('CONCAT(o.usr_name," ",o.usr_surname) as ownerName')->
        select('tbl_offer.*')->
        join('tbl_user as t', 't.usr_id=of_targetUserId')->
        join('tbl_user as o', 'o.usr_id=of_creatorUserId')->
        where(['of_status' => 0, 'of_targetUserId' => $userId])->findAll();
        $acceptedOffers = $offerModel->select('CONCAT(t.usr_name," ",t.usr_surname) as targetName')->
        select('CONCAT(o.usr_name," ",o.usr_surname) as ownerName')->
        select('tbl_offer.*')->
        join('tbl_user as t', 't.usr_id=of_targetUserId')->
        join('tbl_user as o', 'o.usr_id=of_creatorUserId')->
        where(['of_status' => 1, 'of_targetUserId' => $userId])->findAll();
        $rejectedOffers = $offerModel->select('CONCAT(t.usr_name," ",t.usr_surname) as targetName')->
        select('CONCAT(o.usr_name," ",o.usr_surname) as ownerName')->
        select('tbl_offer.*')->
        join('tbl_user as t', 't.usr_id=of_targetUserId')->
        join('tbl_user as o', 'o.usr_id=of_creatorUserId')->
        where(['of_status' => 2, 'of_targetUserId' => $userId])->findAll();
        $sentOffers = $offerModel->
        select('CONCAT(t.usr_name," ",t.usr_surname) as targetName')->
        select('CONCAT(o.usr_name," ",o.usr_surname) as ownerName')->
        select('tbl_offer.*')->
        join('tbl_user as t', 't.usr_id=of_targetUserId')->
        join('tbl_user as o', 'o.usr_id=of_creatorUserId')->
        where(['of_creatorUserId' => $userId])->findAll();

        foreach ($sentOffers as $sKey => $sentOffer){
            $sentOffers[$sKey]->books = $this->getOfferBooks($sentOffer->of_id);
        }


        $user_books = $this->get_user_books_details($userId);

        return view('profilePaper', [
            'user' => $user,
            'books' => $user_books['books'],
            'books_categories' => $user_books['books_categories'],
            'books_authors' => $user_books['books_authors'],
            'sentOffers' => $sentOffers,
            'rejectedOffers' => $rejectedOffers,
            'acceptedOffers' => $acceptedOffers,
            'waitingOffers' => $waitingOffers,
        ]);
    }

    public function getOfferBooks($offerId)
    {
        return (new OfferLineModel())->select('t.*')->select('tbl_offerLine.*')->
        join('tbl_book as t','line_bookId=t.bk_id')->
        where(['line_offerId'=>$offerId])->findAll();
    }

    public function view_profile($userId = -1)
    {
        $user = Model('UserModel')->find($userId);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $user_books = $this->get_user_books_details($userId);
        $user_offers = $this->get_user_offers_details($userId);

        return view('profile', [
            'user' => $user,
            'books' => $user_books['books'],
            'books_categories' => $user_books['books_categories'],
            'books_authors' => $user_books['books_authors'],
            'received_offers' => $user_offers['received_offers'],
            'send_offers' => $user_offers['send_offers']
        ]);
    }

    public function get_user_books_details($userId)
    {
        $user_books = (new BookController)->get_user_books($userId);
        $bcount = count($user_books['books']);
        $author_model = Model('AuthorModel');
        $user_books['books_authors'] = null;
        for ($i = 0; $i < $bcount; $i++) {
            $user_books['books_authors'][$i] = $author_model->find($user_books['books'][$i]->bk_authorId);
        }
        return $user_books;

    }

    private function categorize_offers($offers)
    {
        $cat_offers['Waiting'] = [];
        $cat_offers['Accepted'] = [];
        $cat_offers['Rejected'] = [];
        foreach ($offers as $offer) {
            if ($offer->of_status == 0) {
                $cat_offers['Waiting'][] = $offer;
            } elseif ($offer->of_status == 1) {
                $cat_offers['Accepted'][] = $offer;
            } else
                $cat_offers['Rejected'][] = $offer;
        }
        return $cat_offers;
    }

    private function get_user_offers_details($userId)
    {
        $offer_model = Model('OfferModel');
        //offer status 0 Waiting 1 Accepted 2 Rejected
        $user_offers['received_offers'] = $this->categorize_offers($offer_model->get_received_user_offers($userId));
        $user_offers['send_offers'] = $this->categorize_offers($offer_model->get_send_user_offers($userId));
        return $user_offers;
    }

    public function create()
    {
        define('img_upload_dir', realpath(dirname('user_images')));
        $validation = \Config\Services::validation();

        if ($validation->run($this->request->getPost(), 'validUserNew')) {
            $data = $this->request->getPost();
            $user = new UserEntity();
            $user->fill($data);

            $imageName = time() . $_FILES['usr_img_url']['name'];
            $target = img_upload_dir . '/uploads/user_images/' . $imageName;

            $user->usr_img_url = $imageName;

            move_uploaded_file($_FILES['usr_img_url']['tmp_name'], $target);

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
                    'usr_img_url' => $user->usr_img_url,
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
                'file' => $imageFile->getClientMimeType()
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

    public function go_update_user()
    {
        if (session()->get('user') === null){
            return json_encode(['status'=>false,'message'=>'please login']);
        }
        $user = session()->get('user');
        return view('user_edit', ['user' => $user]);
    }

    public function update_user($id)
    {
        define('img_upload_dir', realpath(dirname('user_images')));
        $validation = \Config\Services::validation();

        if ($validation->run($this->request->getPost(), 'validUserNew')) {
            $data = $this->request->getPost();
            $userModel = new UserModel();
            $user = new \App\Entities\User();
            $user->fill($data);

            $imageName = time() . $_FILES['usr_img_url']['name'];
            $target = img_upload_dir . '/uploads/user_images/' . $imageName;

            $user->usr_img_url = $imageName;

            move_uploaded_file($_FILES['usr_img_url']['tmp_name'], $target);
            $userModel->update($id, $user);

            $tmp = session()->get('user');


            session()->set('user', [
                'usr_username' => $user->usr_username,
                'usr_name' => $user->usr_name,
                'usr_surname' => $user->usr_surname,
                'usr_mail' => $user->usr_mail,
                'usr_img_url' => $user->usr_img_url,
                'usr_id' => $tmp['usr_id'],
                'usr_type' => $tmp['usr_type'],
            ]);


            return redirect()->to(base_url('user/go_update_user'));
        } else {
            $this->alert_function($validation->getErrors());
            return redirect()->to(base_url('user/go_update_user'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('home'));
    }
}