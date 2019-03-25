 <div id="ctl00_divLeft" class="col-left col-lg-3 cmszone">
      <div class="ModuleContent">
        <nav class="block-leftMenu mrb30">
          <ul class="nav navbar-nav">
  <?php
                  $SEO = $this->load->library('SEO');
                  foreach($category as $k=>$v){
                        ?>
                <li>
                <!-- $left->slug -->
                <a href="<?php echo $SEO->build_link($v , 'category'); ?>" target="_self"> <i class="fa fa-angle-right"></i><?php echo $v->name?></a>
              </li>
                       <?php
                              } 
                              ?>     
            
          </ul>
        </nav>
      </div>
    </div>   