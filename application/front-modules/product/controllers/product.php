<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends MX_Controller {

  public function __construct() {
    parent::__construct();
    $this->model = $this->load->model('models_product');  
    $this->modelCAT = $this->load->model('category/models_category'); 
    $this->load->library('main/main', 'main');
    $this->model_attach = $this->load->model('attach/models_attach'); 
  }


  public function index($id = false)
  { 

    if(!$id && intval($id)){
      redirect(base_url(),'refresh');
    } 
    $data['id'] = $id; 

          // Chi tiet san pham
    $where = array();
    $where['id'] = $id;  
    $where['status'] = 1;
    $data['detail_product'] = $this->model->getList($where); 
    if(empty($data['detail_product'])){
      redirect(base_url()); 
    } 

          // Chi tiet category
    $where = array();
    $where['id'] = $data['detail_product'][0]->cat_id;  
    $where['status'] = 1;
    $data['detail_category'] = $this->modelCAT->getList($where); 
    if(empty($data['detail_category'])){
      redirect(base_url()); 
    } 


          // SP lien quan
    $limit = array();
    $limit['start'] = 0;
    $limit['num'] = 3; 
    $where = array(); 
    $where['status'] = 1;
    $where['cat_id'] = $data['detail_product'][0]->cat_id;  
    $order_by = 'tbl_products.create_date DESC';  
    $data['list_product_related'] = $this->model->getList($where , false , $order_by ,false,false,false,$limit );
        // echo "<pre>"; print_r($data['list_producttin_related']); exit;
    
          // echo "<pre>"; print_r($data ['gioithieu_wc']); exit;  



    $SEO = $this->load->library('SEO');
          // Breadcumb 
    $data['breadcumb'] = '';
   $data['breadcumb'] .= '<div id="path" class="row btn-group btn-breadcrumb">';
        $data['breadcumb'] .= '<a href="'.base_url().'" class="btn btn-default"><i class="fa fa-home"></i></a>';
        $data['breadcumb'] .= '<a href="#" class="btn btn-default">'.$data['detail_category'][0]->name.'</a>';
    $data['breadcumb'] .= '<a href="'.$SEO->build_link($data['detail_product'][0] , 'sanpham').'" class="btn btn-default">'.$data['detail_product'][0]->name.'</a>';
   
    $data['breadcumb'] .= '</div>';


    $this->_data['SEO']->build_meta($data['detail_product'][0], "product");



          //echo '<pre>'; print_r($data); exit;
    $this->template->build('product' , $data);
  }



  public function search($key = false)
  { 

    if(!$key){
      redirect(base_url(),'refresh');
    }

    $keySearch = str_replace('-','%',$key);
    $where = array();
    $where['status'] = 1;
    $like = "name LIKE '%".$keySearch."%'";  
    $order_by = 'tbl_products.id DESC'; 
      //$data['list_mathang'] = $this->model->getList($where , $like  , $order_by );


    $slug = $this->uri->segment(1).'/'.$this->uri->segment(2); 
    $data['list_mathang'] = $this->model->getListPage($where , $like , $order_by , false , false , false , PER_PAGE_MAIN ,array('uri_segment'=>3,'base'=>$slug));



    $data['key'] = $key;

      // Breadcumb 
    $data['breadcumb'] = '';
    $data['breadcumb'] .= '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb breadcrumb__t">';
    $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
    $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.base_url().'">Trang chủ</a>';
    $data['breadcumb'] .= '</span>';
    $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="divider"></span>';
    $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="active">Tìm kiếm với từ khóa: '.$key.'</span>';
    $data['breadcumb'] .= '</div>';  
    $data['title'] = 'Tìm kiếm với từ khóa: '.$key;   

    $this->template->build('search' , $data); 
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */