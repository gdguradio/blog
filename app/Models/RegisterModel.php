<?php namespace App\Models;

use CodeIgniter\Model;
use \CodeIgniter\Database\ConnectionInterface;

class RegisterModel extends Model
{

    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['name'];
    //true value will look for deleted_at column add later 
    //when using $postModel = new \App\Models\PostModel();
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;
    protected $createdField  = 'dteCreatedDate';
    protected $updatedField  = 'dteUpdatedDate';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public function hashPassword($data)
    {
        $hashed;
        if (! isset($data)) return $data;

        $hashed = password_hash($data, PASSWORD_DEFAULT);

        return $hashed;
    }
}