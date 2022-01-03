<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class OfferLine extends Entity
{
    protected $attributes = [
        'line_id',
        'line_offerId',
        'line_bookId',
        'line_currentUserId',
    ];
}