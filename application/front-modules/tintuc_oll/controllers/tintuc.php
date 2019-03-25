<?php                                                                                                                                                                                                                                                                                                                                                                                                                                

class tintuc extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->model = $this->load->model('models_tintuc');  
  
        $this->load->library('main/main', 'main');
    }
    
    
	public function index($id = false)
	{ 
        
          if(!$id && intval($id)){
              redirect(base_url(),'refresh');
          } 
          $data['id'] = $id; 
         
          $where = array();
          $where['id'] = $id;  
          $data['detail_tintuc'] = $this->model->getList($where); 
          if(empty($data['detail_tintuc'])){
              redirect(base_url()); 
          } 


          $SEO = $this->load->library('SEO');
          // Breadcumb 
            $data['breadcumb'] = '';
            $data['breadcumb'] .= '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb breadcrumb__t">';
            $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
            $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.base_url().'">Trang chủ</a>';
            $data['breadcumb'] .= '</span>';
            $data['breadcumb'] .= '<span class="divider"></span>';
            $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
            $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.$SEO->build_link($data['detail_category'][0] , 'category').'">'.$data['detail_category'][0]->name.'</a>';
            $data['breadcumb'] .= '</span>';
            $data['breadcumb'] .= '<span class="divider"></span>';
            $data['breadcumb'] .= '<span typeof="v:Breadcrumb">';
            $data['breadcumb'] .= '<a rel="v:url" property="v:title" href="'.$SEO->build_link($data['detail_tintuc'][0] , 'xemin').'">'.$data['detail_tintuc'][0]->name.'</a>';
            $data['breadcumb'] .= '</span>'; 
            $data['breadcumb'] .= '</div>';
          

            $this->_data['SEO']->build_meta($data['detail_tintuc'][0], "tintuc");

          $this->template->build('tintuc' , $data);
	}



        
}

