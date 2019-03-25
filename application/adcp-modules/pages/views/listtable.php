
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
       <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Bài Viết Liên Quan</h2>

<!--       
            <a href="<?php //echo base_url()."pages/addedit"; ?>" style="float: right;"> [+]Them moi</a>
            -->
      
    </div>
    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
       
    <thead>
    <tr>
        <td>STT</td>
        <td>ID</td>
    
        <td>Tên Thông Tin</td> 
        <td>Trạng Thái</td> 
        <td>Chỉnh Sửa</td>
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
                <a href="<?php echo base_url()."pages/addedit/".$v->id ?>"><?php echo $v->name; ?></a> 
            </td> 
              
               
             
              
            <td>
                <?php 
                if($v->status == 1){
                    ?><a title="CLick de doi thanh UnPublic" href="<?php echo base_url()."pages/changeStatus/".$v->id.'/0'; ?>">Public</a><?php
                }else{
                    ?><a title="CLick de doi thanh Public" href="<?php echo base_url()."pages/changeStatus/".$v->id.'/1'; ?>">UnPublic</a><?php
                }
                
                 ?>
            </td> 
            <td>
                <a href="<?php echo base_url()."pages/addedit/".$v->id ?>">Sửa</a>

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