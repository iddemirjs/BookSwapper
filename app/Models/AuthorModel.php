<?php

namespace App\Models;

use App\Entities\Author;
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
    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = Author::class;
    protected $useSoftDeletes        = false;
}