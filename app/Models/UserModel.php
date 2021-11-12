<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'usr_id';
    protected $allowedFields= [
        'usr_name',
        'usr_surname',
        'usr_mail', // Represents a username
        'usr_username', // Represents a username
        'usr_password',
        'usr_updated_at',
        'usr_img_url',
    ];
    protected $returnType    = \App\Entities\User::class;
    protected $useTimestamps = true;
    protected $createdField = 'usr_created_at';
    protected $updatedField = 'usr_updated_at';
}