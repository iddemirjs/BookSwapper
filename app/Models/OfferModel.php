<?php
namespace App\Models;


use CodeIgniter\Model;
use App\Entities\Offer;

class OfferModel extends Model
{
    protected $table = 'tbl_offer';
    protected $primaryKey = 'of_id';
    protected $allowedFields= [
        'of_creatorUserId',
        'of_targetUserId',
        'of_description',

    ];

    protected $validationRules=[
        'of_creatorUserId' => 'required',
        'of_targetUserId' => 'required',
        'of_description' => 'required',

    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = Offer::class;
    protected $useSoftDeletes        = false;
}