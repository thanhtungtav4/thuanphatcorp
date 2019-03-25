<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class attach extends MX_Controller {
	/**
     *
     * @var Test_model 
     */
	public $model;
        /**
         *
         * @var Genre_model
         */
        public $genre;
        public $obImg;
        public $data_get;
        public $user_id;
	function __construct()	{
		parent::__construct();	
		$this->model=$this->load->model('Attach_model');	
        $this->obImg = $this->load->library("mgallery"); 
        $this->data_get = $this->input->get(); 
  		$this->data_get['module_id'] = $this->data_get['module_id']?$this->data_get['module_id']:0;
          if(!$this->session->userdata('isLoggedInAdminDemo')){ redirect(base_url('login'));}
                
	}
       
      
        public function listview()
        {      
            $_data['module_id'] = $this->data_get['module_id'];
            $_data['module_name'] = $this->data_get['module_name']; 
            $arrAttach=$this->model->getList($this->data_get); 
             
            // SHow Img
            $this->obImg->upload_foldera = "../../upload/images/images/";
            $this->obImg->upload_folder = "../../upload/images/images/";
            $_data['images'] = $this->obImg->get_images_arr($arrAttach);
            $this->load->view('listview' , $_data);
       }
       
       
       public function add(){ 
                $data_post = $this->input->post(); 
                // Upload 
                if($data_post){  
                        if( $_arrNameImage=$this->obImg->upload() ) { 
                        	foreach($_arrNameImage as $value) { 
                        		// insert Array name image for  table( attach)
                                $attachName = $value['name'];
                                $location = $value['location']; 
                                $data_post['module_id'] = $this->data_get['module_id'];
                                $data_post['module_name'] = $this->data_get['module_name'];
                                $data_post['image'] = $attachName;  
                                unset($data_post['fsubmit']);
								// print_r($data_post);exit;
                                $this->model->insert($data_post); 
                        	}
                        }
                        else 	
                        	echo "Khong Thanh Cong";                
                }
                $this->listview();
        }
        
        
        public function delete_attach(){ 
            if($this->data_get['image']){
                //Xoa hinh trong thu muc
                $this->obImg->delete($this->data_get['image']); 
                //Xoa trong database
                $this->model->delete($this->data_get);
                unset($this->data_get['image']);
            } 
            $this->listview();
        }
        
 
    public function index(){ 

        
        $where = 'status != 2 and (module_name = "banner" OR module_name = "logo" OR module_name = "baner2" )';
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
                    if ($_FILES["image"]["size"] > 5000000) {
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
 ?>