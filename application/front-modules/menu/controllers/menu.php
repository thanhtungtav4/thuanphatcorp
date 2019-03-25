<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu extends MX_Controller {
 
    public function __construct() {
        parent::__construct(); 
    }
	public function index()
	{ 
           $this->load->view(__CLASS__ , $data); 
           //$this->template->build('welcome_message');
           
           
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */