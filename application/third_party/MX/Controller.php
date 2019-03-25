<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2011 Wiredesignz
 * @version 	5.4
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
    public $_data;
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);


        $this->_data['SEO'] = $this->load->library("SEO");

	}
	
	public function __get($class) {
		return CI::$APP->$class;
	}




	// Function chung
	public function index(){ 

        $where['status !='] = 2;
		$data['list'] = $this->model->getList($where);  
        //print_r($data['list']); exit;
        $this->template->build('listtable' , $data ); 
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
        
        $this->template->build('addedit' , $data); 
   }


	// Thay doi trang thanh:  Public ,  unpublic
	public function changeStatus($id = false , $status){
        if(intval($id)){
        	$dataUpdate['status'] = $status;
        	$whereUpdate['id'] = $id;
            $this->model->update($dataUpdate , $whereUpdate);   
 			return true;  
        } 
 		return false;
        
    }

    // Thay doi trang thanh: delete
    public function delete($id = false){
        if(intval($id)){
        	// Doi trang thai thanh : 2
        	$dataUpdate['status'] = 2;
        	$whereUpdate['id'] = $id;
            $this->model->update($dataUpdate , $whereUpdate);  
 			// Thanh cong
 			return true;  
        }
        // Khong Thanh cong
 		return false;
    }


}