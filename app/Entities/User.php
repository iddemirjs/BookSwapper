<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity {

    protected $attributes = [
        'usr_id' => null,
        'usr_name' => null, // Represents a username
        'usr_surname' => null, // Represents a username
        'usr_mail' => null,
        'usr_username' => null,
        'usr_password' => null,
        'usr_type' => null,
        'usr_img_url'=>null,
    ];
}