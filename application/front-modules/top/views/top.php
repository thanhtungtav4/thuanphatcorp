<sticknav>
    <div class="container-fluid " id="icon-left-menu" style="background-color: rgb(241, 241, 241);">
        <header class="header scroll-to-fixed-fixed">
            <div class="col-sx-12 header">
                <div class="container-fluid" id="icon-left-menu-2">
                    <div id="nav-sticky" class="col-sx-12">
                        <nav class="navbar navbar-expand-md" style=" padding: 0px 0px 0px 10px" >
                            <a href="<?php echo base_url();?>" class="navbar-brand" style="flex-grow: 1;"><img src="<?php echo base_url();?>themes/front/assets/logo.jpg" alt="Logo" style="width:70px;height: 70px;"></a>
                            <a id="phone-call" href="tel:0916672627" style="font-weight: 600;">
                                <span class="fa fa-phone"></span>&nbsp;0702066686         </a>
                            <div class="nav d-flex justify-content-end" >
                                <button id="btn-toggler" type="button" onclick="openNav()" >
                                    <i class="fa fa-list-ul" ></i>
                                </button>
                            </div>
                            <div id="collapsibleNavbar" class="collapse navbar-collapse justify-content-right show">
                                <div class="top-header">
                                    <a id="btn_close" class="navbar-toggler" href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
                                </div>
                                <div class="nav-right-menu">
                                    <div id="top">
                                        <form  id="frmSearch"   name="KeySearch"  action="http://localhost/thuanphatcorp/tim-kiem" method="post" >
                                            <p id="phone-hot">
                                                <a href="tel:0702066686" style="font-weight: 600;"><span class="fa fa-phone"></span>&nbsp0702066686</a>
                                            </p>

                                           <!--  <input  id="keyword" type="text" name="q" class="input-text" autocomplete="off" required>
                                            <button id="btn_hide"  class="search_header navbar-toggler aside-menu-toggle d-sm-block" type="button" >
                                                <i id="hide" class="fa fa-close"></i>
                                            </button>
                                            <button id="search" class="search_header navbar-toggler aside-menu-toggler d-sm-block"   type="submit" title="Search" type="button"   >
                                                <i id="search" class="fa fa-search"></i>
                                            </button>
                                            <button id="search-d" class="search "  type="submit" title="Search" style="display:none">
                                       <span ><i class="fa fa-search-plus"></i>
                                       </span>
                                            </button> -->
                                        </form>
                                    </div>
                                    <ul class="navbar-nav mr-auto">
                                        <li class='nav-item '><a class='nav-link' href='<?php echo base_url();?>' >Trang chủ</a></li>
  <?php
                  $SEO = $this->load->library('SEO');
                  foreach($category as $k=>$v){
                        ?>
                                        <li class='nav-item'>

                                            <a class='nav-link' href='<?php echo $SEO->build_link($v , 'category'); ?>' ><?php echo $v->name?><b class='caret'></b> </a>

                                             <?php
                              if(!empty($v->child)){
                                    ?> 
                                    <ul class='dropdown-container'>
                              
                                      <?php
                                       foreach($v->child as $k1=>$v1){
                                             ?>
                                           
                                                <li class=" "><a  href="<?php echo $SEO->build_link($v1 , 'category'); ?>" ><?php  echo $v1->name; ?></a></li>
                                           
                                             <?php
                                       } 
                                       ?> 
                                    </ul>
                                     <?php
                              } 
                              ?> 
                                        </li>

                                          <?php
                                       } 
                                       ?> 

                                    </ul>
                                </div>
                        
                            </div>
                        </nav>
                    </div>
                </div>
        </header>
    </div>
</sticknav>
<style type="text/css">
    #home-top-t{

    position: relative;

    }
</style>
<style type="text/css">@media (max-width: 1024px) and (min-width: 300px){
.dropdown-container {
    display: block;
    padding-left: 8px;
    list-style-type: none;
}}</style>