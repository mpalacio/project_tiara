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

$route['default_controller'] = "welcome";
$route['404_override'] = '';

/**
 * Competition Segments Routing Table
 * @code begin
 */
$route['admin/competitions/(:num)/segments'] = 'admin/segments/index/$1';
$route['admin/competitions/(:num)/segments/(view)/(:num)'] = 'admin/segments/$2/$3/$1';
/**
 * Competition Segments Routing Table
 * @code end
 */

/**
 * Competition Segment Contestants Routing Table
 * @code begin
 */
$route['admin/competitions/(:num)/segments/(:num)/contestants'] = 'admin/contestants/$2/$1';
$route['admin/competitions/(:num)/segments/(:num)/contestants/(create|get|save)'] = 'admin/contestants/$3/$2/$1';
/**
 * Competition Segments Contestants Routing Table
 * @code end
 */

 /**
 * Competition Segments Judges Routing Table
 * @code start
 */
$route['admin/competitions/(:num)/segments/(:num)/judges'] = 'admin/judges/$2/$1';
$route['admin/competitions/(:num)/segments/(:num)/judges/(create|get|save)'] = 'admin/judges/$3/$2/$1';
/**
 * Competition Segments Judges Routing Table
 * @code end
 */

/**
 *
 */
$route['competition_segments'] = 'judges/competition_segments/$1';
$route['judge/(:num)'] = 'judges/judging/$1';
// $route['competition_segments'] = 'judges/review/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
