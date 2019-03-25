<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
if(APP_TYPE=='admin'){
$route['default_controller'] = "welcome";
$route['404_override'] = ''; 

//$route['(:num)-(:any).html'] = "providers/index/pro_id/$1";
}else{
    
    
$route['default_controller'] = "welcome";
$route['404_override'] = '';


$route['tim-kiem/(:any)'] = "product/search/$1";
$route['tim-kiem/(:any)/(:num)'] = "product/search/$1";  

$route['thong-tin/(:any)-(:num)'] = "product/index/$2";  
$route['danh-muc/(:any)-(:num)'] = "category/index/$2";
$route['tin-tuc/(:any)-(:num)'] = "tintuc/index/$2";  
$route['category/(:any)-(:num)/(:num)'] = "category/index/$2"; 
$route['xem-tin/(:any)-(:num)'] = "xemtin/index/$2";
$route['khuyen-mai'] = "category/khuyenmai";
$route['khuyen-mai/(:num)'] = "category/khuyenmai";
$route['nha-mau/(:any)-(:num)'] = "nhamau/index/$2";
 $route['pages/lien-he'] = "pages/index/1";
   
}
//$route['providers/([a-z]+)/(\d+)'] = "$1/id_$2";products/shirts/123


/* End of file routes.php */
/* Location: ./application/config/routes.php */