
<form method="post" enctype="multipart/form-data">

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> attach</h2>

       
           
      
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
 <table class="table table-striped table-bordered bootstrap-datatable ">
       
  
<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Loại</label>
 //so xuong gioi han ten
 <select name="module_name"> 
<!--         <option  <?php echo @$detail[0]->module_name=='logo'?"selected":"";  ?> value="logo">Logo</option> -->
        <option  <?php echo @$detail[0]->module_name=='banner'?"selected":"";  ?> value="banner">Banner</option>
          <option  <?php echo @$detail[0]->module_name=='logo'?"selected":"";  ?> value="logo">Logo</option>
         
  </select> 
</div>
<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Name</label>
  <input type="text" class="form-control" name="file" placeholder="Nhập file ...." value="<?php echo @$detail[0]->file;  ?>"   >
</div>
<!-- <div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Miêu tả</label>
  <input type="text" class="form-control" name="decription" placeholder="Miêu Tả ...." value="<?php echo @$detail[0]->decription;  ?>"   >
</div> -->
<!-- <div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Nhập Đường Dẫn</label>
  <input type="text" class="form-control" name="href" placeholder="" value="<?php echo @$detail[0]->href;  ?>"   >
</div> -->
<div class="form-group has-error">
  <label class="control-label" for="inputError1">Trạng thái</label>
   <select name='status'>
              <option  value="1" <?php  echo @$detail[0]->status==1?'selected':"" ?>>Public</option>
              <option  value="0" <?php  echo @$detail[0]->status==0?'selected':"" ?>>Unpublic</option>
              <option  value="2" <?php  echo @$detail[0]->status==2?'selected':"" ?>>Delete</option> 


            </select><br>
            <center>
            <input type="file" name="image" id="fileToUpload">
                <br />
                <img src="<?php echo FOLDER_GET_IMAGE.@$detail[0]->image?>" width="100px" height="100px" /> 
                </center>
</div>




    <center><button type="submit" class="btn btn-primary btn-lg active"value="Submit">Submit</button></center>
  
</form>


