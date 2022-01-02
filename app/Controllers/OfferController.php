<?php

namespace App\Controllers;

use App\Entities\Offer;
use App\Entities\OfferLine;
use App\Models\BookModel;
use App\Models\OfferLineModel;
use App\Models\OfferModel;
use App\Models\UserModel;

class OfferController extends BaseController
{
    public function make($bookId)
    {
        $bookModel = new BookModel();
        $userModel = new UserModel();
        $book = $bookModel->find($bookId);
        if (!$book){
            die("404 : Book is not defined.");
        }
        $targetUser = $userModel->where(['usr_id'=>$book->bk_ownerId])->find()[0];
        $targetUserBooks = $bookModel->where(['bk_ownerId'=>$book->bk_ownerId])->findAll();
        $offerUser = (object) session()->get('user');
        $offerBooks = $bookModel->where(['bk_ownerId'=>$offerUser->usr_id])->findAll();
        if ($targetUser->usr_id === $offerUser->usr_id) {
            die("400 : Bad Request");
        }
        return view('make_offer', [
            'bookId' => $bookId,
            'offerBooks' => $offerBooks,
            'offerUser' => $offerUser,
            'targetUser' => $targetUser,
            'targetUserBooks' => $targetUserBooks
        ]);
    }

    public function create()
    {
        $validation = \Config\Services::validation();

        $data = $this->request->getPost();
        if ($validation->run($data, 'validOffer')) {
            $offerModel = new OfferModel();
            $offerLineModel = new OfferLineModel();

            $offer = (new Offer())->fill($data);
            if (!$offerModel->save($offer)) return json_encode(['status'=>false,'message'=>'Offer is not inserted']);
            $offerId = $offerModel->getInsertID();
            foreach ($data['books'] as $userId => $books) {
                foreach ($books as $book) {
                    $offerLine = [
                        'line_offerId' => $offerId,
                        'line_bookId' => $book,
                        'line_currentUserId'=>$userId
                    ];
                    $offerLineModel->save($offerLine);
                }
            }
            return view('offer_created',[]);
        }else{
            return json_encode(['status'=>false,'message'=>'Form datas has lacking']);
        }
        return json_encode($data);
    }

    public function aaaa($value = '')
    {
        return view('offer_created',[]);
    }
}