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
        'auth_name' => 'required',
        'auth_surname' => 'required',
        'auth_description' => 'required',
    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = AuthorModel::class;
    protected $useSoftDeletes        = false;
}