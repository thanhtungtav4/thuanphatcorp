<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends MX_Controller {
    public $model;
    public function __construct() {
        
        if(!$this->session->userdata('isLoggedInAdminDemo')){ redirect(base_url('login'));}
        parent::__construct();
        $this->model = $this->load->model('Models_admin'); 
    }  
 
    public function changeStatus($id = false , $status = 0){
    	 parent::changeStatus($id,$status);
        redirect(base_url().__CLASS__);
    }

 
    public function delete($id = false){
    	 parent::delete($id);
        redirect(base_url().__CLASS__);
    }


}
 