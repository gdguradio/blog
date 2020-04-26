<?php namespace App\Controllers;
use App\Models\RegisterModel;
use CodeIgniter\Database\Query;


class Email extends BaseController
{
    protected $session = null; // use protected instead as recommended
    protected $validation = null; // use protected instead as recommended
    protected $db = null; // use protected instead as recommended
    public function __construct() {
        $this->validation =  \Config\Services::validation();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        
    }
    public function htmlmail(){

        $this->session = \Config\Services::session();
        if(!($this->session->has('id'))){
            return redirect()->route('/');
        }
        $email = \Config\Services::email();
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'ssl://smtp.gmail.com';
        $config['SMTPUser']  = 'test6sample3@gmail.com';
        $config['SMTPPass'] = 'qwe1asd2zxc3';
        $config['SMTPPort'] = '465';
        $config['mailType'] = 'html';

        $email->initialize($config);
        $email->setFrom('test6sample3@gmail.com', 'Your Name');
        $email->setTo('gdguradio@gmail.com');
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');
        $data = array(
            'name'  => 'Martin'
        );
        $email->setSubject('Email Test');
        $mesg = view('emails/email',$data, ['cache' => 60, 'cache_name' => 'my_cached_view']);

        $email->setMessage($mesg);

        $email->send();
    
        // $body = $view('emails/email.php',$data,TRUE);
    
        // $email->setMessage($body); 
        if (! $email->send())
        {
                // Generate error
            return json_encode(array('errstatus' => 'true' , 'msg' => 'Email Sending Failed!'));
        }else
        {
            
            return json_encode(array('errstatus' => 'false' , 'msg' => 'Email Sending Successful!'));

        }
    }
    //--------------------------------------------------------------------
    
    private function viewRender($view,$data){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
    }
    

}




