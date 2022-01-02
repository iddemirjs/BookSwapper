<?php

namespace Config;

use App\Validation\UserRules;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        UserRules::class
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $validUserNew = [
        'usr_username' => [
            'label' => 'Username',
            'rules' => 'required'
        ],
        'usr_mail' => [
            'label' => 'user mail',
            'rules' => 'required|valid_email'],
        'usr_password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[6]|max_length[30]'
        ],
        'usr_passwordAgain' => [
            'label' => 'Password Again',
            'rules' => 'required|min_length[6]|max_length[30]|matches[usr_password]'
        ],
        'usr_name' => [
            'label' => 'name user',
            'rules' => 'required|min_length[2]|max_length[50]'
        ],
        'usr_surname' => [
            'label' => 'user surname',
            'rules' => 'required|min_length[2]|max_length[50]'
        ]
    ];
    public $validUserLogin = [
        'usr_username' => [
            'label' => 'Username',
            'rules' => 'required|min_length[2]|max_length[30]'
        ],
        'usr_password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[6]|max_length[30]|validateUser[email,password]'
        ]
    ];
    public $validOffer = [
        'of_creatorUserId' => [
            'required'
        ],
        'of_targetUserId' => [
            'required'
        ],
        'of_description' => [
            'max_length[255]'
        ],

    ];
    public $validBookNew = [
        'bk_title' => [
            'label' => 'bk_title',
            'rules' => 'required'
        ],
        'bk_authorId' => [
            'label' => 'bk_authorId',
            'rules' => 'required'
        ]
    ];
}
