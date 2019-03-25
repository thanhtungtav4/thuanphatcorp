

<form method="post" enctype="multipart/form-data">

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-alt"></i> Danh Mục</h2>

       
           
      
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
  <label class="control-label" for="inputSuccess1">Chọn Danh Mục Cha :</label>
  <select name="parent_id"> 
        <option  <?php echo @$detail[0]->parent_id==0?"selected":"";  ?> value="0">Không có danh mục cha</option>
        <?php
        foreach($list_category as $k=>$v){
            ?><option  <?php echo @$detail[0]->parent_id==$v->id?"selected":"";  ?> value="<?php echo $v->id ?>"><?php echo $v->name ?></option><?php
        }
        ?> 

    </select>        
</div>
<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Họ Tên</label>
  <input type="content" class="form-control" name="fullname" placeholder="Nhập name ...." value="<?php echo @$detail[0]->name;  ?>" >
</div>
<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Gmail</label>
  <input type="content" class="form-control" name="gmail" placeholder="" value="<?php echo @$detail[0]->gmail;  ?>" >
</div>
<div class="form-group has-warning">
  <label class="control-label" for="inputWarning1">Nội dung</label><br>
 <textarea  name="content"  style="width: 100%" rows="10"><?php echo @$detail[0]->content;  ?></textarea></div>

<<!-- div class="form-group has-success">
  <label class="control-label" for="inputSuccess1">Hình Ảnh</label>
            <input type="file" name="image" id="fileToUpload">
                <br />
                <img src="<?php echo FOLDER_GET_IMAGE.@$detail[0]->image?>" width="100px" height="100px" /> 
          
             
   </div>    -->
<div class="form-group has-warning">
  <label class="control-label" for="inputError1">Trạng thái</label>
   <select name='status'>
              <option  value="1" <?php  echo @$detail[0]->status==1?'selected':"" ?>>Public</option>
              <option  value="0" <?php  echo @$detail[0]->status==0?'selected':"" ?>>Unpublic</option>
              <option  value="2" <?php  echo @$detail[0]->status==2?'selected':"" ?>>Delete</option> 
            </select>
</div>




   

    <center><button type="submit" class="btn btn-primary btn-lg active"value="Submit">Submit</button></center>
  
</form>






