<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_text_helper
 *
 * @author Administrator
 */
function remove_accent($strAccent = "", $sepchar = "-",$remove_special=true) {
		
		$strfrom 	= " Á À Ả Ã Ạ Â Ấ Ầ Ẩ Ẫ Ậ Ă Ắ Ằ Ẳ Ẵ Ặ Đ É È Ẻ Ẽ Ẹ Ê Ế Ề Ể Ễ Ệ Í Ì Ỉ Ĩ Ị Ó Ò Ỏ Õ Ọ Ơ Ớ Ờ Ở Ỡ Ợ Ô Ố Ồ Ổ Õ Ộ Ú Ù Ủ Ũ Ụ Ư Ứ Ừ Ử Ữ Ự Ý Ỳ Ỷ Ỹ Ỵ /";
		$strto		= " A A A A A A A A A A A A A A A A A D E E E E E E E E E E E I I I I I O O O O O O O O O O O O O O O O O U U U U U U U U U U U Y Y Y Y Y _";
		
		$strfrom 	.= " á à ả ã ạ â ấ ầ ẩ ẫ ậ ă ắ ằ ẳ ẵ ặ đ é è ẻ ẽ ẹ ê ế ề ể ễ ệ í ì ỉ ĩ ị ó ò ỏ õ ọ ơ ớ ờ ở ỡ ợ ô ố ồ ổ ỗ ộ ú ù ủ ũ ụ ư ứ ừ ử ữ ự ý ỳ ỷ ỹ ỵ";
		$strto		.= " a a a a a a a a a a a a a a a a a d e e e e e e e e e e e i i i i i o o o o o o o o o o o o o o o o o u u u u u u u u u u u y y y y y";
        $specialchar = '';
		$fromarr = explode(" ", $strfrom);
		$toarr = explode(" ", $strto);
		
		$dicarr = array();
		for($i=1;$i<count($fromarr);$i++) {
			$dicarr[$fromarr[$i]] = $toarr[$i];
		}
		$strNoAccent = strtr($strAccent,$dicarr);
		$strNoAccent=preg_replace("/\s+/"," ",$strNoAccent);
                $strNoAccent=preg_replace("/\-+/","-",$strNoAccent);
		$strNoAccent=preg_replace("/^\s+/","",$strNoAccent);
		$strNoAccent=preg_replace("/\s+$/","",$strNoAccent);
		$strNoAccent=str_replace('"',"",$strNoAccent);
		if($remove_special){
			// Remove special character
			
			$specialchar .= "&acute; &grave; &circ; &tilde; &cedil; &ring; &uml; &amp; &quot; ";
			$specialchar  .= ", ? : ! < > & * ^ % $ # @ ; ' ( ) { } [ ] + ~ = 39 / 33 ’ \" '";
			$specialcharArr = explode(" ",$specialchar);
			$strNoAccent = str_replace($specialcharArr,"",$strNoAccent);
		}
		if($sepchar) {
			$strNoAccent = str_replace(array(" ",".","-"),$sepchar, $strNoAccent);
			 $strNoAccent=preg_replace("/\-+/","-",$strNoAccent);//echo $strNoAccent;die();
			//$strNoAccent = str_replace($sepchar.$sepchar,$sepchar,$strNoAccent);
		}
			if($sepchar==" ") $sepchar="\s";
		return strtolower(preg_replace("/[^A-Za-z0-9,!_,!$sepchar]/i", "",$strNoAccent));
	}
function cut_string($string = "", $num = 20){	
            if(function_exists("mb_strlen")){
                if(mb_strlen($string,"UTF-8") > $num)
                 {
                     $result = mb_substr($string,0,$num+1,"UTF-8"); //cut string with limited number
                     $position = mb_strrpos($result," ",null,"UTF-8"); //find position of last space
                     if($position)
                             $result = mb_substr($result,0,$position,"UTF-8"); //cut string again at last space if there are space in the result above    	
                     $result .= ' ...';
                 }
                 else {
                     $result = $string;    	
                 }    
                 return $result;
            }
             if(strlen($string) > $num)
                 {
                     $result = substr($string,0,$num+1); //cut string with limited number
                     $position = strrpos($result," ",null); //find position of last space
                     if($position)
                             $result = substr($result,0,$position); //cut string again at last space if there are space in the result above    	
                     $result .= ' ...';
                 }
                 else {
                     $result = $string;    	
                 }    
                 return $result;
}

function my_text_helper_get_row($where) {
    $CI = & get_instance();
    $videos = $CI->load->model('videos/public_videos_model');
    $videos->select('*');
    $videos->from($videos->table_name);
    $videos->where($where);
    return $videos->get()->result();
}
function time_to_iso8601_duration($time) {
    $units = array(
        "Y" => 365*24*3600,
        "D" =>     24*3600,
        "H" =>        3600,
        "M" =>          60,
        "S" =>           1,
    );

    $str = "P";
    $istime = false;

    foreach ($units as $unitName => &$unit) {
        $quot  = intval($time / $unit);
        $time -= $quot * $unit;
        $unit  = $quot;
        if ($unit > 0) {
            if (!$istime && in_array($unitName, array("H", "M", "S"))) { // There may be a better way to do this
                $str .= "T";
                $istime = true;
            }
            $str .= strval($unit) . $unitName;
        }
    }

    return $str;
}


function decToFraction($float) {
    // 1/2, 1/4, 1/8, 1/16, 1/3 ,2/3, 3/4, 3/8, 5/8, 7/8, 3/16, 5/16, 7/16,
    // 9/16, 11/16, 13/16, 15/16
    $whole = floor ( $float );
    $decimal = $float - $whole;
    $leastCommonDenom = 48; // 16 * 3;
    $denominators = array (2, 3, 4, 8, 16, 24, 48 );
    $roundedDecimal = round ( $decimal * $leastCommonDenom ) / $leastCommonDenom;
    if ($roundedDecimal == 0)
        return $whole;
    if ($roundedDecimal == 1)
        return $whole + 1;
    foreach ( $denominators as $d ) {
        if ($roundedDecimal * $d == floor ( $roundedDecimal * $d )) {
            $denom = $d;
            break;
        }
    }
    return ($whole == 0 ? '' : $whole) . " " . ($roundedDecimal * $denom) . "/" . $denom;
}
function pr($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}
function ConvertDayVN($key='Mon'){
	$daytext = array(   
		'Mon'   => 'Thứ 2',
		'Tue'   => 'Thứ 3',
		'Wed'   => 'Thứ 4',
		'Thu'   => 'Thứ 5',
		'Fri'   => 'Thứ 6',
		'Sat'   => 'Thứ 7',
		'Sun'   => 'Chủ Nhật',
	);
	return $daytext[$key];
}
function ConvertTypeU($key='1'){
  $type = array(   
    '2'   => 'Kinh doanh',
    '3'   => 'Kỹ Thuật',
  );
  return $type[$key];
}
function OrderTypeU($key='0'){
  $type = array(   
    '0'   => 'Chưa xác nhận',
    '1'   => 'Xác nhận đơn hàng',
    '2'   => 'Đang giao hàng',
    '3'   => 'Đã thanh toán',
    '4'   => 'Hoàn tất đơn hàng',
  );
  return $type[$key];
}
function getWeekForDate($date, $weekStartSunday = false){

    $timestamp = strtotime($date);

    // Week starts on Sunday
    if($weekStartSunday){
        $start = (date("D", $timestamp) == 'Sun') ? date('Y-m-d', $timestamp) : date('Y-m-d', strtotime('Last Sunday', $timestamp));
        $end = (date("D", $timestamp) == 'Sat') ? date('Y-m-d', $timestamp) : date('Y-m-d', strtotime('Next Saturday', $timestamp));
    } else { // Week starts on Monday
        $start = (date("D", $timestamp) == 'Mon') ? date('Y-m-d', $timestamp) : date('Y-m-d', strtotime('Last Monday', $timestamp));
        $end = (date("D", $timestamp) == 'Sun') ? date('Y-m-d', $timestamp) : date('Y-m-d', strtotime('Next Sunday', $timestamp));
    }

    return array('start' => $start, 'end' => $end);
}


function list_icon_sp($key='0'){ 
	$list_icon = array(
		'1' => THEME_FRONT . 'image/catalog/icon_camera.png',
		'2' => THEME_FRONT . 'image/catalog/icon_dauthu.png',
		'3' => THEME_FRONT . 'image/catalog/icon_dauthu_04.png',
		'4' => THEME_FRONT . 'image/catalog/icon_dauthu_05.png',
		'5' => THEME_FRONT . 'image/catalog/cat_cf48adbcc24dd52850830b617fdce703.png',
		'6' => THEME_FRONT . 'image/catalog/cat_80fc29d6aefc322cceb8fce7a99db34c.png',
		'7' => THEME_FRONT . 'image/catalog/cat_1073e9906b9dd89e0e453d1bc5ec4212.png',
		'8' => THEME_FRONT . 'image/catalog/cat_09fbc57e68da32b30775f5af3239578d.png',
	);
	if($key == 0){
	  	return $list_icon;
	}else{
		return $list_icon[$key];
	}
}
function list_icon_bv($key='0'){ 
	$list_icon = array(
		'1' => 'http://camerano1.com/themes/front/image/icon/news.png',
		'2' => 'http://camerano1.com/themes/front/image/icon/icon-camera-128.png',
		'3' => 'http://camerano1.com/themes/front/image/icon/video-camera-9.png',
	);
	if($key == 0){
	  	return $list_icon;
	}else{
		return $list_icon[$key];
	}
}
function list_num_row_product_show_home($key='0'){
	$list_num_row_product_show_home = array(
		'1' => 2,
		'2' => 3,
		'3' => 4,
		'4' => 6,
		'5' => 12,
	);
	if($key == 0){
	  	return $list_num_row_product_show_home;
	}else{
		return $list_num_row_product_show_home[$key];
	}
}





