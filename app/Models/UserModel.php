<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'usr_id';
    protected $allowedFields= [
        'usr_name',
        'usr_surname',
        'usr_mail',
        'usr_username',
        'usr_password',
        'usr_updated_at',
        'usr_type',
        'usr_img_url',
    ];

    protected $validationRules = [
        'usr_username' => 'required',
        'usr_mail' => 'required|valid_email|is_unique[tbl_user.usr_mail,usr_mail,{usr_mail}]',
        'usr_password' => 'required|min_length[2]|max_length[30]',
        'usr_name' =>'required|min_length[2]|max_length[50]',
        'usr_surname' => 'required|min_length[2]|max_length[50]'
    ];
    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = User::class;
    protected $useTimestamps = true;
    protected $createdField = 'usr_created_at';
    protected $updatedField = 'usr_updated_at';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


    protected function beforeInsert( array $data )
    {
        return $this->_hashPassword( $data );
    }

    protected function beforeUpdate( array $data )
    {
        return $this->_hashPassword( $data );
    }

    protected function _hashPassword( array $data )
    {
        if( isset($data['data']['usr_password']))
            $data['data']['usr_password'] = password_hash( $data['data']['usr_password'] , PASSWORD_DEFAULT);
        return $data;
    }
}