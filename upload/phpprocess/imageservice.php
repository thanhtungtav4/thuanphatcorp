<?php 

define('PATH_UPLOAD','../');

if(isset($_GET['p'])){

  $dir = scandir('../thumb');
  if(count($dir)>50){
    echo "dang cố tình hack hoac qua nhieu folder hình";die;
  }
  createThumb();
}



function createThumb(){

    //$type=1 resize hình theo tỉ lệ rồi cắt hình, cắt từ left top
    //$type=2 resize chế độ này full tỉ lệ nhưng có thể làm méo hình
    //$type=3 resize hình theo tỉ lệ rồi cắt hình, cắt từ center middle

    $join="../";
    
    $root_uri=$_GET['p'];
    $dir_uir=pathinfo($_GET['p']);
    $dir_cr=explode("/",$dir_uir['dirname']);
    
    foreach ($dir_cr as $key => $value) {
       $array_dir[$key]=$join.$value;
       $join.=$value."/";
    }
    
    


    $option=explode("x",$dir_cr['1']);
    $width=$option[0];
    $height=$option[1];
    if(isset($option[2])){
      $type=$option[2];
    }else{
      $type=1;
    }
    
    $join="../";
    $new_image=$join.$root_uri;
    //$new_image="../thumb/300x300x3/2015/04/27/dsc_0023_08-56-41_3264x1836.jpg";

    //pr($new_image);die;
    $fullpath_exp=explode("/",$root_uri);
    $fullpath_exp2=array_slice($fullpath_exp,2);
    $path=PATH_UPLOAD."/".implode("/",$fullpath_exp2);

   
    $info_image=getimagesize($path);



    if(isset($info_image[0])){
      foreach ($array_dir as $key => $value) {
          if (!is_dir($value)) {
             if (!mkdir($value, 0777)) {
                  die('Failed to create folders...');
             }
          }
      }
    }


    $img_width=$info_image[0];
    $img_height=$info_image[1];

    $width_crop=$width;
    $height_crop=$height;
    
    if($img_width>$img_height && $width<$height){
        $width=$height*$img_width/$img_height;  
    }

    $dim1=$img_width/$img_height;
    $dim2=$width/$height;
    if($dim1>$dim2 && $dim2>1){
       // $per_size=$per_h;
      $width_rize = intval($height * $img_width / $img_height);
      $height_rize = $height;
    }else if($dim1>$dim2 && $width==$height){  

      $width_rize = intval($height * $img_width / $img_height);
      $height_rize = $height;
    }else{
        $height_rize = intval($width * $img_height / $img_width);
        $width_rize = $width;
    }


   // pr($dim1."|".$dim2);die;

    require_once 'Image_lib.php';


    $config['image_library'] = 'gd2';
    $config['source_image'] = $path;
    $config['new_image'] =$new_image;
    $config['thumb_marker'] =FALSE;
    $config['create_thumb'] = TRUE;
    $config['quality'] = "100%";
    $config['width']  = $width_rize;
    $config['height'] = $height_rize;

    $dim = (intval($img_width) / intval($img_height)) - ($img_width / $img_height);
    $config['master_dim'] = ($dim > 0)? "height" : "width";

    if($type==1){
      $config['maintain_ratio'] = TRUE;
    }else if($type==2){
      $config['width']  = $width_crop;
      $config['height'] = $height_crop;
      $config['maintain_ratio'] = FALSE;
    }else if($type==3){
      $config['x_axis'] = ($width_rize-$width_crop)/2;
      $config['y_axis'] = ($height_rize-$height_crop)/2;
    }

   // pr($config);die;

    $Image_lib=new CI_Image_lib($config);
    $Image_lib->resize();
   
    $config['source_image'] = $new_image;
    $config['width']  = $width_crop;
    $config['height'] = $height_crop;
    
    $config['maintain_ratio'] = FALSE;
    unset($config['new_image']);
    //pr($config);die;
    $Image_lib->clear();
    $Image_lib->initialize($config); 
    
   // pr($config);die;
    $Image_lib->crop();


    if(0){
        unset($config);
        $config['source_image'] = $new_image;
        $config['new_image'] =$new_image;
        $config['wm_text'] = $_SERVER['HTTP_HOST'];
        //$config['wm_font_path'] = 'font/opensans-regular-webfont.ttf'; 
        $config['wm_type'] = 'text';
        $config['wm_font_size'] = '12';
        $config['wm_font_color'] = 'FFFFFF';
        $config['wm_shadow_color'] = '000000';

        
        $config['thumb_marker'] =FALSE;
        $config['create_thumb'] = TRUE;
        $config['wm_vrt_alignment'] = 'bottom'; 
        $config['wm_hor_alignment'] = 'right';
        $config['wm_padding'] = '0';


        $config['wm_vrt_alignment'] = 'top'; 
        $config['wm_hor_alignment'] = 'left';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './logo.png';
        $config['wm_opacity'] = '50';
        
        $info_image=getimagesize($config['wm_overlay_path']);
        $config['wm_hor_offset']=$width_crop-$info_image[0]-10;
        $config['wm_vrt_offset']=$width_crop-$info_image[1]-10;
        //pr($info_image);die;

        //$config['wm_hor_offset'] = '10';
        //$config['wm_vrt_offset'] = '10';

        $Image_lib=new CI_Image_lib($config);
        //$Image_lib->clear();
        $Image_lib->initialize($config); 

        $Image_lib->watermark();
    }
    

    //echo $Image_lib->display_errors();die;

    //pr($config);die;

   

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // print_r($actual_link);die;

    header('Location: '.$actual_link);  
    //header( 'refresh: 1; url='.$new_image.'' );
}


function pr($data, $type = 0)
{
    if (1) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($type != 0) {
            exit();
        }
    }
}


?>
