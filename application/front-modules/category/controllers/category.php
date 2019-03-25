<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category  extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->model = $this->load->model('models_category');
        $this->model_product = $this->load->model('product/models_product');
         $this->model_nhamau = $this->load->model('nhamau/models_nhamau'); 
        $this->load->library('main/main', 'main');
    }


	public function index($cat_id = 0)
	{ 


        $data = array();
            // KT id hop le
        if(!intval($cat_id) && $cat_id <= 0){
            redirect(base_url(),'refresh');
        }  
        
        $where = array();
        $where['id'] = $cat_id;
        $where['status'] = 1;
        $data['detail_category'] = $this->model->getList($where);
        
        $data['title'] = $data['detail_category'][0]->name;
         
        /*
        *** Get list product with cat_id
        */
        $where = array();
        $where['tbl_products.cat_id'] = $cat_id;
        $where['tbl_products.status'] = 1 ;
        $where['tbl_category.status'] = 1 ;

        $order_by = 'tbl_products.create_date ASC';

        $join = array();
        $join['tbl_category'] = 'tbl_category.id = tbl_products.cat_id';  
        $select = 'tbl_products.* , tbl_category.name as cat_name'; 
       
        $data['list_mathang'] = $this->model_product->getList($where , false , $order_by , false , $join , $select);
        $slug = 'category/'.$this->uri->segment(2); 
        //$data['list_mathang'] = $this->model_product->getListPage($where , false , $order_by , false , $join , $select , PER_PAGE_MAIN ,array('uri_segment'=>3,'base'=>$slug));
      // echo "<pre>"; print_r($data['list_mathang']); exit; 
     
      
        
          // Chi lay 8 sp
	       $limit = array();
           $limit['start'] = 0;
           $limit['num'] = 1;
           /*
            *** Get list product noi bat
            */
            $where = array(); 
            $where['tbl_products.status'] = 1;  
            $order_by = 'tbl_products.create_date DESC';  
            $data['list_tintucmoi'] = $this->model_product->getList($where , false , $order_by ,false,false,false,$limit );    
        // Breadcumb 
        $data['breadcumb'] = '';
        $data['breadcumb'] .= '<div id="path" class="row btn-group btn-breadcrumb">';
        $data['breadcumb'] .= '<a href="'.base_url().'" class="btn btn-default"><i class="fa fa-home"></i></a>';
        $data['breadcumb'] .= '<a href="#" class="btn btn-default">'.$data['detail_category'][0]->name.'</a>';
        $data['breadcumb'] .= '</div>';
        //  $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="active">'.$data['detail_category'][0]->name.'</span>';

        $data['getCat'] .= '<p class="title-pg">'.$data['detail_category'][0]->name.'</p>';

        // SEO
        $this->_data['SEO']->build_meta($data['detail_category'][0], "category");
        //print_r($this->_data['SEO']); exit;
        
        //echo "<pre>"; print_r($data); exit; 
        $this->template->build(__CLASS__ , $data ); 
	}
    
    public function khuyenmai()
	{ 
        $data = array();  
        $data['title'] = 'Khuyến Mãi'; 
        
        $where = array(); 
        $where['tbl_products.status'] = 1;
        $where['tbl_products.sale'] = 1;
        $where['tbl_category.status'] = 1;   
        
        $join = array();
        $join['tbl_category'] = 'tbl_category.id = tbl_products.cat_id';  
        $select = 'tbl_products.* , tbl_category.name as cat_name'; 
        $order_by = 'tbl_products.id DESC';  
        //$data['list_mathang'] = $this->model_product->getList($where , false , $order_by , false , $join , $select);
        
        $slug = $this->uri->segment(1); 
        $data['list_mathang'] = $this->model_product->getListPage($where , false , $order_by , false , $join , $select , PER_PAGE_MAIN ,array('uri_segment'=>2,'base'=>$slug));
        
        // Breadcumb 
        $data['breadcumb'] = '';
        $data['breadcumb'] .= '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb breadcrumb__t">';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
        $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.base_url().'">Trang chủ</a>';
        $data['breadcumb'] .= '</span>';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="divider"></span>';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="active">Khuyến Mãi</span>';
        $data['breadcumb'] .= '</div>';
        
      
        
        //echo "<pre>"; print_r($data); exit; 
        $this->template->build(__CLASS__ , $data ); 
	}
    
    public function menu(){
        $where = array();
        $where['parent_id'] = 0;
        $where['status'] = 1;
        $data['list_category'] = $this->model->getList($where);
        $this->load->view('menu' , $data ); 
    }
    
    

}
 