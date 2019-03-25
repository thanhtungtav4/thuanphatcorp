<div id="top" style="height: 270px;">

    <img src="http://localhost/thuanphatcorp/css/plusda01/images/pane_gioithieu.jpg" alt="" style="margin-left: -8.5px; margin-top: 120px;">

    <h2 id="title_page">Tin tức</h2>

  </div>
  <div id="center">

    <div class="container">

      <div id="layout_new">

        <div id="title"><h1>Tin tức</h1></div>


               
       <?php
       $SEO = $this->load->library('SEO');
                foreach($list_tintuc as $k=>$v){
                    ?> 
        
        <div class="new">

          <div class="pack">

            <a href="<?php echo $SEO->build_link($v , 'tintuc'); ?>"> <img src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="<?php echo $v->name ?>"></a>

            <h3><?php echo $v->name ?></h3>

            <p><?php echo $v->description ?></p>

            <div class="view_new">

              <a href="<?php echo $SEO->build_link($v , 'tintuc'); ?>"> Chi tiết</a>

            </div>

          </div>

        </div>
         <?php
                }
                ?>   

        
        <div class="clphantrang"></div>

        




        

      </div>


      <div style="clear:both;">

        

      </div>



    </div>

  </div>