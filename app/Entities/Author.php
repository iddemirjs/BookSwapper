<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Author extends Entity {

    protected $attributes = [
        'auth_id' => null,
        'auth_name' => null, // Represents a username
        'auth_surname' => null, // Represents a username
        'auth_description' => null,
    ];
}