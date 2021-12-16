<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Category extends Entity
{
    protected $attributes = [
        'cat_id',
        'cat_name',
        'cat_parentId'
    ];
}