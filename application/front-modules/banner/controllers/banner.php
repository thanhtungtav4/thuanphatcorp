<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
         * 
	 */
    public function __construct() {
        parent::__construct();
        
    }
	public function index()
	{
           $this->model_attach = $this->load->model('attach/models_attach'); 
           
           // Get banner
           $where['module_name'] = 'banner';
           $where['status'] = 1;
           $data['list_banner'] = $this->model_attach->getList($where); 
          //echo "<pre>"; print_r($data); exit; 
           $this->load->view(__CLASS__,$data); 
           //$this->template->build('welcome_message');
           
           
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */