










<form method="post" enctype="multipart/form-data">

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Category</h2>

       
           
      
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
       
    <div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Nhập  username</label>
  <input type="text" class="form-control" name="user" placeholder="Nhập username ...." value="<?php echo @$detail[0]->user;  ?>"  >
</div>
<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Nhập password</label>
  <input type="password" class="form-control" name="pass" placeholder="Nhập password ...." value="" >
</div>
<div class="form-group has-error">
  <label class="control-label" for="inputError1">Trạng thái</label>
   <select name='status'>
              <option  value="1" <?php  echo @$detail[0]->status==1?'selected':"" ?>>Public</option>
              <option  value="0" <?php  echo @$detail[0]->status==0?'selected':"" ?>>Unpublic</option>
              <option  value="2" <?php  echo @$detail[0]->status==2?'selected':"" ?>>Delete</option> 
            </select>
</div>



   

    <center><button type="submit" class="btn btn-primary btn-lg active"value="Submit">Submit</button></center>
  
</form>























