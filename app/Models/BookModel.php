<?php

namespace App\Models;

use App\Entities\Book;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'tbl_book';
    protected $primaryKey = 'bk_id';
    protected $allowedFields= [
        'bk_title',
        'bk_authorId',
        'bk_description',
        'bk_editionNumber',
        'bk_mainImgUrl',

    ];

    protected $validationRules=[
        'bk_title' => 'required',
        'bk_authorId' => 'required',
    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = Book::class;
    protected $useSoftDeletes        = false;
}