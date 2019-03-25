<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends MX_Controller {
    public $model;
    public function __construct() {
      
    	 if(!$this->session->userdata('isLoggedInAdminDemo')){ redirect(base_url('login'));}
        parent::__construct();
        $this->model = $this->load->model('Models_category'); 
    }  
 
    public function changeStatus($id = false , $status = 0){
    	 parent::changeStatus($id,$status);
        redirect(base_url().__CLASS__);
    }

 
    public function delete($id = false){
    	 parent::delete($id);
        redirect(base_url().__CLASS__);
    }
 public function addedit($id = false){  
        $data = array();

		$data_post = $this->input->post();  
        /* Upload Hinh Anh */
        if(@$_FILES["image"]["size"] > 0){
                $uploadOk = 1;
                // Kiem tra dung luong anh
                if ($_FILES["image"]["size"] > 500000) {
                    echo "Dung lÆ°á»£ng qÃ¡ lá»›n.";
                    $uploadOk = 0;
                }
                // Kiem tra loai file upload phai la img khong 
                if($_FILES["image"]["type"] != "image/jpg" && $_FILES["image"]["type"] != "image/png" && $_FILES["image"]["type"] != "image/jpeg" && $_FILES["image"]["type"] != "image/gif" ) {
                    echo "Chá»‰ Ä‘Æ°á»£c phÃ©p upload hÃ¬nh áº£nh.";
                    $uploadOk = 0;
                } 
                if ($uploadOk == 0) {
                    echo "<br/ >KhÃ´ng thá»ƒ upload file.<br/ >";
                // if everything is ok, try to upload file
                } else {
                    // Upload file vao thu muc mac dinh
                    $hinhanh_name =  time()."_".$_FILES["image"]["size"]."_".$_FILES["image"]["name"]; 
                    $hinhanh =  FOLDER_UPLOAD_IMAGE.$hinhanh_name; 
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $hinhanh)) {
                        // Upload image thanh cong
                        $data_post['image'] = $hinhanh_name;
                    } 
                }
        }    
        /* END Upload Hinh Anh */
        if(intval($id)){  // Update
            $data['id'] = $id;  
            if($data_post){    // Click Submit 
            	$whereUpdate = array();
                $whereUpdate['id'] = $id;
                $this->model->update($data_post , $whereUpdate);  
                $data['msg'] = 'Chinh Sua Thanh Cong';
            } 

            // Get detail id
        	$whereDetail = array();
	        $whereDetail['id'] = $id;
	        $data['detail'] = $this->model->getList($whereDetail);

        }
        else{  // Insert
            if($data_post){    // Click Submit
                $this->model->insert($data_post);
                $data['msg'] = 'Insert Thanh Cong';
            }
        }
         $data['list_category'] = $this->model->getList();

        $this->template->build('addedit' , $data); 
         


}


}
 