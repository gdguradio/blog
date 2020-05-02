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
        $user_id  = $this->session->get('id');
		$postModel = new \App\Models\PostModel();
		$postModel->create_view();
		$pager = \Config\Services::pager();
        $data = [
            'post' => $postModel->paginate(2,'post'),
            'pager' => $postModel->pager
        ];
		$data['name'] = $this->session->get('name');
		$data['email'] = $this->session->get('email');
		$data['role'] = $this->session->get('role');
		$data['userID'] = $this->session->get('userID');
		if($this->session->get('userID') != null){
			$data['showError'] = $this->session->get('showError');
			$data['signedIn'] = $this->session->get('signedIn');
		}else{
			$data['showError'] = null;
			$data['signedIn'] = null;
		}
		
		// $data['showError'] = null;

		$this->viewRender('home',$data);

	}

	//--------------------------------------------------------------------
	private function viewRender($view = null,$data = array()){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
	}
}
