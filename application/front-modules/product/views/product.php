
<div class="top-main">

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
        <div class="block-news-detail">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="title-dt"><?php echo $detail_product[0]->name; ?></h1>
              <time>
                <i class="fa fa-calendar">
                </i><?php echo $detail_product[0]->create_date; ?></time>
                <div class="full" style="padding-top: 5px;">
                  <div style="text-align: justify;">
                    <div> <?php echo $detail_product[0]->description; ?></div>
<p> <?php echo $detail_product[0]->content; ?></p>

      
        
        
              <div class="block-newsOther mrb30 col-lg-12" style="margin-bottom:40px;">
               <h3 style="padding-top: 35px">Tin tức liên quan</h3>
                <div class="col-lg-12">
                     <?php
     $SEO = $this->load->library('SEO');
     foreach($list_product_related as $k=>$v){
      ?> 
                      <div class="item-other" style="padding-left:5px !important">
                        <h4>
                          <a style="padding-left: 20px" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>" target="_self" title="<?php echo $v->name?>"><i class="fa fa-caret-right"></i><?php echo $v->name?></a>
                        </h4>
                      </div><br>

 <?php 
   }
   ?>
                    
                  

                                      </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
