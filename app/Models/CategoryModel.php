<?php

namespace App\Models;

use App\Entities\Category;
use App\Entities\User;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'tbl_category';
    protected $primaryKey = 'cat_id';
    protected $allowedFields= [
        'cat_name',
        'cat_parentId',
    ];

    protected $validationRules = [
        'cat_name' => 'required|is_unique[tbl_category.cat_name]',
    ];
    protected $skipValidation= false;
    protected $allowCallbacks = true;
    protected $returnType    = Category::class;
    protected $useTimestamps = true;
    protected $createdField = 'category_created_at';
    protected $updatedField = 'category_updated_at';
}