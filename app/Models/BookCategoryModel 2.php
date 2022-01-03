<?php
namespace App\Models;


use App\Entities\OfferLine;
use CodeIgniter\Model;
use App\Entities\Offer;

class BookCategoryModel extends Model
{
    protected $table = 'tbl_bookCategory';
    protected $primaryKey = 'bc_id';
    protected $allowedFields= [
        'bc_bookId',
        'bc_catId',
    ];

    protected $validationRules=[
        'bc_bookId' => 'required',
        'bc_bookId' => 'required',
    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $useSoftDeletes        = false;
}