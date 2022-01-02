<?php

namespace App\Controllers;

class OfferController extends BaseController
{
    public function make($bookId)
    {
        return view('make_offer', [
            'bookId' => $bookId
        ]);
    }
}