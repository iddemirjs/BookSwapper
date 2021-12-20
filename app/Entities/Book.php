<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Book extends Entity {

    protected $attributes = [
        'bk_id' => null,
        'bk_ownerId'=> null,
        'bk_title'=> null,
        'bk_authorId'=> null,
        'bk_description'=> null,
        'bk_editionNumber'=> null,
        'bk_mainImgUrl'=> null
    ];
}