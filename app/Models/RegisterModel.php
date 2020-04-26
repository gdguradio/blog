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

    public function random_password(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}