<section class="tin-tuc" id="new">
        <div class="container">
            <div class="row animatedParent animateOnce" data-sequence="100">
                <center><h2 class="fadeIn animated delay-0 go" data-id="0"><strong>TIN TỨC</strong></h2></center>
                      
           <?php
      $SEO = $this->load->library('SEO');
      foreach($list_tintucmoi as $k=>$v){
        ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 box-news">
   <article class="news fadeIn animated delay - 0 go" data-id="1">
      <a class="title" href="<?php echo $SEO->build_link($v , 'tintuc'); ?>" data-alias="<?php echo $SEO->build_link($v , 'tintuc'); ?>">
         <div class="feature-image"><img class="feature-image img-responsive" src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="<?php echo $v->name; ?>" title="<?php echo $v->name; ?>"></div>
      </a>
      <div class="content">
         <a class="title" href="<?php echo $SEO->build_link($v , 'tintuc'); ?>" data-alias="<?php echo $SEO->build_link($v , 'tintuc'); ?>">
            <h4><?php echo $v->name; ?></h4>
            <p><?php echo $v->description?></p>
            <div class="news-border"></div>
         </a>
         <a class="viewmore" href="<?php echo $SEO->build_link($v , 'tintuc'); ?>">
            <img class="icon-arrow-right" src="<?php echo base_url();?>themes/front/img/icon-arrow-right.svg">
            <p>Chi tiết</p>
         </a>
      </div>
   </article>
</div>

                  <?php 
      }
      ?>

                   
            

                 
                </div>

            </div>
        
    </section>