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

    public function get_received_user_offers($userId)
    {
        return $this->where('of_targetUserId = '.$userId)
                    ->findAll();
    }
    public function get_send_user_offers($userId)
    {
        return $this->where('of_creatorUserId = '.$userId)
            ->findAll();
    }
}