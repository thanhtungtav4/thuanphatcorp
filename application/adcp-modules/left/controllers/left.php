<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class left extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
 
    }
	public function index()
	{
        $this->load->view(__CLASS__);
	}
     
    
        
}
 