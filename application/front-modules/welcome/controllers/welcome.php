<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends MX_Controller {

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
        $this->model_attach = $this->load->model('attach/models_attach'); 
        $this->model_product = $this->load->model('product/models_product'); 
          $this->model_category = $this->load->model('category/models_category'); 
        
       
        $this->load->library('main/main', 'main');

    }
	public function index()
	{
	     
       /**
             Get list baner
       **/

           $where['module_name'] = 'banner';
           $where['status'] = 1;
           $data['list_banner'] = $this->model_attach->getList($where); 
            //echo "<pre>"; print_r($data['list_banner']); exit;
         /**
             !=Get list baner
       **/



        $where = array(); 
        $where['tbl_products.status'] = 1;
        $where['tbl_products.id'] = 26; 
        $data['gioithieu'] = $this->model_product->getList($where , false ,  false  ,false,false,false );




        $limit = array();
        $limit['start'] = 0;
        $limit['num'] = 4; 
        $where = array(); 
        $where['tbl_products.status'] = 1;
        $where['tbl_products.cat_id'] = 9;  
        $order_by = 'tbl_products.create_date DESC';  
        $data['list_tintuc'] = $this->model_product->getList($where , false , $order_by ,false,false,false,$limit );


        $limit = array();
        $limit['start'] = 0;
        $limit['num'] = 8; 
        $where = array(); 
        $where['tbl_category.status'] = 1;
        $where['tbl_category.parent_id'] = 1;  
        $data['list_lvhd'] = $this->models_category->getList($where , false , false ,false,false,false,$limit );
           //  echo "<pre>"; print_r($data['list_lvhd']); exit;

        $limit = array();
        $limit['start'] = 0;
        $limit['num'] = 8; 
        $where = array(); 
        $where['tbl_products.status'] = 1;
        $where['tbl_products.cat_id'] = 8;  
        $order_by = 'tbl_products.create_date DESC';  
        $data['list_ctdl'] = $this->model_product->getList($where , false , $order_by ,false,false,false,$limit );

            $this->template->build(__CLASS__ , $data );   

         

           
           
	}
   

        
}

