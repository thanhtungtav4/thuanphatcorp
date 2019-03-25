<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class top extends MX_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
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
    $this->model_nhamau = $this->load->model('nhamau/models_nhamau'); 
  $this->model_attach = $this->load->model('attach/models_attach');
  $this->load->library('main/main', 'main');
  $this->model_category = $this->load->model('category/models_category'); 
  //  $this->model_categorytin = $this->load->model('categorytin/models_categorytin'); 


    //$this->model_pages = $this->load->model('pages/models_pages');
}
public function index()
{
 $cart_content = $this->cart->contents();
 $data['ordered'] = false; 
 if(is_array($cart_content)){ 
  $data['count'] = count($cart_content);
  $data['cart_content'] = $cart_content;
  $data['total_price'] = $this->cart->format_number($this->cart->total()); 
}


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
          //echo "<pre>"; print_r($data); exit; 


//echo "<pre>"; print_r($data['list_logo']); exit;
 // Get banner
          

 //echo "<pre>"; print_r($data['list_danhmuctin']); exit; 
// $limit = array();
// $limit['start'] = 0;
// $limit['num'] =1;
$where = array();
$where['tbl_category.status'] = 1;
$where['tbl_category.id'] = 2;
$data['list_nhamau'] = $this->models_category->getList($where,false,false,false,false,false,false);
 //echo "<pre>"; print_r($data['list_nhamau']); exit; 
$where = array();
$where['tbl_category.status'] = 1;
$where['tbl_category.id'] = 1;
$data['list_tt'] = $this->models_category->getList($where,false,false,false,false,false,false);
 //echo "<pre>"; print_r($data['list_nhamau']); exit; 

  
$this->load->view(__CLASS__ , $data); 
}



          }

          /* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */