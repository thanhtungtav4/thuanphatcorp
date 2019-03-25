        <div class="pb-nivo-slider">
                           <div class="pb-preloader" id="pb_nivo_slider_73D463C76B6B02E08B8E68495FA20039">
                              <?php
                                                foreach($list_galery as $k=>$v){
                                                    ?> 
                              <div class="pb-image-box pb-image-preloader">
                                 <div class="pb-image"><img src="<?php  echo FOLDER_GET_IMAGE.$v->image; ?>" alt="" data-thumb="<?php  echo FOLDER_GET_IMAGE.$v->image; ?>"/></div>
                              </div>
                           <?php    
                                                }
                                                ?>
                           </div>
                        </div>