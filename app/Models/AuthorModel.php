<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table = 'tbl_author';
    protected $primaryKey = 'auth_id';
    protected $allowedFields= [
        'auth_name',
        'auth_surname',
        'auth_description',
    ];

    protected $validationRules = [
        'auth_name' => 'required|is_unique[tbl_user.usr_username]',
        'auth_surname' => 'required|valid_email|is_unique[tbl_user.usr_mail]',
        'auth_description' => 'required|min_length[6]|max_length[30]',
    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = AuthorModel::class;
    protected $useSoftDeletes        = false;
}