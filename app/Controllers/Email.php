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
                echo 'asd';
        }
        else{
            echo '123';

        }
    }
    //--------------------------------------------------------------------
    public function email(){
        

    $host = 'ssl://smtp.gmail.com';
    $port = '465';
    $user = 'test6sample3@gmail.com';
    $pass = 'qwe1asd2zxc3';
    $rcpt = $user;
    $subj = 'Web Form';
    $body = '';
    $status = false;

    $body = wordwrap(stripslashes($body), 70, "\r\n");

    if (($fp = @fsockopen($host, $port)) !== FALSE && substr(fgets($fp, 1024), 0, 3) != '220') {
        $status = 'CONNECTION FAIL';
    } else {
        fputs($fp, "HELO $user\r\n");
        if (substr(fgets($fp, 1024), 0, 3) != '250') {
            $status = 'HELO FAIL';
        } else {
            fputs($fp, "AUTH LOGIN\r\n");
            if (substr(fgets($fp, 1024), 0, 3) != '334') {
                $status = 'AUTH LOGIN FAIL';
            } else {
                fputs($fp, base64_encode($user) . "\r\n");
                if (substr(fgets($fp, 1024), 0, 3) != '334') {
                    $status = 'AUTH USER FAIL';
                } else {
                    fputs($fp, base64_encode($pass) . "\r\n");
                    if (substr(fgets($fp, 1024), 0, 3) != '235') {
                        $status = 'AUTH PASS FAIL';
                    } else {
                        fputs($fp, "MAIL FROM: <$user>\r\n");
                        if (substr(fgets($fp, 1024), 0, 3) != '250') {
                            $status = 'MAIL FROM FAIL';
                        } else {
                            fputs($fp, "RCPT TO: <$rcpt>\r\n");
                            if (substr(fgets($fp, 1024), 0, 3) != '250') {
                                $status = 'RCPT TO FAIL';
                            } else {
                                fputs($fp, "DATA\r\n");
                                if (substr(fgets($fp, 1024), 0, 3) != '354') {
                                     $status = 'DATA FAIL';
                                } else {
                                    fputs($fp, "To: $rcpt\r\nSubject: $subj\r\n\r\n$body\r\n.\r\n");
                                    if (substr(fgets($fp, 1024), 0, 3) != '250') {
                                        $status = 'BODY FAIL';
                                    } else {
                                        fputs($fp, "QUIT \r\n");
                                        if (substr(fgets($fp, 1024), 0, 3) != '221') {
                                            $status = 'QUIT FAIL';
                                        } else {
                                            $status = true;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        fclose($fp);
    }

    if ($status === true) {
        echo 'Your data was sent successfully.';
    } else {
        echo 'There was an error submitting your data (' . $status . ').';
    }


         
    }
    private function viewRender($view,$data){
		echo view('layout/header',$data);
		echo view($view);
		echo view('layout/footer');
    }
    

}




