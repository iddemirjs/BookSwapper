<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Book extends Entity
{
    protected $attributes = [
        'bk_id',
        'bk_title',
        'bk_authorId',
        'bk_description',
        'bk_editionNumber',
        'bk_mainImgUrl',
    ];
}