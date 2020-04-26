<?php namespace App\Models;

use CodeIgniter\Model;
use \CodeIgniter\Database\ConnectionInterface;

class PostModel extends Model
{

    protected $table      = 'post_details';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    //true value will look for deleted_at column add later 
    //when using $postModel = new \App\Models\PostModel();
    protected $useSoftDeletes = false;

    protected $allowedFields = ['bannerHeader'];

    protected $useTimestamps = false;
    protected $createdField  = 'dteCreatedDate';
    protected $updatedField  = 'dteUpdatedDate';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    

}