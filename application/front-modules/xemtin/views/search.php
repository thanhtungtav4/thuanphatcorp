<div id="wpo-main-content" class="container  clearfix">
   <div class="row">
      <div id="content">
         <div class="clear"></div>
         <div class="duongdan">
         
            <!-- BEGIN BREADCRUMBS-->
            <?php  echo $breadcumb; ?> 
            <!-- END BREADCRUMBS -->
         </div>
         
         
         
         
         
         <div class="col-xs-12 col-md-9 main-content" id="main-content">
            <section class="title-section">
               <h1 class="title-header">
                  <?php echo $title; ?>
               </h1>
            </section>
            <!-- .title-section -->
            <div class="category-image">
            </div>
            
            <div class="product_list_category">
                <?php
                foreach($list_mathang['pageList'] as $k=>$v){
                    ?>
                    <div class="post-301 product type-product status-publish has-post-thumbnail shopcol first col-xs-12 col-sm-6 col-md-3 shipping-taxable purchasable product-type-simple product-cat-lam-sach-da instock">
                      <?php echo $this->main->tooltip($v); ?> 
                   </div>
                    <?php
                }
                ?> 
            </div>
            <div class="wrapper clearfix product-bottom">
               <div class="woocommerce-result-count pull-right">
                  <!--Hiển thị tất cả 3 kết quả-->
                  <?php echo $list_mathang['paging']; ?>
               </div>
            </div>
         </div>


         <div class="col-xs-12 col-md-9 main-content" id="main-content">
            <section class="title-section">
             
            </section>
            <!-- .title-section -->
            <div class="category-image">
            </div>
            
            <div class="product_list_category">
                <?php
                foreach($list_mathangs['pageList'] as $k=>$v){
                    ?>
                    <div class="post-301 product type-product status-publish has-post-thumbnail shopcol first col-xs-12 col-sm-6 col-md-3 shipping-taxable purchasable product-type-simple product-cat-lam-sach-da instock">
                      <?php echo $this->main->tooltip($v); ?> 
                   </div>
                    <?php
                }
                ?> 
            </div>
            <div class="wrapper clearfix product-bottom">
               <div class="woocommerce-result-count pull-right">
                  <!--Hiển thị tất cả 3 kết quả-->
                  <?php echo $list_mathangs['paging']; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
 