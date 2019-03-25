<?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ?>  <ul id="menu-main" class="sf-menu pb-reset-list pb-clear-fix">
                  <li class=" menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-404 current_page_item sf-mega-enable-0  ">
                     <a href="<?php echo base_url(); ?>"><span></span>TRANG CHỦ</a>
                  </li>
                  <?php
                   $SEO = $this->load->library('SEO');
                   foreach($list_category as $k=>$v){
                        ?>
                  <li class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children sf-mega-enable-0  ">
                     <a href="<?php echo $SEO->build_link($v , 'category'); ?>"><span></span><?php echo $v->name; ?></a>
                 <?php
                   } 
                   ?> 

                   <?php
                    if(!$this->session->userdata('isLoggedInHomeDemo')){ 
                        ?>   
                      <li class=" menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-404 current_page_item sf-mega-enable-0  ">
                     <a href="<?php echo base_url(); ?>login.html"><span></span>Đăng Nhập</a>
                     <?php
                    }else{
                        ?>
                         <li class=" menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-404 current_page_item sf-mega-enable-0  ">
                     <a href="http://localhost/thuanphatcorp/product/thuchi-22.html"><span></span>Qũy thu chi</a>
                      <li class=" menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-404 current_page_item sf-mega-enable-0  ">
                     <a href="<?php echo base_url(); ?>"><span></span>Đăng Xuất</a>
                        <?php
                    }
                   
                   ?>
                    
                    
  </ul>






<!--
<div class="row">
    <div class="" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
       <div class="nav__primary">
          <div class="col-xs-12">
            
             <nav class="nav clearfix">
                <ul id="topnav" class="sf-menu">
                   <li id="menu-item-271" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                   <?php
                   $SEO = $this->load->library('SEO');
                   foreach($list_category as $k=>$v){
                        ?>
                        <li id="menu-item-300" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat">
                            <a href="<?php echo $SEO->build_link($v , 'category'); ?>"><?php echo $v->name; ?></a>
                        </li>
                        <?php
                   } 
                   ?> 
                   <li id="menu-item-273" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="<?php echo base_url(); ?>khuyen-mai.html">Khuyến Mãi</a></li>
                   <li id="menu-item-273" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo base_url(); ?>pages/lien-he.html">Liên hệ</a></li>
                </ul>
             </nav>
            
          </div>
       </div>
    </div>
 </div>
 -->
 