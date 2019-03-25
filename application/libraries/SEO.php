<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SEO
 *
 * @author Administrator
 */
class SEO {
    /**
     * 
     * @param type $obj object
     * @param string $type category,post,video
     */
    function build_link($obj,$type='main',$data=array()){
        switch ($type) {
            case "main": 
                return base_url().remove_accent($obj->name); 
                break; 
            case "category":
               return base_url().'danh-muc/'.remove_accent($obj->name)."-".$obj->id.".html"; 
            case "sanpham": 
                return base_url()."thong-tin/".remove_accent($obj->name)."-".$obj->id.".html";  
                 case "xemtin": 
                return base_url()."tin-tuc/".remove_accent($obj->name)."-".$obj->id.".html"; 
                case "tintuc": 
                return base_url()."xem-tin/".remove_accent($obj->name)."-".$obj->id.".html";  
            case "nhamau":
               return base_url()."nha-mau/".remove_accent($obj->name)."-".($obj->id).".html"; 
            case "provider": 
                return base_url()."nha-cung-cap/".remove_accent($obj->name)."-".($obj->id);      
                break;
               
        
            default:
                return base_url().$obj->slug;
                break;
        }
    }
    public $title;
    public $name;
    public $description;
    public $keywords;
      public $tukhoa;
    function build_meta($obj,$type='home'){
        global $CFG;
        switch ($type) {
            case 'post':
                if($obj->mtitle) $this->title=$obj->mtitle;
                    else $this->title=$obj->title?$obj->title:$obj->title_short;
                if($obj->mdescription) $this->description=$obj->mdescription;
                else
                    $this->description=$obj->summary_short?$obj->summary_short:$obj->summary;
                //$this->keywords=$obj->keywords;
                $this->ogimage=$CFG->config['img_path']."470x320xt".$obj->image;
                $this->ogwidth=470;
                $this->ogheight=320;     
                $this->ogtitle=$this->title;
                $this->obdescription=$this->description;
                break;
            case 'product':       
                $this->title=$obj->name; 
                $this->ogtitle=$this->title; 
                $this->mtitle=$this->title;  
                $this->description = $obj->description?$obj->description:$obj->name;
                $this->tukhoa = $obj->tukhoa?$obj->tukhoa:$obj->name;
                $this->obtukhoa = $this->tukhoa; 
                $this->obdescription = $this->description; 
                $this->ogimage = $obj->image?$obj->image:'hinh logo'; 
            break;    
              case 'xemtin':       
                $this->title=$obj->name; 
                $this->ogtitle=$this->title; 
                $this->mtitle=$this->title;  
                $this->description = $obj->description?$obj->description:$obj->name;
                $this->obdescription = $this->description;
                $this->tukhoa = $obj->tukhoa?$obj->tukhoa:$obj->name;
                $this->obtukhoa = $this->tukhoa; 
                $this->ogimage = $obj->image?$obj->image:'hinh logo'; 
            break;    
        
            case 'category':       
                $this->title=$obj->name; 
                $this->ogtitle=$this->title; 
                $this->mtitle=$this->title;  
                $this->description = @$obj->description?$obj->description:$obj->name;
                $this->obdescription = $this->description; 
                $this->ogimage = @$obj->image_page?$obj->image_page:'hinh logo'; 
            break;   
            case 'category_post':       
                $this->title=$obj->name.' | Bài viết'; 
                $this->ogtitle=$this->title; 
                $this->mtitle=$this->title;  
                $this->description = $obj->description?$obj->description:$obj->name;
                $this->obdescription = $this->description; 
                $this->ogimage = $obj->image_page?$obj->image:'hinh logo'; 
            break;  


            default:
                if($obj->mtitle) 
                    $this->title=$obj->mtitle;
                else 
                    $this->title=$obj->name; 
                if($obj->mdescription)
                    $this->description=$obj->mdescription;
                else
                    $this->description=$obj->decription?$obj->decription:$obj->decription_short; 
                if($obj->ogtitle)
                    $this->ogtitle=$obj->ogtitle; 
                if($obj->obdescription)
                    $this->obdescription=$obj->obdescription;  
                break;
        }
    }
    function init_meta_site(){
        global $_SEO;
        /*$this->mtitle=$_SEO->obj->title?$_SEO->obj->title:$this->title;
        $this->mkeyword=$_SEO->obj->keyword?$_SEO->obj->keyword:$this->keyword;*/
        $this->mtitle=$_SEO->obj->title?$_SEO->obj->title:$this->title;
        //print_r($this);exit;
        $this->mdescription=$_SEO->obj->description?$_SEO->obj->description:$this->description;
        $this->mkeyword=$_SEO->obj->keyword?$_SEO->obj->keyword:$this->keyword;
        
        $this->ogtitle=$_SEO->obj->ogtitle?$_SEO->obj->ogtitle:$this->ogtitle;
        $this->obdescription=$_SEO->obj->obdescription?$_SEO->obj->obdescription:$this->obdescription;
    }
    function build_metavideo($obj,$type='video'){
        global $CFG;
        switch ($type) {
            case 'video':
                if($obj->mname) $this->name=$obj->mname;
                else $this->name=$obj->name;
                break;
                

            default:
                if($obj->mname) $this->name=$obj->mname;
                else 
                $this->name=$obj->namename;
                
                break;
        }
    }
    function init_meta_sitevideo(){
        global $_SEO;
        $this->mname=$_SEO->obj->name?$_SEO->obj->name:$this->name;
        $this->mkeyword=$_SEO->obj->keyword?$_SEO->obj->keyword:$this->keyword;
    }
}
