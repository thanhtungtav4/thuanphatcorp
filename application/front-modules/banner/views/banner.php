 <section id="content">
            <div class="clearfix" id="hotline">
               <div class="phone-icon"><img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-phone_icon.png"></div>
               <div class="hotline"><span class="title">Hotline</span><span class="phone-number"><a href="tel:0903389473 ">090 338 9473</a></span></div>
               <div class="facebook"><a href="https://www.facebook.com/Unniqueland2018/" title="Facebook" target="_blank"><img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-facebook_icon.png"></a></div>
            </div>
            <div class="container-fluid" id="sliderWrapper">
               <div class="row">
                  <div class="main-slider">
                     <?php
       $SEO = $this->load->library('SEO');
                foreach($list_banner as $k=>$v){
                    ?>
                     <div class="item"><img src="<?php echo FOLDER_GET_IMAGE.$v->image?>"/></div>
                    
                     <?php 
                                 }
                                          ?>
                  </div>
                  <div class="slider-footer">
                     <div class="slider-footer-wrapper clearfix">
                        <div class="sf-center">
                           <img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-slider_bottom_2.png">
                           <div class="play-btn"></div>
                        </div>
                        <div class="sf-left col-xs-6">
                           <div class="image-wrapper"><img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-slider_bottom_1.png"></div>
                           <div class="subscribe-wrapper">
                              <div class="subscribe"><a href="#">Đăng Ký Nhận Thông Tin</a></div>
                           </div>
                        </div>
                        <div class="sf-right col-xs-6">
                           <div class="image-wrapper"><img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-slider_bottom_3.png"></div>
                           <div class="contact-wrapper">
                              <div class="contact"><a href="#">Liên Hệ Với Chúng Tôi</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>