<?php

namespace App\Controllers;

use App\Entities\Offer;
use App\Entities\OfferLine;
use App\Models\BookModel;
use App\Models\OfferLineModel;
use App\Models\OfferModel;
use App\Models\UserModel;
use CodeIgniter\Model;

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
            die("400 : Bad Request : You can not create a offer with self.");
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

    public function reject($offerId)
    {
        $user = (object) session()->get('user');
        if (!$offerId) return json_encode(['status'=>false,'message'=>'Offer id required']);
        $offerModel = new OfferModel();
        $offer = $offerModel->where(['of_id' => $offerId])->find();

        if (count($offer) == 0) return json_encode(['status'=>false,'message'=>'Offer is not found']);
        if ($user && $offer[0]->of_targetUserId != $user->usr_id)
            return json_encode(['status'=>false,'message'=>'You can only edit your offer.']);

        $offer[0]->of_status = 2;
        $offerModel->save($offer[0]);
        return redirect()->to('/profile/'.$user->usr_id);
    }

    public function accept($offerId)
    {
        $user = (object) session()->get('user');
        if (!$offerId) return json_encode(['status'=>false,'message'=>'Offer id required']);
        $offerModel = new OfferModel();
        $offer = $offerModel->where(['of_id' => $offerId])->find();

        if (count($offer) == 0) return json_encode(['status'=>false,'message'=>'Offer is not found']);
        if ($user && $offer[0]->of_targetUserId != $user->usr_id)
            return json_encode(['status'=>false,'message'=>'You can only edit your offer.']);

        $offer[0]->of_status = 1;
        $offerModel->save($offer[0]);
        $offerLinesModel = new OfferLineModel();
        $offerLines = $offerLinesModel->where(['line_offerId'=>$offer[0]->of_id])->findAll();
        $bookModel = new BookModel();
        foreach ($offerLines as $line_key => $offerLine){
            $book = $bookModel->where(['bk_id'=>$offerLine->line_bookId])->find();
            if (count($book) == 0) continue;
            if ($book[0]->bk_ownerId == $offer[0]->of_creatorUserId){
                $book[0]->bk_ownerId = $offer[0]->of_targetUserId;
            }else{
                $book[0]->bk_ownerId = $offer[0]->of_creatorUserId;
            }
            $bookModel->save($book[0]);
        }
        return redirect()->to('/profile/'.$user->usr_id);
    }

    public function aaaa($value = '')
    {
        return view('offer_created',[]);
    }
}