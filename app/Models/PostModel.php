<?php namespace App\Models;

use CodeIgniter\Model;
use \CodeIgniter\Database\ConnectionInterface;

class PostModel extends Model
{

    // protected $table      = 'post_details';
    protected $table      = 'table_view';
    protected $db;

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
    

    /**
     * Only need to create the View so the pagination can access it via
     * $this->table (protected $table = 'table_view')
     */
    public function create_view() {
        $this->db = \Config\Database::connect();

        $sql = "CREATE OR REPLACE VIEW table_view AS ";
        // Whatever your SQL needs to be goes here
        $sql .= "SELECT A.id,A.bannerHeader,A.bannerSubHeader,A.dteCreatedDate,B.strFullName FROM post_details A 
            JOIN users B on A.user_id = B.id ORDER BY A.dteCreatedDate DESC";
        // echo $sql;
        $query = $this->db->query($sql);
    }
}