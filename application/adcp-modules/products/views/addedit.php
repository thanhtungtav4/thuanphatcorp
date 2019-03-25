<form method="post" enctype="multipart/form-data">

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Đây là trang viết bài</h2>

       
           
      
    </div>
 <div class="alert alert-info"><?php
if($this->session->userdata('thanhcong')){  // Nếu có session Thành Công
    // Show thông báo
    echo "<b style='color: red;'>".$this->session->userdata('thanhcong') . "</b><br / >";
    // Xóa session
    $this->session->unset_userdata('thanhcong');
}
?>

    <?php
    if(@$id){ // Dang Edit
        echo "Chỉnh Sửa ID $id : ";
    }else{
        echo "Thêm Mới:";
    }

    if(@$msg){ // Dang Edit
        echo '<br/><b style="color: red;">'.$msg.'</b><br/>';
    } 
    

?> </a></div>

<script language="javascript">
    var site_root_domain = "<?php echo $this->config->item('static_path').'themes/admin/'; ?>";
</script>
<script type="text/javascript" src="<?php echo $this->config->item('static_path'); ?>themes/admin/scripts/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('static_path'); ?>themes/admin/scripts/js_editor.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('static_path'); ?>themes/admin/scripts/jquery.tinymce.js"></script>

 <table class="table table-striped table-bordered bootstrap-datatable ">
     <div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Tên Danh Mục</label>
    <br>
    <select name="cat_id"> 
        <?php
        foreach($list_category as $k=>$v){
            ?><option  <?php echo @$detail[0]->cat_id==$v->id?"selected":"";  ?> value="<?php echo $v->id ?>"><?php echo $v->name ?></option><?php
        }
        ?> 
    </select>        
     </div>
    
        <div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Chỗ này mục nào thì gõ chữ nấy , ví dụ : giới thiệu , tiện ích vv.vv</label>
  <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo @$detail[0]->name;  ?>">
</div>

 <div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Chỗ này giống như trên nhưng hoa lá cành xíu .vd : Tiện ích đẳng cấp của căn hộ j j đó blah blah</label>
  <input type="text" class="form-control" name="tittle" placeholder="tiêu đề" value="<?php echo @$detail[0]->tittle;  ?>">
</div>

<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Chỗ này mô tả ngắn gọn thôi</label><br>
 <textarea class="input" name="description"  style="width: 100%" rows="10"><?php echo @$detail[0]->description;  ?></textarea></div>

 <div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Bao nhiêu tinh hoa về cái đang muốn viết thì gõ vào đây</label><br>
  <textarea class="input_textarea" name="content"  style="width: 100%" rows="10"><?php echo @$detail[0]->content;  ?></textarea></div>
 
 <iframe name="attach_file" id="attach_file" style="width: 100%; " scrolling="auto" frameborder="0" src="<?php echo base_url(); ?>attach/listview?module_name=product&module_id=<?php echo @$detail[0]->id;  ?>"></iframe>
 
</div>

 <div class="form-group has-error">
  <label class="control-label" for="inputError1">Trạng thái</label>
   <select name='status'>
              <option  value="1" <?php  echo @$detail[0]->status==1?'selected':"" ?>>Hiển thị</option>
              <option  value="0" <?php  echo @$detail[0]->status==0?'selected':"" ?>>Ẩn</option>
              <option  value="2" <?php  echo @$detail[0]->status==2?'selected':"" ?>>Xóa</option> 
            </select>

</div>
   <div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Hình Ảnh , có cũng được ..không có cũng ko sao , nói chung tùy ý</label>
            <input type="file" name="image" id="fileToUpload">
                <br />
                <img src="<?php echo FOLDER_GET_IMAGE.@$detail[0]->image?>" width="100px" height="100px" /> 
          
             
   </div>        
        </tr>
       
    </tbody>
    </table>
   

    <center><button type="submit" class="btn btn-primary btn-lg active"value="Submit">Save</button></center>
  
</form>

