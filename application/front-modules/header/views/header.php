<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
   <!--  <title>Giám Đốc Sàn .Com</title> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php 

  $SEO = $this->load->library("SEO");

  $page_title = ($SEO->mtitle ? ($SEO->mtitle . " |") : "") . "thuanphatcorp";
  ?>  <title><?php echo $page_title; ?></title>
     <?php
       $SEO = $this->load->library('SEO');
                foreach($cauhinh as $k=>$v){
                    ?> 
      <meta name="title" content=" <?php echo $v->tieude?>" />
      <meta name="description" content="<?php echo $v->description?>" />
      <meta name="RATING" content="GENERAL" />
       <meta name="keywords" content="<?php echo $v->tukhoa?>"/>
      <meta property="og:title" content="<?php echo $v->tieude?>" />
      
      <meta property="og:site_name" content="<?php echo $v->tukhoa?>">
      <meta property="og:description" content="<?php echo $v->description?>" />
      <meta property="og:image" content="<?php echo FOLDER_GET_IMAGE.$v->image?>" />
      
      <link rel="icon" href="<?php echo FOLDER_GET_IMAGE.$v->image?>" />
<link rel="icon" href="<?php echo FOLDER_GET_IMAGE.$v->image?>" />
 <?php 
                                 }
                                          ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="http://localhost/thuanphatcorp/themes/front/assets/js/gallary.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/thuanphatcorp/themes/front/assets/css/style_category.css">
    <link rel="stylesheet" href="http://localhost/thuanphatcorp/themes/front/assets/css/style_home.css">
    <link rel="stylesheet" href="http://localhost/thuanphatcorp/themes/front/assets/css/style_footer.css">
    <link rel="stylesheet" href="http://localhost/thuanphatcorp/themes/front/assets/css/style_news.css">
    <link rel="stylesheet" href="http://localhost/thuanphatcorp/themes/front/assets/css/style_lienhe.css">
     <script> var baseurl = '<?php echo base_url();?>';</script>
     <script type="text/javascript" src="<?php echo  base_url(); ?>cart.js"></script>
</head>
