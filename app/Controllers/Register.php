<?php namespace App\Controllers;
use App\Models\RegisterModel;
use CodeIgniter\Database\Query;
use App\Controllers\Email;


class Register extends BaseController
{
    protected $session = null; // use protected instead as recommended
    protected $validation = null; // use protected instead as recommended
    protected $db = null; // use protected instead as recommended
    protected $request = null; // use protected instead as recommended

    public function __construct() {
        $this->validation =  \Config\Services::validation();
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        // $this->load->library('../controllers/whathever');

    }



    function removeElementWithValue($array, $key, $value){
        foreach($array as $subKey => $subArray){
             if($subArray[$key] == $value){
                  unset($array[$subKey]);
             }
        }
        return $array;
   }
    public function index()
	{
        $this->session = \Config\Services::session();
        if(!($this->session->has('userID'))){
            return redirect()->to('/');
        }

        $pager = \Config\Services::pager();
        $registerModel = new \App\Models\RegisterModel();
        $registerModel->create_view_user();
        $data = [
            'users' => $registerModel->paginate(10),
            'pager' => $registerModel->pager
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
        $this->viewRender('newregister',$data);

    }
    public function show(){
        $registerModel = new RegisterModel;
        $builder = $this->db->table('users A');
        $strUserName  = $this->request->getPost()['strUserName'];
        $strPassWord = password_hash(ltrim(rtrim($this->request->getPost()['strPassWord'])), PASSWORD_DEFAULT);
        $builder->where('strUserName', $strUserName);
        $builder->where('bitActiveFlag', 1);
        $builder->where('bitDeleteFlag', 0);
        $builder->select('A.*,C.strRoleName,C.strRoleAccess');
        $builder->join('user_role B', 'A.id = B.user_id','inner');
        $builder->join('roles C', 'B.role_id = C.id','inner');

        $result = $builder->get();
        // print_r($builder->get()->getResult());
        if (count($result->getResult()) === 1)
        {   
            $name  = $result->getResult()[0]->strFullName;
            $email  = $result->getResult()[0]->strEmail;
            $role  = $result->getResult()[0]->strRoleName;
            $access  = $result->getResult()[0]->strRoleAccess;
            $userID  = $result->getResult()[0]->id;
            if(password_verify($this->request->getPost()['strPassWord'], $result->getResult()[0]->strPassWord))
            {
                // $this->session = \Config\Services::session();
                

                $userdata = [
                        'name'  => $name,
                        'email'  => $email,
                        'role'  => $role,
                        'access'  => $access,
                        'userID'  => $userID,
                        'showError' => 'false',
                        'signedIn'  => 'true'
                ];
                $this->session->set($userdata);
                $this->session->setFlashdata('showError', 'false');
                $this->session->setFlashdata('signedIn', 'true');

            }else
            {
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('signedIn', 'false');
                $this->session->setFlashdata('usedForm', 'login');
                $this->session->setFlashdata('Errormsg', 'Incorrect Password!');
                // return redirect()->route('home');

            }
            
        }else
        {
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('signedIn', 'false');
                $this->session->setFlashdata('usedForm', 'login');
                $this->session->setFlashdata('Errormsg', 'Username Does not exists!');
                // return redirect()->route('home');

        }
        return redirect()->route('home');
    }
    public function store()
    {
        $registerModel = new RegisterModel;
        
        // $this->session = \Config\Services::session();
        
        $builder = $this->db->table('users');

        

        $data = [
            'strEmail' => $this->request->getPost()['strEmail'],
            'strFullName'  => $this->request->getPost()['strFullName'],
            'strUserName'  => $this->request->getPost()['strUserName'],
            'intAge'  => $this->request->getPost()['intAge'],
            'strPassWord'  => $this->request->getPost()['strPassWord'],
        ];
        $this->validation->run($data, 'signup');
        $errors = $this->validation->getErrors();
        if(count($errors) > 0){
            $value = empty($errors) ? 'No Error' : reset($errors);
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'false');
            $this->session->setFlashdata('usedForm', 'register');
            $this->session->setFlashdata('Errormsg', $value);
            // return redirect()->route('updatePost/ '.$id.' ');
            return redirect()->back()->withInput();
        }
        $data['strPassWord'] = password_hash(ltrim(rtrim($this->request->getPost()['strPassWord'])), PASSWORD_DEFAULT);
        $result = $builder->insert($data);
        if ($result === false)
        {   
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'false');
            $this->session->setFlashdata('usedForm', 'register');
            $this->session->setFlashdata('Errormsg', 'Insert Failed!');
            // return json_encode(array('errstatus' => 'true' , 'msg' => 'Insert Failed!'));
        }else
        {
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'false');
            $this->session->setFlashdata('usedForm', 'register');
            $this->session->setFlashdata('Errormsg', 'Insert Failed!');
            // return json_encode(array('errstatus' => 'false' , 'msg' => 'Insert Successful!'));
        }
        return redirect()->route('home');

    }




    public function logout(){
        // session_destroy();
        $this->session->destroy();
        // $this->session->stop();

        return redirect()->to('/');
    }
	
    public function deleteuser($user_id){

        $updaterole = "update users set bitDeleteFlag = 1 where id = :user_id:";
        $resultupdaterole = $this->db->query($updaterole, [
                'user_id'     => $user_id
        ]);

        // print_r($this->db->error());die();
        if($this->db->error()['code'] == '0')
        {
            $this->db->transRollback();
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'false');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', 'Successfully Deleted!');
        }
        else
        {
            $this->db->transCommit();
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'true');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', 'Something went wrong!');
        }
        return redirect()->route('users');

    }
    public function updaterole($role_id,$user_id){


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
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'true');
                $this->session->setFlashdata('signedIn', NULL);
                $this->session->setFlashdata('Errormsg', 'Something went wrong!');
        }
        else
        {
                $this->db->transCommit();
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'false');
                $this->session->setFlashdata('signedIn', NULL);
                $this->session->setFlashdata('Errormsg', 'Successfully Confirmed account!');

        }
        return redirect()->route('users');

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
    public function changePassword(){
        $request = \Config\Services::request();
        $id = $request->getPost()['id'];
        $npassword = $request->getPost()['npassword'];
        $cpassword = $request->getPost()['cpassword'];


        $data = [
            'npassword' => $this->request->getPost()['npassword'],
            'cpassword'  => $this->request->getPost()['cpassword'],
            
        ];
        $this->validation->run($data, 'changepassword');
        $errors = $this->validation->getErrors();
        if(count($errors) > 0){
            $value = empty($errors) ? 'No Error' : reset($errors);
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'true');
            $this->session->setFlashdata('usedForm', 'change');
            $this->session->setFlashdata('Errormsg', $value);
            // return redirect()->route('updatePost/ '.$id.' ');
            return redirect()->back()->withInput();
        }
        $hashpassword = password_hash(ltrim(rtrim($cpassword)), PASSWORD_DEFAULT);
        $updatedata = ['strPassWord' => $hashpassword];
        $builder = $this->db->table('users');
        $result = $builder->update($updatedata,['WHERE id = ' . $id]);
        if ($result === false)
        {   
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'true');
            $this->session->setFlashdata('usedForm', 'change');
            $this->session->setFlashdata('Errormsg', 'Change Password Failed!');
        }else
        {
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'true');
            $this->session->setFlashdata('usedForm', 'change');
            $this->session->setFlashdata('Errormsg', 'Change Password Successful!');
        }
    }
    public function lostPassword(){

        $Email = new Email;
        $registerModel = new RegisterModel;
        // $request = \Config\Services::request();
        $strEmail = $this->request->getPost()['strEmail'];

        $data = ['strEmail' => $strEmail];
        $this->validation->run($data, 'email');
        $errors = $this->validation->getErrors();
        if(count($errors) > 0){
            $value = empty($errors) ? 'No Error' : reset($errors);
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('signedIn', 'false');
            $this->session->setFlashdata('usedForm', 'lost');
            $this->session->setFlashdata('Errormsg', $value);
            // return redirect()->route('updatePost/ '.$id.' ');
            return redirect()->back()->withInput();
        }
        $builder = $this->db->table('users A');

        $builder->where('strEmail', $strEmail);
        $builder->where('bitActiveFlag', 1);
        $builder->where('bitDeleteFlag', 0);
        $builder->select('strFullName,strUserName,strRoleName');
        $builder->join('user_role B', 'A.id = B.user_id','inner');
        $builder->join('roles C', 'B.role_id = C.id','inner');
        


        $result = $builder->get();
        

        if (count($result->getResult()) === 1) {   
            $name = $result->getResult()[0]->strFullName;
            $user = $result->getResult()[0]->strUserName;
            $role = $result->getResult()[0]->strRoleName;

            $this->db->transBegin();
            
            $newpassword = $registerModel->random_password(6);
            $hashpassword = password_hash(ltrim(rtrim($newpassword)), PASSWORD_DEFAULT);
            $updateemail = "update users set strPassWord = '".$hashpassword."' where strEmail = :strEmail:";
            
            $this->db->query($updateemail, [
                    'strEmail'     => $strEmail
            ]);
            
            if ($this->db->transStatus() === FALSE) {
                $this->db->transRollback();
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'true');
                $this->session->setFlashdata('signedIn', 'false');
                $this->session->setFlashdata('usedForm', 'lost');
                $this->session->setFlashdata('Errormsg', 'Something went wrong!');
            } else {
                $resultemail = $Email->htmlmail($user,$name,$strEmail,$role,$newpassword,'Password Reset');
                if ($resultemail['errstatus'] == 'false') {
                    $this->db->transCommit();
                    $this->session->setFlashdata('showError', 'true');
                    $this->session->setFlashdata('error', 'false');
                    $this->session->setFlashdata('signedIn', 'false');
                    $this->session->setFlashdata('usedForm', 'lost');
                    $this->session->setFlashdata('Errormsg', 'Successfully reset password. New password sent to email');
                } else {
                    $this->db->transRollback();
                    $this->session->setFlashdata('showError', 'true');
                    $this->session->setFlashdata('error', 'true');
                    $this->session->setFlashdata('signedIn', 'false');
                    $this->session->setFlashdata('usedForm', 'lost');
                    $this->session->setFlashdata('Errormsg', 'Email Sending Failed!');
                }   
            }
            
        }else {
            $this->db->transRollback();
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'true');
            $this->session->setFlashdata('signedIn', 'false');
            $this->session->setFlashdata('usedForm', 'lost');
            $this->session->setFlashdata('Errormsg', 'Email not registered!');
        }   
        return redirect()->back()->withInput();
    }
    

    //--------------------------------------------------------------------
    
    private function viewRender($view,$data){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
    }
    

}
