<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class right extends MX_Controller {

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
         $this->model_tintuc = $this->load->model('tintuc/models_tintuc'); 
        $this->load->library('main/main', 'main');
    }
	public function index()
	{
             
          // Chi lay 8 sp
         $limit = array();
           $limit['start'] = 0;
           $limit['num'] = 4;
           /*
            *** Get list product noi bat
            */
            $where = array(); 
            $where['tbl_tintuc.status'] = 1;   
            $where['tbl_tintuc.cat_id'] = 2;  
            $order_by = 'tbl_tintuc.create_date DESC';  
            $data['list_tintucmoi'] = $this->model_tintuc->getList($where , false , $order_by ,false,false,false,$limit );    
//echo "<pre>"; print_r($data['list_tintucmoi']); exit;

          $where = array();
         $where['tbl_tintuc.status'] = 1;
        $order_by = 'tbl_tintuc.id DESC';  
        $data['list_tin'] = $this->model_tintuc->getList($where , false , $order_by , false , false , false);
        $slug = 'category/'.$this->uri->segment(2); 
        //$data['list_mathang'] = $this->model_product->getListPage($where , false , $order_by , false , $join , $select , PER_PAGE_MAIN ,array('uri_segment'=>3,'base'=>$slug));
      //echo "<pre>"; print_r($data['list_tin']); exit; 
     
           $this->load->view(__CLASS__,$data); 
           //$this->template->build('welcome_message');
           
           
	}
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */