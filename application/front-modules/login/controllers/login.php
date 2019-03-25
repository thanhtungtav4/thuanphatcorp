<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_login' , "LOGIN" , TRUE);  
    }
	public function index()
	{
        $data['error'] = '';
        $data_post = $this->input->post();
        if($data_post) {
            
            $where['user'] = $_POST['user'];
            $where['pass'] = $_POST['pass'];
            $where['status'] = 1;
            $row= $this->LOGIN->getList($where); 
            if($row) {	 
                $userdata = array(
                    'userHome_id'=> $row[0]->id,
                    'userHome_name'=> $row[0]->user, 
                    'isLoggedInHomeDemo'=> TRUE  );
                $this->session->set_userdata($userdata);  
                // Tro ve trang admin 
                redirect(base_url()."category", 'refresh');
            }else{ 					 
               $data['error'] = 'Sai tên đăng nhập hoặc mật khẩu !!';
            }
				 
		 
		} 
        $data['breadcumb'] = '';
        $data['breadcumb'] .= '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb breadcrumb__t">';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
        $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.base_url().'">Trang chủ</a>';
        $data['breadcumb'] .= '</span>'; 
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="divider"></span>';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="active">Đăng nhập</span>';
        $data['breadcumb'] .= '</div>';
        $this->template->build('login', $data);
 
         
	}
    public function login111(){
        $userdata = array(
                    'userHome_id'=> 1,
                    'userHome_name'=> 123123123, 
                    'isLoggedInHomeDemo'=> TRUE  );
                $this->session->set_userdata($userdata);  
    }
    
    public function logout() {
		
                $userdata = array( 
                                  'userHome_id' => "", 
				                  'userHome_name'=> "" ,
                                  'isLoggedInHomeDemo'=> false);
                               
		$this->session->unset_userdata($userdata); 
                redirect( base_url()."login" , 'refresh');
	}
        
}
 