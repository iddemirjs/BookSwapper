<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data){
        $model = new UserModel();
        $user = $model->where('usr_username', $data['usr_username'])->first();

        if(!$user) {
            // Burada mesajı error olarak yazdır.
            echo 'User not found!';
            return false;
        }
        else {
            if(password_verify($data['usr_password'], $user->usr_password)){
                // password is valid
            }
            else{
                // password is invalid
                echo 'Password is wrong!';
            }
            return password_verify($data['usr_password'], $user->usr_password);
        }
    }
}