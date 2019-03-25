<div class="theme-page-content theme-clear-fix theme-main theme-page-sidebar-enable theme-page-sidebar-right">
                        <div class="theme-column-left">
    <div class="theme-clear-fix">
        <div class="theme-category-name theme-clear-fix">
            <h4> <?php  echo $breadcumb; ?> </h4>
            </div>
        <ul class="theme-reset-list theme-clear-fix theme-blog">
            
            <?php
                foreach($list_mathang['pageList'] as $k=>$v){
                    ?>
                    
                        <li id="post-6901" class="theme-clear-fix theme-post theme-post-type-image post-6901 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
                           
                            <?php echo $this->main->tooltip($v); ?>
                            
                        </li>
                            <?php
                }
                ?> 
                </ul>

    
				<div class="theme-blog-pagination-box">
					<div class="theme-blog-pagination">
						<span class="page-numbers current">1</span>
<a class="page-numbers" href="page/2/index.html">2</a>
<a class="page-numbers" href="page/3/index.html">3</a>
<span class="page-numbers dots">…</span>
<a class="page-numbers" href="page/17/index.html">17</a>
<a class="next page-numbers" href="page/2/index.html">Next</a>
					</div>
				</div>
			
    </div>
                    </div>
        <div class="theme-column-right"><div id="ft_widget_post_recent-3" class="widget_ft_widget_post_recent theme-clear-fix theme-widget"><h6 class="pb-header"><span class="pb-header-content">Tin Tức và Sự Kiện Mới</span><span class="pb-header-underline"></span></h6>			<div class="widget_theme_widget_post_most_recent theme-clear-fix" id="widget_theme_widget_post_most_recent_109570B1C65B631BAD5A99DB5ACF388D">
				
				<ul class="theme-reset-list">
                                    <?php
                                                   foreach($list_tintucmoi as $k=>$v){
                                                        ?>
					<li class="theme-clear-fix">
						
                                                
						  <?php echo $this->main->baivietmoinhat($v); ?>
						
					</li>			
					<?php
                                           }
                                       ?>
				</ul>
				
			</div>
</div></div>	
        </div>