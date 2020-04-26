<?php namespace App\Controllers;
use CodeIgniter\Database\Query;
use App\Models\PostModel;

class Home extends BaseController
{
	protected $session = null; // use protected instead as recommended
	protected $db = null; // use protected instead as recommended

    public function __construct() {
		$this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();

    }
	public function index()
	{
		$builder = $this->db->table('post_details A');
        $builder->select('A.id,A.bannerHeader,A.bannerSubHeader,A.dteCreatedDate,B.strFullName');
		$builder->join('users B', 'A.user_id = B.id','inner');
		$builder->orderBy('A.dteCreatedDate', 'DESC');

        $result = $builder->get();
        $user_id  = $this->session->get('id');

        // $builder->where('user_id', $user_id);
        // $builder->select('*');
        // print_r($this->db->getLastQuery());die();

        // $result = $builder->get();
        // if (count($result->getResult()) > 0)
        // {   
		// 	foreach($result->getResult() AS $key => $value){
		// 		$data['post'][$key] = array(
		// 			'bannerHeader' =>  $value->bannerHeader,
		// 			'bannerSubHeader'  =>  $value->bannerSubHeader,
		// 			'strFullName'  =>  $value->strFullName,
		// 			'dteCreatedDate'  =>  $value->dteCreatedDate,
		// 			// 'bannermeta'  =>  $value->bannermeta,
		// 			'user_id'  =>  $value->user_id,
		// 			'postid'  =>  $value->id,
		// 		);
		// 	};

            
        // }else
        // {
        //     return json_encode(array('errstatus' => 'true' , 'msg' => 'No Post!'));
		// }
		$postModel = new \App\Models\PostModel();
		$postModel->create_view();
		$pager = \Config\Services::pager();
		// $post = $postModel->orderBy('dteCreatedDate', 'DESC')
		// 		   ->findAll();
        $data = [
            'post' => $postModel->paginate(2,'post'),
            'pager' => $postModel->pager
        ];
		



		$data['name'] = $this->session->get('name');
		$data['email'] = $this->session->get('email');
		$data['role'] = $this->session->get('role');
		
		$this->viewRender('home',$data);

	}

	//--------------------------------------------------------------------
	private function viewRender($view = null,$data = array()){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
	}
}
