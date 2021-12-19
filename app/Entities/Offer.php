<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Offer extends Entity
{
    protected $attributes = [
        'of_id',
        'of_creatorUserId',
        'of_targetUserId',
        'of_description',
    ];
}