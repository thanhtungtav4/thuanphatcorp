<form method="post" enctype="multipart/form-data">

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Products</h2>

       
           
      
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
 
    <br>
      
     </div>
        <div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Nhập Tên Sự Kiện</label>
  <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo @$detail[0]->name;  ?>">
</div>


<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Nhập Mô Thời Gian</label><br>
 <textarea class="input" name="description"  style="width: 100%" rows="10"><?php echo @$detail[0]->description;  ?></textarea></div>


<div class="form-group has-error">
  <label class="control-label" for="inputError1">Trạng thái</label>
   <select name='status'>
              <option  value="1" <?php  echo @$detail[0]->status==1?'selected':"" ?>>Public</option>
              <option  value="0" <?php  echo @$detail[0]->status==0?'selected':"" ?>>Unpublic</option>
              <option  value="2" <?php  echo @$detail[0]->status==2?'selected':"" ?>>Delete</option> 
            </select>

</div>

        </tr>
       
    </tbody>
    </table>
   

    <center><button type="submit" class="btn btn-primary btn-lg active"value="Submit">Save</button></center>
  
</form>

