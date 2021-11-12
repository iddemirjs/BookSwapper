<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity {

    protected $attributes = [
        'usr_id' => null,
        'usr_name' => null, // Represents a username
        'usr_surname' => null, // Represents a username
        'usr_mail' => null,
        'usr_username' => null,
        'usr_password' => null,
        'usr_img_url'=>null,
    ];

    public function setPassword(string $pass)
    {
        $this->attributes['usr_password'] = password_hash($pass, PASSWORD_BCRYPT);

        return $this;
    }

    public function setCreatedAt(string $dateString)
    {
        $this->attributes['usr_created_at'] = new Time($dateString, 'UTC');

        return $this;
    }

    public function getCreatedAt(string $format = 'Y-m-d H:i:s')
    {
        // Convert to CodeIgniter\I18n\Time object
        $this->attributes['usr_created_at'] = $this->mutateDate($this->attributes['usr_created_at']);

        $timezone = $this->timezone ?? app_timezone();

        $this->attributes['usr_created_at']->setTimezone($timezone);

        return $this->attributes['usr_created_at']->format($format);
    }
}