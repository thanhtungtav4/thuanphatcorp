<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_login' , "LOGIN" , TRUE); 
        
        
    }
	public function index()
	{
        
        $data_post = $this->input->post();
        if($data_post) {
            
            $where['user'] = $_POST['user'];
            $where['pass'] = $_POST['pass'];
            $where['status'] = 1;
            $row= $this->LOGIN->getList($where); 
            if($row) {	 
                $userdata = array(
                    'admin_user_id'=> $row[0]->id,
                    'user_name'=> $row[0]->user, 
                    'isLoggedInAdminDemo'=> TRUE  );
                $this->session->set_userdata($userdata);  
                // Tro ve trang admin 
                redirect(base_url()."category", 'refresh');
            }else{ 					 
               // Refest lai trang login
                redirect(base_url() . "login", 'refresh');
            }
				 
		 
		} 
        $this->load->view('login'  ); 
         
	}
    public function login111(){
        $userdata = array(
                    'admin_user_id'=> 1,
                    'user_name'=> 123123123, 
                    'isLoggedInAdminDemo'=> TRUE  );
                $this->session->set_userdata($userdata);  
    }
    
    public function logout() {
		
                $userdata = array('id'=> "",
                                  'user' => "", 
				  'pass'=> "" ,
                                  'isLoggedInAdminDemo'=> false);
                               
		$this->session->unset_userdata($userdata); 
                redirect( base_url()."login" , 'refresh');
	}
        
}
 