<?php namespace App\Controllers;
use App\Models\RegisterModel;
use CodeIgniter\Database\Query;


class Post extends BaseController
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

    }



    
    public function postlist()
	{
        $this->session = \Config\Services::session();
        $pager = \Config\Services::pager();
		$postModel = new \App\Models\PostModel();

        $data = [
            'post' => $postModel->paginate(10),
            'pager' => $postModel->pager
        ];
        if(!($this->session->has('userID'))){
            return redirect()->to('/');
        }
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
        $this->viewRender('postlist',$data);

    }

    public function updatepost($id = null) 
    {
        if (!($this->session->has('userID'))) {
            return redirect()->to('/');
        }
        $builder = $this->db->table('post_details A');
        $builder->where('A.id', $id);
        $builder->select('A.*');
        $result = $builder->get();
        // print_r(count($result->getResult()));die();
        if (count($result->getResult()) === 1) {   
            $data = [
                    'bannerHeader' => $result->getResult()[0]->bannerHeader,
                    'bannerSubHeader'  => $result->getResult()[0]->bannerSubHeader,
                    'bodyFrstBlockQuote'  => $result->getResult()[0]->bodyFrstBlockQuote,
                    'bodyFrstHeading'  => $result->getResult()[0]->bodyFrstHeading,
                    'bodyScndHeading'  => $result->getResult()[0]->bodyScndHeading,
                    'bodyImgCaption'  => $result->getResult()[0]->bodyImgCaption,
                    'bodyFrstPara'  => $result->getResult()[0]->bodyFrstPara,
                    'bodyScndPara'  => $result->getResult()[0]->bodyScndPara,
                    'bannerimage'  => $result->getResult()[0]->bannerimage,
                    'bodyimage'  => $result->getResult()[0]->bodyimage,
                    'postid'  => $result->getResult()[0]->id
                    
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
            // $data['postid'] = $this->session->get('id');
            return $this->viewRender('post',$data);

        }



    }

    

    public function index()
	{
        $this->session = \Config\Services::session();
        if(!($this->session->has('userID'))){
            return redirect()->to('/');
        }
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
        $this->viewRender('post',$data);

    }
    public function edit($id = null){
        $this->session = \Config\Services::session();
        // A few settings
        $bannerimage = null;
        $bodyimage   = null;
        // Grab the file by name given in HTML form
        if ( isset($files['bannerimage']) )
        {
            if ( !$files['bannerimage']->isValid() )
            {
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'false');
                $this->session->setFlashdata('signedIn', NULL);
                $this->session->setFlashdata('Errormsg', $files['bannerimage']->getErrorString().'('.$files['bannerimage']->getError().')');
                // return redirect()->route('updatePost/ '.$id.' ');
                return redirect()->back()->withInput();

            }
            // A few settings
            $banner = $files['bannerimage'];
            $tempbanner = $banner->getTempName();
            $typebanner = $banner->getExtension();
            //   // Convert to base64 
            $tempbannerbase64 = base64_encode(file_get_contents($tempbanner) );
            $bannerimage = 'data:image/'.$typebanner.';base64,'.$tempbannerbase64;
        }
        if ( isset($files['bodyimage']) )
        {
            if ( !$files['bodyimage']->isValid())
            {
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'false');
                $this->session->setFlashdata('signedIn', NULL);
                $this->session->setFlashdata('Errormsg', $files['bodyimage']->getErrorString().'('.$files['bodyimage']->getError().')');
                // return redirect()->route('updatePost/ '.$id.' ');
                return redirect()->back()->withInput();
            } 
            // A few settings
            $body = $files['bodyimage'];
            $tempbody = $body->getTempName();
            $typebody = $body->getExtension();
            //   // Convert to base64 
            $tempbodybase64 = base64_encode(file_get_contents($tempbody) );
            $bodyimage = 'data:image/'.$typebody.';base64,'.$tempbodybase64;
        }
        
        
        
        $builder = $this->db->table('post_details');
        
        $data = [
            'user_id' => $this->session->get('userID'),
            'bannerHeader' => $this->request->getPost()['bannerHeader'],
            'bannerSubHeader'  => $this->request->getPost()['bannerSubHeader'],
            // 'bannermeta'  => $this->request->getPost()['bannermeta'],
            'bodyFrstHeading'  => $this->request->getPost()['bodyFrstHeading'],
            'bodyFrstBlockQuote'  =>$this->request->getPost()['bodyFrstBlockQuote'],
            'bodyScndHeading'  => $this->request->getPost()['bodyScndHeading'],
            'bodyImgCaption'  => $this->request->getPost()['bodyImgCaption'],
            'bodyFrstPara'  => $this->request->getPost()['bodyFrstPara'],
            'bodyScndPara'  => $this->request->getPost()['bodyScndPara']
        ];
        if($bannerimage != null){
            $data['bannerimage'] = $bannerimage;
        }
        if($bodyimage != null){
            $data['bodyimage'] = $bodyimage;
        }
        $this->validation->run($data, 'editpost');
        $errors = $this->validation->getErrors();
        if(count($errors) > 0){
            $value = empty($errors) ? 'No Error' : reset($errors);
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'false');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', $value);
            // return redirect()->route('updatePost/ '.$id.' ');
            return redirect()->back()->withInput();
        }
        $result = $builder->update($data,['WHERE id = ' . $id]);//$this->request->getPost()['id']
        if ($result === false)
        {   
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'true');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', 'Update Failed!');
            // return redirect()->route('updatePost/ '.$id.' ');
            return redirect()->back()->withInput();
        }
        else
        {
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'false');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', 'Update Successful!');
            // return redirect()->route('updatePost/ '.$id.' ');
            // return redirect()->back()->withInput();
            return redirect()->route('postList');

            
        }

    }
    public function store(){
        $this->session = \Config\Services::session();
        $files = $this->request->getFiles();
        
        $bannerimage = null;
        $bodyimage   = null;
        // Grab the file by name given in HTML form
        if ( isset($files['bannerimage']) )
        {
            if ( !$files['bannerimage']->isValid() )
            {
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'false');
                $this->session->setFlashdata('signedIn', NULL);
                $this->session->setFlashdata('Errormsg', $files['bannerimage']->getErrorString().'('.$files['bannerimage']->getError().')');
                return redirect()->route('postNew');
            }
            // A few settings
            $banner = $files['bannerimage'];
            $tempbanner = $banner->getTempName();
            $typebanner = $banner->getExtension();
            //   // Convert to base64 
            $tempbannerbase64 = base64_encode(file_get_contents($tempbanner) );
            $bannerimage = 'data:image/'.$typebanner.';base64,'.$tempbannerbase64;
        }
        if ( isset($files['bodyimage']) )
        {
            if ( !$files['bodyimage']->isValid())
            {
                $this->session->setFlashdata('showError', 'true');
                $this->session->setFlashdata('error', 'false');
                $this->session->setFlashdata('signedIn', NULL);
                $this->session->setFlashdata('Errormsg', $files['bodyimage']->getErrorString().'('.$files['bodyimage']->getError().')');
                return redirect()->route('postNew');
            } 
            // A few settings
            $body = $files['bodyimage'];
            $tempbody = $body->getTempName();
            $typebody = $body->getExtension();
            //   // Convert to base64 
            $tempbodybase64 = base64_encode(file_get_contents($tempbody) );
            $bodyimage = 'data:image/'.$typebody.';base64,'.$tempbodybase64;
        } 
            
            
        
        
        $builder = $this->db->table('post_details');
        
        $data = [
            'user_id' => $this->session->get('userID'),
            'bannerHeader' => isset($this->request->getPost()['bannerHeader']) ? $this->request->getPost()['bannerHeader'] : NULL,
            'bannerSubHeader'  => isset($this->request->getPost()['bannerSubHeader']) ? $this->request->getPost()['bannerSubHeader'] : NULL,
            'bodyFrstHeading'  => isset($this->request->getPost()['bodyFrstHeading']) ? $this->request->getPost()['bodyFrstHeading'] : NULL,
            'bodyFrstBlockQuote'  => isset($this->request->getPost()['bodyFrstBlockQuote']) ? $this->request->getPost()['bodyFrstBlockQuote'] : NULL,
            'bodyScndHeading'  => isset($this->request->getPost()['bodyScndHeading']) ? $this->request->getPost()['bodyScndHeading'] : NULL,
            'bodyImgCaption'  => isset($this->request->getPost()['bodyImgCaption']) ? $this->request->getPost()['bodyImgCaption'] : NULL,
            'bodyFrstPara'  => isset($this->request->getPost()['bodyFrstPara']) ? $this->request->getPost()['bodyFrstPara'] : NULL,
            'bodyScndPara'  => isset($this->request->getPost()['bodyScndPara']) ? $this->request->getPost()['bodyScndPara'] : NULL,
            'bannerimage'  => $bannerimage,
            'bodyimage'  => $bodyimage
        ];

        $this->validation->run($data, 'newpost');
        $errors = $this->validation->getErrors();
        if(count($errors) > 0){
            $value = empty($errors) ? 'No Error' : reset($errors);
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'false');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', $value);
            // return redirect()->route('updatePost/ '.$id.' ');
            return redirect()->back()->withInput();
        }
        $result = $builder->insert($data);
        if ($result === false)
        {   
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'true');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', 'Insert Failed!');
            return redirect()->route('postNew');

        }
        else
        {
            $this->session->setFlashdata('showError', 'true');
            $this->session->setFlashdata('error', 'false');
            $this->session->setFlashdata('signedIn', NULL);
            $this->session->setFlashdata('Errormsg', 'Insert Successful!');
            return redirect()->route('postNew');
        }

    }
    public function viewpost($id = null){
        $this->session = \Config\Services::session();
        // if(!($this->session->has('id'))){
        //     return redirect()->route('/');
        // }
        $builder = $this->db->table('post_details A');
        if($id != null){
            $builder->where('A.id', $id);
        }
        
        $builder->select('A.id,A.bannerHeader,A.bannerSubHeader,A.bodyFrstBlockQuote,A.bodyFrstHeading,A.bodyScndHeading,A.bodyImgCaption,
        A.bodyImgCaption,A.bodyFrstPara,A.bodyScndPara,A.bannerimage,A.bodyimage,A.dteCreatedDate,
        B.strFullName');
        $builder->join('users B', 'A.user_id = B.id','inner');
        $result = $builder->get();
        // print_r($this->db->getLastQuery());die();
        // print_r(($result->getResult()));die();
        if (count($result->getResult()) === 1)
        {   
            $data = [
                    'bannerHeader' => $result->getResult()[0]->bannerHeader,
                    'bannerSubHeader'  => $result->getResult()[0]->bannerSubHeader,
                    'bodyFrstBlockQuote'  => $result->getResult()[0]->bodyFrstBlockQuote,
                    'bodyFrstHeading'  => $result->getResult()[0]->bodyFrstHeading,
                    'bodyScndHeading'  => $result->getResult()[0]->bodyScndHeading,
                    'bodyImgCaption'  => $result->getResult()[0]->bodyImgCaption,
                    'bodyFrstPara'  => $result->getResult()[0]->bodyFrstPara,
                    'bodyScndPara'  => $result->getResult()[0]->bodyScndPara,
                    'bannerimage'  => $result->getResult()[0]->bannerimage,
                    'bodyimage'  => $result->getResult()[0]->bodyimage,
                    'strFullName'  => $result->getResult()[0]->strFullName,
                    'dteCreatedDate'  => $result->getResult()[0]->dteCreatedDate,
                    'postid'  => $result->getResult()[0]->id
                    
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
            return $this->viewRender('viewpost',$data);

        }else
        {
            return json_encode(array('errstatus' => 'true' , 'msg' => 'Error Occured!'));
        }
    }
    public function getAllPost(){
        $this->session = \Config\Services::session();
        $user_id  = $this->session->get('userID');
        $builder = $this->db->table('post_details');
        $builder->where('user_id', $user_id);
        $builder->select('id,bannerHeader,dteCreatedDate');
        $result = $builder->get();
        // print_r($this->db->getLastQuery());die();

        if (count($result->getResult()) > 0)
        {   
            return json_encode($result->getResult());

            // foreach($result->getResult() AS $key => $value){
			// 	$data[$key] = array(
			// 		'bannerHeader' =>  $value->bannerHeader,
			// 		'dteCreatedDate'  =>  $value->dteCreatedDate
			// 	);
            // };
            
            // return $data;
        }else
        {
            return json_encode(array('errstatus' => 'true' , 'msg' => 'No post!'));
        }
    }
	public function retrieve(){
        $builder = $this->db->table('post_details');

        // $builder->where('user_id', $user_id);
        $builder->select('*');
        
        $result = $builder->get();

        if (count($result->getResult()) === 1)
        {   
            $data = [
                    'bannerHeader' =>  $result->getResult()[0]->bannerHeader,
                    'bannerSubHeader'  =>  $result->getResult()[0]->bannerSubHeader,
                    // 'bannermeta'  =>  $result->getResult()[0]->bannermeta,
                    
            ];
        }else
        {
            return json_encode(array('errstatus' => 'true' , 'msg' => 'No post!'));
        }

    }
    

    //--------------------------------------------------------------------
    
    private function viewRender($view,$data){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
    }
    

}
