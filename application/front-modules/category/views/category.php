<div class="top-main main-2">

    
<div id="breadcrumb" class="container-fluid">
 <div class="container">
   <div id="path" class="row btn-group btn-breadcrumb">     
   <?php echo $breadcumb; ?>
  </div>
</div>
</div>
<!-- END BREADCRUMB --> 
<!--APP BODY-->                   
<main class="main">
  <div class="container ">
   <div class="row">
    <?php echo Modules::run('left'); ?>
          
    <div id="ctl00_divCenter" class="col-main col-lg-9">
      <div class="Module Module-185">
      </div>
      <div class="ModuleContent">
        <div class="block-projectsList">
       <?php echo $getCat; ?>
         <div class="row">
  <?php
                    $SEO = $this->load->library('SEO');
                foreach($list_mathang as $k=>$v){
                    ?>
                       <div class="col-xs-12 col-md-6 col-lg-4 mrb30" "="">
              <div class="item-prj1">
                <figure>
                  <a href="<?php echo $SEO->build_link($v , 'sanpham'); ?>" target="_self">
                    <img src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="/uploads/postimg/201902/opalriverside_main_1.jpg">
                  </a>
                  <figcaption>
                   <div class="middle">
                    <div class="text">
                       <div class="text"><li style="list-style: none;"><a href="<?php echo $SEO->build_link($v , 'sanpham'); ?>">Xem thêm</a></li><li></li></div>
                    </div>

                  </div>
                  <h3>
                    <a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>
                    "><?php echo $v->name?></a>
                  </h3>
                  <div class="desc"><?php echo $v->decription?></div>
                </figcaption>
              </figure>
              <li style="list-style: none;"><a href="<?php echo $SEO->build_link($v , 'sanpham'); ?>"></a></li>    
            </div>
          </div>    
          <?php 
                                 }
                                          ?>
        
      </div>
    <div class="pagination col-md-12 row" style="margin: 0 auto;text-align: center">
      <ul class="pagination"></ul>
    </div>
    </div>
    
  </div>

</div>

</div>
    
</div></main> 
  