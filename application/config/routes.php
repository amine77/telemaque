<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['^(panier)(/:any)?$'] = "front/$0";


$fichier = file(APPPATH . "config/infodatabase.txt");
if (trim($fichier[3]) == '') {
    $route['default_controller'] = 'Init';
    $route['(:any)'] = "init";
    $route['(:any)/(:any)'] = "init";
    $route['2'] = "init/index/2";
    $route['(:any)/(:any)/(:any)'] = "init";
    $route['404_override'] = "init";
    
} else {
    $route['default_controller'] = 'home';
    $route['^(vendeurs)/(select_product)'] = "vendeurs/select_product";
    $route['^(vendeurs)/(select_cat)'] = "vendeurs/select_cat";
    $route['^(vendeurs)/(:any)'] = "vendeurs/liste_vendeurs_article/$0";
    $route['^(nouvelle-vente)'] = "vendeurs/nouvelle_vente";
    $route['^(nouvelle-vente)/(:any)'] = "vendeurs/nouvelle_vente/$0";
    $route['^(nouvelle-vente-art)'] = "vendeurs/nouvelle_vente_art";
    $route['^(nouvelle-vente-art)/(:any)'] = "vendeurs/nouvelle_vente_art/$0";
    $route['^(facture)/(:any)'] = "panier/facture/$0";
    $route['^(articles)/(:any)'] = "articles/index/$0";
    $route['^(search)/(:any)'] = "search/index/$0";
    $route['^(articles)/(:any)/(:any)'] = "articles/index/$0/$1";
    $route['^(usr)/(:any)'] = "usr";
    $route['^(view)/(:any)'] = "home/view/$0";
    $route['^(connexion)'] = "login";
    $route['^(logout)'] = "home/logout";
    $route['^(contact)'] = "home/contact";
    $route['^(cgv)'] = "home/cgv";
    $route['^(legal_notice)'] = "home/legal_notice";
}
/*
$route['(:any)'] = "front/$1";
$route['(:any)/(:any)'] = "front/$1/$1";
$route['(:any)/(:any)/(:any)'] = "front/$1/$1/$1";*/
