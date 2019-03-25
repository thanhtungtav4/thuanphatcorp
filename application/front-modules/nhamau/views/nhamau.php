
   
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-96192293-1', 'auto');
         ga('require', 'GTM-5WPQ3WJ');
         ga('send', 'pageview');
         
      </script>
      <div id="page-wrapper">
       
         <section id="content">
            <div class="clearfix" id="hotline">
               <div class="phone-icon"><img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-phone_icon.png"></div>
               <div class="hotline"><span class="title">Hotline</span><span class="phone-number"><a href="tel:0903389473 ">090 338 9473</a></span></div>
               <div class="facebook"><a href="https://www.facebook.com/Unniqueland2018/" title="Facebook" target="_blank"><img src="http://localhost/thuanphatcorp/themes/front/wp-content/themes/TheWesternCapital2/img/Thewesterncapital-facebook_icon.png"></a></div>
            </div>
            <div class="container">
               <div class="library" id="library-images">
                  <div class="tabs">
                     <div class="tabs-wrapper">
                        <h3 class="active"><a href="">Hình Ảnh</a></h3>
                      <!--   <h3><a href="//nha-mau-video.html">Videos</a></h3> -->
                     </div>
                  </div>
                  <div class="image-list">
                     <div class="row">
                        <?php
     $SEO = $this->load->library('SEO');
     foreach($list_nhamau_related as $k=>$v){
      ?> 
                        <div class="image col-xs-6 col-sm-4" style="background-image: url(<?php echo FOLDER_GET_IMAGE.$v->image?>);">
                           <div class="overlay" href="<?php echo FOLDER_GET_IMAGE.$v->image?>" data-fancybox="group" data-caption=""></div>
                           <span class="caption"></span>
                        </div>
                       <?php 
   }
   ?> 
                     
                 </div>
              </div>
           </div>
        </div>
     </section>
  </div>
  