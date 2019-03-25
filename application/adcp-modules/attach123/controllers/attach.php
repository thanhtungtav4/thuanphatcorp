<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class attach extends MX_Controller {
    public $model;
    public function __construct() { 
        parent::__construct();
        if(!$this->session->userdata('isLoggedInAdminDemo')){ redirect(base_url('login'));}
        $this->model = $this->load->model('attach/Models_attach');  
     } 
    public function index(){ 

        
        $where = 'status != 2 and (module_name = "banner" OR module_name = "logo")';
        $data['list'] = $this->model->getList($where);  
        //print_r($data['list']); exit;
        $this->template->build('listtable' , $data ); 
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
                    echo "Dung lượng qá lớn.";
                    $uploadOk = 0;
                }
                // Kiem tra loai file upload phai la img khong 
                if($_FILES["image"]["type"] != "image/jpg" && $_FILES["image"]["type"] != "image/png" && $_FILES["image"]["type"] != "image/jpeg" && $_FILES["image"]["type"] != "image/gif" ) {
                    echo "Chỉ được phép upload hình ảnh.";
                    $uploadOk = 0;
                } 
                if ($uploadOk == 0) {
                    echo "<br/ >Không thể upload file.<br/ >";
                // if everything is ok, try to upload file
                } else {
                    // Upload file vao thu muc mac dinh
                    $image =  time()."_".$_FILES["image"]["size"]."_".$_FILES["image"]["name"]; 
                    $link_to_upload =  FOLDER_UPLOAD_IMAGE.$image; 
                  
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $link_to_upload)) {
                        // Upload image thanh cong
                        $data_post['image'] = $image;
                    } 
                }
        }    
        /* END Upload Hinh Anh */
        if(intval($id)){  // Update
            $data['id'] = $id;  
            if($data_post){    // Click Submit 


                $data_post['create_date'] = date('Y-m-d h:i:s' , time());
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
                $data_post['create_date'] = date('Y-m-d h:i:s' , time());


                $this->model->insert($data_post);
                $data['msg'] = 'Insert Thanh Cong';
            }
        }

        // List Category
        $data['list_module'] = $this->model->getList();
          // List Category
       

        
        $this->template->build('addedit' , $data); 
   }



}
 