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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* FOR MITRA */
$route['register'] = '/Welcome/index';
$route['login-mitra'] = '/M_acc/login_mitra';
$route['spin-mitra/(:any)/(:any)/(:any)'] = '/Mitra/spinner/$1/$2/$3';

/* END MITRA */


/* FOR ADMIN */
$route['admin'] = '/A_acc/index';
$route['tarif'] = '/A_data/tarif';
$route['topup'] = '/Saldo/index';
$route['topup-mitra'] = '/Saldo/topup_mitra';
$route['tarik-mitra'] = '/Saldo/tarik_mitra';
$route['notifikasi'] = '/A_notif/index';
$route['laporan-pendapatan'] = '/Report/income_mishop';
$route['laporan-mitra'] = '/Report/income_mitra';
$route['registrasi-mitra'] = '/A_data/registrasi_mitra';
$route['mitra'] = '/A_data/mitra';
$route['customer'] = '/A_data/customer';
$route['saran-customer'] = '/Report/saran_c';
$route['saran-mitra'] = '/Report/saran_m';
$route['rekening'] = '/A_data/rekening';

/* END ADMIN */

/* FOR CUSTOMER */
$route['registrasi-customer'] = '/C_acc/registrasi';
$route['login-customer'] = '/C_acc/login_cust';
$route['rate-service'] = '/Customer/rate_service';
$route['rate-shop'] = '/Customer/rate_shop';

/* END ADMIN */

/* SHOP */
$route['post-shop-mitra'] = '/Shop/post_shop';
$route['timeline-shop'] = '/Shop/timeline_shop';
$route['order-shop'] = '/Shop/order_shop';
$route['update-shop'] = '/Shop/update_order';
/* END SHOP */

/* SERVICE */
$route['post-service-mitra'] = '/Service/post_service';
$route['timeline-service'] = '/Service/timeline_service';
$route['order-service'] = '/Service/order_service';
/* END SERVICE */