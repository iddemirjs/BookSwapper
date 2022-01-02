<?php
namespace App\Models;


use App\Entities\OfferLine;
use CodeIgniter\Model;
use App\Entities\Offer;

class OfferLineModel extends Model
{
    protected $table = 'tbl_offerLine';
    protected $primaryKey = 'line_id';
    protected $allowedFields= [
        'line_offerId',
        'line_bookId',
        'line_currentUserId',

    ];

    protected $validationRules=[
        'line_offerId' => 'required',
        'line_bookId' => 'required',
        'line_currentUserId' => 'required',

    ];

    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = OfferLine::class;
    protected $useSoftDeletes        = false;
}