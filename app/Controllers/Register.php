<?php namespace App\Controllers;
use App\Models\RegisterModel;
use CodeIgniter\Database\Query;


class Register extends BaseController
{
    protected $session = null; // use protected instead as recommended
    protected $validation = null; // use protected instead as recommended
    protected $db = null; // use protected instead as recommended
    public function __construct() {
        $this->validation =  \Config\Services::validation();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        
    }




    public function index()
	{
        $this->session = \Config\Services::session();
        if(!($this->session->has('id'))){
            return redirect()->route('/');
        }
		$data['name'] = $this->session->get('name');
		$data['email'] = $this->session->get('email');
		$data['role'] = $this->session->get('role');
        $this->viewRender('newregister',$data);

	}
    public function logout(){
        // session_destroy();
        $this->session->destroy();
        // $this->session->stop();

        return redirect()->to('/');
    }
	public function retrieve(){
        $registerModel = new RegisterModel;
        $builder = $this->db->table('users A');
        $strUserName  = $_POST['strUserName'];
        $strPassWord = password_hash(ltrim(rtrim($_POST['strPassWord'])), PASSWORD_DEFAULT);//$registerModel->hashPassword(ltrim(rtrim($_POST['strPassWord'])));
        // $result = $builder->insert($data);

        $builder->where('strUserName', $strUserName);
        $builder->where('bitActiveFlag', 1);
        $builder->where('bitDeleteFlag', 0);
        // $builder->where('strPassWord', $strPassWord);
        $builder->select('A.*,C.strRoleName,C.strRoleAccess');
        $builder->join('user_role B', 'A.id = B.user_id','inner');
        $builder->join('roles C', 'B.role_id = C.id','inner');

        // $builder->join('comments', 'comments.id = blogs.id');
        $result = $builder->get();
        // print_r($this->db->getLastQuery());die();
        // $query = $this->db->getLastQuery();
        // if ($user && password_verify($_POST['strPassWord'], $result->getResult()[0]->strPassWord))
        // {
        //     echo "valid!";
        // } else {
        //     echo "invalid";
        // }
        if (count($result->getResult()) === 1)
        {   
            if(password_verify($_POST['strPassWord'], $result->getResult()[0]->strPassWord))
            {
                // return redirect()->to('/home');
                $this->session = \Config\Services::session();
                $userdata = [
                        'name'  => $result->getResult()[0]->strFullName,
                        'email'  => $result->getResult()[0]->strEmail,
                        'role'  => $result->getResult()[0]->strRoleName,
                        'access'  => $result->getResult()[0]->strRoleAccess,
                        'id'  => $result->getResult()[0]->id
                ];
                $this->session->set($userdata);
                
                return json_encode(array('errstatus' => 'false' , 'msg' => 'Logged in Successfully!' , 
                                    'name' => $result->getResult()[0]->strFullName, 
                                    'email' => $result->getResult()[0]->strEmail, 
                                    'role' => $result->getResult()[0]->strRoleName
                                ));

            }else
            {
                return json_encode(array('errstatus' => 'true' , 'msg' => 'Incorrect Password!'));
            }
            
        }else
        {
            return json_encode(array('errstatus' => 'true' , 'msg' => 'Username Does not exists!'));
        }

    }
    public function deleteuser(){

        $user_id = $_POST['user_id'];
        $updaterole = "update users set bitDeleteFlag = 1 where id = :user_id:";
        $resultupdaterole = $this->db->query($updaterole, [
                'user_id'     => $user_id
        ]);

        // print_r($this->db->error());die();
        if($this->db->error()['code'] == '0')
        {
            return json_encode(array('errstatus' => 'false' , 'msg' => 'Successfully Deleted!','id' => $user_id)); 

        }else
        {
            return json_encode(array('errstatus' => 'true' , 'msg' => 'Something went wrong!','id' => $user_id)); 

        }


    }
    public function updaterole(){

        $user_id = $_POST['user_id'];
        $role_id = $_POST['role_id'];


        $this->db->transBegin();

        $insertrole = "insert into user_role (user_id,role_id) VALUES (:user_id:,:role_id:)";
        $resultinsertrole = $this->db->query($insertrole, [
                'user_id'     => $user_id,
                'role_id' => $role_id
        ]);
        $updaterole = "update users set bitActiveFlag = 1 where id = :user_id:";
        $resultupdaterole = $this->db->query($updaterole, [
                'user_id'     => $user_id
        ]);

        if ($this->db->transStatus() === FALSE)
        {
                $this->db->transRollback();
                return json_encode(array('errstatus' => 'true' , 'msg' => 'Something went wrong!','id' => $user_id)); 
        }
        else
        {
                $this->db->transCommit();
                return json_encode(array('errstatus' => 'false' , 'msg' => 'Successfully Confirmed account!','id' => $user_id)); 

        }
        
    }
    public function getAllRequest(){
        $registerModel = new RegisterModel;
        $builder = $this->db->table('users A');
        $builder->where('bitActiveFlag', 0);
        $builder->where('bitDeleteFlag', 0);
        // $builder->where('strPassWord', $strPassWord);
        $builder->select('id,strFullName,strEmail,intAge,strUserName');
        // $builder->join('user_role B', 'A.id = B.user_id','inner');
        // $builder->join('roles C', 'B.role_id = C.id','inner');
        $result = $builder->get();
        if (count($result->getResult()) > 0)
        {   
            return json_encode($result->getResult());
        }else
        {
            return json_encode(array('errstatus' => 'true' , 'msg' => 'No new request!'));
        }
    }
    public function store(){//Request $request
        
        $registerModel = new RegisterModel;
        
        // $this->session = \Config\Services::session();
        
        $builder = $this->db->table('users');

        

        $data = [
            'strEmail' => $_POST['strEmail'],
            'strFullName'  => $_POST['strFullName'],
            'strUserName'  => $_POST['strUserName'],
            'intAge'  => $_POST['intAge'],
            'strPassWord'  => $_POST['strPassWord'],
        ];
        $this->validation->run($data, 'signup');
        $errors = $this->validation->getErrors();
        if(count($errors) > 0){
            // $errorstring = '<ol>';
            foreach($errors AS $key => $value){
                return json_encode(array('errstatus' => 'true' , 'msg' => $value));
                // $errorstring .= "<li>". $value . "</li>";
            }
            // $errorstring .= '</ol>';
            // // We pass (only) session data to the View
            // $this->session->setFlashdata('errmsg', json_encode(array('errstatus' => 'true' , 'msg' => $errorstring)));
            // $page['errmsg'] = $this->session->getFlashdata('errmsg');
            // return view('pages/register',$page);
            // return redirect()->to('/register');
            return json_encode(array('errstatus' => 'true' , 'msg' => $errors[0]));
        }
        $data['strPassWord'] = password_hash(ltrim(rtrim($_POST['strPassWord'])), PASSWORD_DEFAULT);//$registerModel->hashPassword(ltrim(rtrim($_POST['strPassWord'])));
        $result = $builder->insert($data);
        if ($result === false)
        {   
            // We set some data
            // $this->session->setFlashdata('errmsg', json_encode(array('errstatus' => 'true' , 'msg' => 'Insert Failed!')));
            // $this->session->errmsg = json_encode(array('errstatus' => 'true' , 'msg' => 'Insert Failed!'));

            // // We pass (only) session data to the View
            // // return view('pages/register', $this->session->get());
            // $page['errmsg'] = $this->session->getFlashdata('errmsg');
            // return view('pages/register',$page);
            return json_encode(array('errstatus' => 'true' , 'msg' => 'Insert Failed!'));
        }else
        {
            // We set some data
            // $this->session->errmsg = json_encode(array('errstatus' => 'false' , 'msg' => 'Insert Successful!'));
            // $this->session->setFlashdata('errmsg', json_encode(array('errstatus' => 'false' , 'msg' => 'Insert Successful!')));
            // // We pass (only) session data to the View
            // // return view('pages/register', $this->session->get());
            // $page['errmsg'] = $this->session->getFlashdata('errmsg');
            // return view('pages/register',$page);
            // return redirect()->to('/login');
            return json_encode(array('errstatus' => 'false' , 'msg' => 'Insert Successful!'));
        }
        // $request->validate([
        //     'name' => 'required|max:255',
        // ]);

        // $player = Player::create($request->all());

        // return (new PlayerResource($player))
        //         ->response()
        //         ->setStatusCode(201);
    }

    //--------------------------------------------------------------------
    
    private function viewRender($view,$data){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
    }
    

}
