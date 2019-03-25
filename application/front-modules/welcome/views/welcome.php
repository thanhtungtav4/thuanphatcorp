<div class="top-main ">
    <div id="home-top-t">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <ol class="carousel-indicators" style="z-index:1">
                   <?php
       $SEO = $this->load->library('SEO');
                foreach($list_banner as $k=>$v){
                    ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php $k ?>" class="<?= $k==0?'active':'' ?>" ></li>
                
                <?php 
                                 }
                                          ?>
            </ol>
            <div class="carousel-inner">
                    <?php
       $SEO = $this->load->library('SEO');
                foreach($list_banner as $k=>$v){
                    ?>
                <div class="carousel-item <?= $k==0?'active':'' ?>">
                    <li>
                        <a href="#">
                            <img class="d-block w-100" src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="" >
                            <div class="carousel-caption " >
                        <?= !empty($v->file)?"<p>$v->file</p>":''?>
                               
                            </div>
                        </a>
                    </li>
                </div>
                  <?php 
                                 }
                                          ?>
               
                    
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-----END Banner-->
        <!--APP BODY-->
        <main class="main">
            <div class="block-news">
                <div class="container ">
                    <div class="row" style="margin-right: -12px;margin-left: -12px">
                        <div class="Content">
                            <div class="col-sx-12">
                                <div class="block-specialNews">
                                    <h1 class="title-h">Tin Tức</h1>
                                    <div class="row" style="margin-right: -12px;margin-left: -12px">
                                         <?php
       $SEO = $this->load->library('SEO');
                foreach($list_tintuc as $k=>$v){
                    ?>
                                        <div class="col-xs-12 col-md-6 col-lg-3 mrb30">
                                            <div class="item-newSpecial">
                                                <figure>
                                                    <a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>">
                                                        <img class="thumb_art" src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="<?php echo $v->name?>">
                                                    </a>
                                                    <figcaption>
                                                        <h3><a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>"><?php echo $v->name?></a></h3>
                                                        <div class="brief">
                                                            <div class="autoCutStr_160"><?php echo $v->description ?></div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                        <?php 
                                 }
                                          ?>
               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-projects">
                <div class="container ">
                    <div class="row" style="margin-right: -12px;margin-left: -12px">
                        <div class="Content">
                            <div class="col-sx-12">
                                <div class="block-projectsList" style="padding-top:40px;text-align: center">
                                    <h1 class="title-h" style="text-align: center !important;padding: 0px;font-size:25px">Thi Công Trọn Gói Nội Thất</h1>
                                    <div class="row" style="margin-right: -12px;margin-left: -12px">
<?php
       $SEO = $this->load->library('SEO');
                foreach($list_lvhd as $k=>$v){
                    ?>
                                          <div class="col-xs-12 col-md-6 col-lg-3 mrb30">
                                            <div class="item-prj1">
                                                <figure>
                                                    <a href="<?php echo $SEO->build_link($v , 'sanpham'); ?>" target="_self">
                                                        <img src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="<?php echo $v->name?>">
                                                    </a>
                                                    <figcaption>
                                                        <div class="middle">
                                                            <div class="text"><li style="list-style: none;"><a href="<?php echo $SEO->build_link($v , 'sanpham'); ?>">Xem thêm</a></li><li></li></div>

                                                        </div>
                                                        <h3>
                                                            <a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>" title="<?php echo $v->name?>"><?php echo $v->name?></a>
                                                        </h3>
                                                        <div class="desc"><?php echo $v->name?></div>
                                                        <div class="desc"><?php echo $v->description ?></div>
                                                    </figcaption>
                                                </figure>
                                                <li style="list-style: none;"><a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>">   </a></li><li>
                                                </li></div>
                                        </div>
                                        <?php 
                                 }
                                          ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-projects">
                <div class="container ">
                    <div class="row" style="margin-right: -12px;margin-left: -12px">
                        <div class="Content">
                            <div class="col-sx-12" >
                                <div class="block-projectsList" style="margin-top:50xp">
                                    <h3 class="title-h" style="font-family:Roboto;font-size:25px;font-weight:550; padding-bottom:15px;text-align:center">Lĩnh Vực Hoạt Động</h3>
                                    <div class="row" style="margin-right: -12px;margin-left: -12px;padding-top: 25px">
                                        <?php
       $SEO = $this->load->library('SEO');
                foreach($list_lvhd as $k=>$v){
                    ?>
                                        <div class="col-xs-12 col-md-6 col-lg-4 mrb30">
                                            <div class="item-prj">
                                                <figure>
                                                    <a href="<?php echo $SEO->build_link($v , 'category'); ?>" target="_self">
                                                        <img class="hvr-grow" src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="<?php echo $v->name?>">
                                                    </a>
                                                    <figcaption>
                                                        <h3>
                                                            <a href="<?php echo $SEO->build_link($v , 'category'); ?>" target="_self" title="<?php echo $v->name?>"><?php echo $v->name?></a>
                                                        </h3>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                        <?php 
                                 }
                                          ?>
                                    </div>
                                </div>
                                <div class="block-specialNews" style="margin-bottom:70px">
                                    <h1 class="title-h">Các Công Trình Đã Làm</h1>
                                    <div class="row" style="margin-right: -12px;margin-left: -12px">
                                        <?php
       $SEO = $this->load->library('SEO');
                foreach($list_ctdl as $k=>$v){
                    ?>
                                        <div class="col-xs-12 col-md-6 col-lg-3 mrb30">
                                            <div class="item-newSpecial">
                                                <figure>
                                                    <a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>">
                                                        <img class="thumb_art" src="<?php echo FOLDER_GET_IMAGE.$v->image?>" alt="<?php echo $v->name?>">
                                                    </a>
                                                    <figcaption>
                                                        <h3><a target="_self" href="<?php echo $SEO->build_link($v , 'sanpham'); ?>" title="3 linh vật phong thủy mang lại tài lộc trong năm mới"><?php echo $v->name?></a></h3>
                                                        <div class="brief">
                                                            <div class="autoCutStr_160"><?php echo $v->description ?></div>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                           <?php 
                                 }
                                          ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
   