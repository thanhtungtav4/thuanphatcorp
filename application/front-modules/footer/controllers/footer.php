<?php

class footer extends MX_Controller {

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
          $this->models_category = $this->load->model('category/models_category');
        $this->model_product = $this->load->model('product/models_product'); 
        $this->load->library('main/main', 'main');
          $this->load->model('Models_footer' , "footer" , TRUE);  
    }
	public function index()
	{
            
          // Chi lay 8 sp
	       $limit = array();
           $limit['start'] = 0;
           $limit['num'] = 3;
           /*
            *** Get list product noi bat
            */
            $where = array(); 
            $where['tbl_products.status'] = 1;  
              $where['tbl_products.cat_id'] = 2;  
            $order_by = 'tbl_products.create_date DESC';  
            $data['list_tintucmoi'] = $this->model_product->getList($where , false , $order_by ,false,false,false,$limit );   

                //      echo "<pre>"; print_r($data['list_tintucmoi']); exit;   
             // Chi lay 8 sp
	       $limit = array();
           $limit['start'] = 0;
           $limit['num'] = 1;
           /*
            *** Get list product noi bat
            */
            $where = array(); 
            $where['tbl_products.status'] = 1;  
              $where['tbl_products.cat_id'] = 2;  
                $where['tbl_products.hot'] = 1;  
            $order_by = 'tbl_products.create_date DESC';  
            $data['list_hot'] = $this->model_product->getList($where , false , $order_by ,false,false,false,$limit);

           $this->load->view(__CLASS__,$data); 
           //$this->template->build('welcome_message');
           
           
	}
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
//      $config = array(

//   'protocol' => 'smtp',
//     'smtp_host' => 'ssl://smtp.googlemail.com',
//     'smtp_port' => 465,
//     'smtp_user' => 'cuongluong2711@gmail.com',
//     'smtp_pass' => 'hfmtcuvvpoqbqgps',
//     'mailtype'  => 'html', 
//     'charset' => 'utf-8',

// );
// $this->load->library('email', $config);
// $this->email->set_newline("\r\n");
// $this->email->from('cuongluong2711@gmail.com','Hỗ Trợ Khách Hàng');
// $this->email->to('support@uniqueland.com.vn');
// $this->email->subject('Có khách vừa đăng ký thông tin');
// $this->email->message('<p><span style="color: #ff0000;"><strong>Thông Báo :</strong></span></p>
// <p><strong>Có khách hàng vừa đặt hàng trên webiste , thông tin như sau :</strong></p>'.

// '<p><span style="color: #008000;"><strong>Tên: </strong></span></p>'.$data['name'].
// '<p><span style="color: #008000;"><strong>Số Điện Thoại :</strong></span></p>'.$data['phone'].
// '<p><span style="color: #008000;"><strong>Email :</strong></span></p>'.$data['email'].
// '<p><span style="color: #008000;"><strong>Nội Dung :</strong></span></p>'.$data['content'].
// '<p><span style="color: #ff0000;">Qúy Khách Vui lòng truy cập trang gmail bên dưới.:</span></p>
// <p><a href="www.uniqueland.com.vn">http://www.uniqueland.com.vn</a></p>
// <p><strong>Lưu ý đây là Email tự động , Qúy khách vui lòng không trả lời Email này . Thông tin khách hàng của quý khách sẽ được bảo mật hoàn toàn 100%.</strong></p>
// <p><strong>Nếu Qúy Khách Không Có Nhu Cầu Nhận Thông Tin Tự Động Khi Có Khách Để Lại Thông Tin Vui Lòng Liên Hệ :</strong></p>
// <p><a href="http://www.uniqueland.com.vn/">www.uniqueland.com.vn</a></p>
// <p><span style="color: #ff0000;"><strong><a><span style="color: #ff0000;">Hotline: 090 338 9473</span></a></strong></span></p>');

// if ( ! $this->email->send())
// {
//     // Generate error
//     echo $this->email->print_debugger();
// }else{
// }

    $this->db->insert("tbl_lienhe", $data);
    redirect( base_url()."lienhe" , 'refresh');
}
}

 
}
?>
