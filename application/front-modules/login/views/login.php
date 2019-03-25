<div id="wpo-main-content" class="container  clearfix">
   <div class="row">
      <div id="content">
         <div class="clear"></div>
         <div class="duongdan">
            <!-- BEGIN BREADCRUMBS-->
            <?php echo $breadcumb; ?>
            <!-- END BREADCRUMBS -->
         </div>


         <?php echo Modules::run('left'); ?> 
         <div class="col-xs-12 col-md-9 main-content" id="main-content">
            <section class="title-section">
            	<h1 class="title-header">Đăng nhập</h1>
            </section>
            <div id="post-16" class="post-16 page type-page status-publish hentry">
                <b style="color: red;"><?php echo $error;?></b>
                <form method="post" class="login"> 
                	<p>Dành cho thành viên đã đăng ký, mọi chi tiết vui lòng liên hệ hot-line.</p>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                				<label for="username">Tên đăng nhập hoặc email <span class="required">*</span></label>
                				<input type="text" class="input-text form-control" name="user" id="user">
                			</div>
                		</div>
                		<div class="col-md-6">
                			<div class="form-group">
                				<label for="password">Mật khẩu <span class="required">*</span></label>
                				<input class="input-text form-control" type="password" name="pass" id="pass">
                			</div>
                		</div>
                	</div>	
                
                	
                	<div class="form-group">
                				
                        <input type="submit" class="button" name="login" value="Đăng nhập">
                	
                	</div>  
                </form>
                
                
            </div>
         </div>
      </div>
   </div>
</div>