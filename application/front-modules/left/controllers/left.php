<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class left extends MX_Controller {

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
         $this->model_product = $this->load->model('product/models_product'); 
         $this->load->library('main/main', 'main');
  $this->model_category = $this->load->model('category/models_category'); 
    }
	public function index()
	{
              $data = array();
    // Lay Category Cha
    $where['status'] = 1;
    $where['parent_id'] = 0;
    $data['category'] = $this->models_category->getList($where);

    // Duyet qua tung Danh muc cha, lay danh muc con
    foreach($data['category'] as $k=>$v){
      $where = array();
      $where['status'] = 1;
      $where['parent_id'] = $v->id;
      $data['category'][$k]->child = $this->models_category->getList($where);
    }
     
           $this->load->view(__CLASS__,$data); 
           //$this->template->build('welcome_message');
           
           
	}
        
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */