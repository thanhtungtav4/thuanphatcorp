
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Liên Hệ </h2>
        <!-- a href="<?php echo base_url()."lienhe/addedit"; ?>" style="float: right;"> [+]Them moi</a> -->
    </div>
    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
       
    <thead>
    <tr>
        <td>STT</td>
        <td>ID</td>
        <td>Tên Khách Hàng</td>
        <td>Gmail</td> 
      <td>Phone</td> 
        <td>Nội Dung</td>
        <td>Ngày giờ</td>
          <td>Trạng Thái</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $stt = 0;
    //print_r($list); exit;
    foreach($list as $k=>$v){
        $stt++;
        ?>
        <tr>
            <td><?php echo $stt; ?></td>
            <td><?php echo $v->id; ?></td> 
            <td>
             <a href="<?php echo base_url()."lienhe/addedit/".$v->id ?>"><?php echo $v->name; ?></a> 
        </td>
         <td>
            <a href="<?php echo base_url()."lienhe/addedit/".$v->id ?>"><?php echo $v->email; ?></a> 
            </td>
               <td>
            <a href="<?php echo base_url()."lienhe/addedit/".$v->id ?>"><?php echo $v->phone; ?></a> 
            </td>
             
             <td>
             <textarea style="width: 100%" rows="3"><?php echo $v->content; ?>
          </textarea>
            </td>
        <td>
            <a href="<?php echo base_url()."lienhe/addedit/".$v->id ?>"><?php echo $v->create_date; ?></a> 
            </td>
            <td>
              
                <a href="<?php echo base_url()."lienhe/delete/".$v->id ?>">Xóa</a> 
            </td>

        </tr>
        <?php
    } 
    ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->