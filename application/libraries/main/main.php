<?php

class Main extends MX_Controller {

  

    public function __construct() { 
    }
 
    function get_id_url($url, $sep = "-") {
        $url = str_replace(".html", "", $url);
        $url = explode($sep, $url);
        $id = $url[count($url) - 1];
        return is_numeric($id) ? $id : 0;
    }

    public function check_ip_client() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $_SERVER['REMOTE_ADDR'] = $ip;
        return $ip;
    }

    //convert s -> H:i:s
    public function convertSecondToTime($s) {
        $h = intval($s / 3600);
        $i = intval(($s - (3600 * $h)) / 60);
        $s = ($s - ((3600 * $h) + (60 * $i)));
        return $h . ':' . $i . ':' . $s;
    }

    // convert s -> i:s
    public function convertSecondToMinute($s, $returnS = false) {
        $i = intval($s / 60);
        if ($returnS) {
            $s = $s - ($i * 60);
            return $i . ':' . $s;
        }
        return $i;
    }

    public function breadcrumb(array $data, $name = '') {
        
        $name = ucfirst(strtolower($name));
        
        
        $html = '<ul class="breadcrumb">';
        $html .= '<li itemtype = "http://data-vocabulary.org/Breadcrumb" itemscope><a href = "'.base_url().'" itemprop = "url"><span itemprop = "title">Trang chủ</span></a></li>';
        if (!empty($data)) {
            $count = count($data); 
            for ($i = 0; $i < $count; $i++) {
                $data[$i]['name'] = ucfirst(strtolower($data[$i]['name']));
                $html .= '<li itemtype = "http://data-vocabulary.org/Breadcrumb" itemscope><a href = "' . base_url($data[$i]['url']) . '" itemprop = "url"><span itemprop = "title">' . $data[$i]['name'] . '</span></a></li>';
            }
        }
        if (!empty($name)) {
            $html .= '<li itemtype="http://data-vocabulary.org/Breadcrumb" class="active" ><span itemprop="title">' . $name . '</span></li>';
        }
        $html .= '</ul>';
        return $html;
    } 
    public function tooltip($data) {
        $SEO = $this->load->library('SEO');
        $result = '';
        if (!empty($data)) { 
            $result = '<div class="theme-post-section-preambule">';
            $result .= '<div class="pb-image-box pb-image-preloader-animation-enable pb-image-hover pb-image-hover-type-fade" style="height: auto; background-image: none;">';
            $result .= ' <a href="'.$SEO->build_link($data,"sanpham").'" class="pb-image" title="' . $name . '" style="opacity: 1;">';
            $result .= ' <img width="690" height="414" src="'.FOLDER_GET_IMAGE.$data->image.'" class="attachment-image-690-414 wp-post-image" alt="djasjn  dsadas ffdsfn">                                            <span style="opacity: 0;"><span><span></span></span></span>';
            $result .= '</a>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<div class="theme-post-section-header">';
            $result .= '<h4 class="theme-post-header">';
            $result .= ' <a href="'.$SEO->build_link($data,"sanpham").'" title="' . $name . '">'.$data->name.'</a>';
            $result .= '  </h4>';
            $result .= '    <div class="theme-post-date">';
            $result .= ' <a href="'.$SEO->build_link($data,"sanpham").'" title="Viev all posts from &quot; &quot;"> '.$data->create_date.'</a>';
            $result .= ' </div>';
            $result .= ' </div>';
            $result .= '  <div class="theme-post-section-content">';
            $result .= ' <div class="theme-post-content"><p> '.$data->description.' <span class="excerpt-more"> <a href="'.$SEO->build_link($data,"sanpham").'" title="Continue reading post &quot;Học sinh Tây Úc cắm hoa, trang trí báo tường mừng 20-11&quot;">[…]</a></span></p>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= ' <div class="clear-fix"></div>';                    
            $result .= ' <div class="theme-post-section-divider">';                
            $result .= ' <div class="theme-post-divider"></div>';
            $result .= '  </div>';
            
        }
        return $result;
    }
    
    public function baivietmoinhat($data) {
        $SEO = $this->load->library('SEO');
        $result = '';
        if (!empty($data)) { 
            $result = '<a href="'.$SEO->build_link($data,"sanpham").'" title="'.$data->name.' " class="btn btn-success" data-original-title="'.$data->name.' ">Chi tiết <i class="fa fa-angle-double-right"></i></a>';
           
          
            
        }
        return $result;
    }

    public function link($data) {
        $SEO = $this->load->library('SEO');
        $result = '';
        if (!empty($data)) { 
            $result = ' href="'.$SEO->build_link($data,"sanpham").'';
           
          
            
        }
        return $result;
    }
  
    
    public function paging($base_url, $total, $per_page, $uri_segment, $num_links = 3, $cur_page = 0, $prefix = '') {
        $this->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['num_links'] = $num_links;
        $config['uri_segment'] = $uri_segment;
        $config['first_tag_open'] = '<li class="first">';
        $config['first_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="last">';
        $config['last_tag_close'] = '</li>';
        if ($cur_page !== 0 && is_numeric($cur_page)) {
            $config['cur_page'] = $cur_page;
        }
        if (!empty($prefix)) {
            $config['prefix'] = 'trang-';
        }
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    public function getCurrentUrlWithQuery($md5 = 1, $query = 1) {
        $currentUrl = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . str_replace('\\', '/', $_SERVER['REQUEST_URI']);
        $queryUrl = http_build_query($_GET, '', "&");
        if ($query === 1 && $queryUrl !== '') {
            $currentUrl .= '?' . $queryUrl;
        }
        $currentUrl = rtrim(trim($currentUrl), '/');
        if ($md5) {
            $currentUrl = md5($currentUrl);
        }
        return $currentUrl;
    }

    public function getNameContent($str) {
        $arr = explode('(', $str);
        $result['name_main'] = (isset($arr[1])) ? substr($str, 0, strpos($str, "(")) . substr($str, strpos($str, ')') + 1, strlen($str)) : $str;
        $result['name_ext'] = (isset($arr[1])) ? substr($str, strpos($str, "(") + 1, strpos($str, ")") - strpos($str, "(") - 1) : '';

        $result['name_main'] = trim($result['name_main']);
        $result['name_ext'] = trim($result['name_ext']);
        return $result;
    }

    public function getNameFullTextSearch($str) {

        $str = trim($str);
        $arr = array();
        $arr = explode('-', $str);
        foreach ($arr as $k => $v) {
            if (strlen($v) == 1)
                $arr[$k] = $v . '00';
            if (strlen($v) == 2)
                $arr[$k] = $v . '0';
        }
        $str = implode('-', $arr);
        return $str;
    }

    public function btn_facebook($url) {
        echo '<div class="widget-social"><div class="fanpage">';
        echo '<div class="fb-like" data-href="' . $url . '" data-layout="button_count" data-action="like" data-width="180" data-show-faces="true" data-share="true"></div>';
        echo '<div class="g-plus" data-action="share" data-href="' . $url . '" data-annotation="none"></div>';
        echo '</div></div>';
    }
   
    public function fanpage() {
        echo '<div class="box sb-box fb-page">';
        echo '<div class="fb-page" data-href="https://www.facebook.com/VNmegabox?ref=ts&amp;amp;fref=ts" data-width="300" data-height="520" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/VNmegabox?ref=ts&amp;amp%3Bfref=ts"><a href="https://www.facebook.com/VNmegabox?ref=ts&amp;amp%3Bfref=ts">Megabox.vn</a></blockquote></div></div>';
        echo '</div>';
    }
 
    public function formatView($num) {
        return number_format($num, 0, ',', '.');
    } 

}

?>