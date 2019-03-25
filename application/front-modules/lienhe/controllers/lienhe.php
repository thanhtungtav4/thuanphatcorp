<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lienhe extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_lienhe' , "lienhe" , TRUE);  
          $this->model_attach = $this->load->model('attach/models_attach'); 
        $this->load->library('main/main', 'main');
    }

    
                
    public function index()
    {
      /*
      logo
    */
     $where = array();
          $where['module_name'] = 'logo';
          $where['tbl_attach.status'] = 1;

          $data['logo'] = $this->model_attach->getList($where);
          //echo "<pre>"; print_r($data['logo']); exit; 
 // kết thúc hình ảnh logo
    
        $data['breadcumb'] = '';
        $data['breadcumb'] .= '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb breadcrumb__t">';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
        $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.base_url().'">Trang chủ - </a>';
        $data['breadcumb'] .= '</span>'; 
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="divider"></span>';
        $data['breadcumb'] .= '<span typeof="v:Breadcrumb" class="active">Đăng ký</span>';
        $data['breadcumb'] .= '</div>';
        $this->template->build('lienhe', $data);
 
         
    }
  
//truyền vào data
  
   
   public function lienhe11()
  {
   if($this->input->post()) {
             $name = $this->input->post('name');
            $content = $this->input->post('content');
            $email = $this->input->post('email');
              $phone = $this->input->post('phone');
                 $diachi = $this->input->post('diachi');

             



    $data = [
               'name' => $name,
                'content' =>$content, 
                'email' =>$email,
                'phone' =>$phone,
                'diachi' =>$diachi,
         'status'=>1,
                



    ]; 


    $this->db->insert("tbl_lienhe", $data);
    redirect( base_url()."" , 'refresh');
}
}

 
}
 