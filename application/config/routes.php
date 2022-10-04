<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['status'] = 'status';

$route['metricas/restaurantes_favoritos'] = 'metricas/restaurantes_favoritos';
$route['metricas/comidas_favs'] = 'metricas/comidas_favs';

$route['metricas/dinero_restaurante'] = 'metricas/dinero_restaurante';
$route['metricas/dinero_restaurantes_total'] = 'metricas/dinero_restaurantes_total';


$route['metricas/pedidos_restaurantes_periodo_rango'] = 'metricas/pedidos_restaurantes_periodo_rango';
$route['metricas/pedidos_restaurantes_hoy'] = 'metricas/pedidos_restaurantes_hoy';
$route['metricas/pedidos_restaurantes_dia'] = 'metricas/pedidos_restaurantes_dia';
$route['metricas/pedidos_restaurantes_mes'] = 'metricas/pedidos_restaurantes_mes';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
