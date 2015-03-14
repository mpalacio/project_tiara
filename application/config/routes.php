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
 * Administrator 
 */
$route['administrator'] = 'administrator';

/**
 * Competition Segments Routing Table
 * @code begin
 */
$route['administrator/competitions'] = 'system-administrator/competitions';
/**
 * Competition Segments Routing Table
 * @code end
 */

/**
 * Competition Segments Routing Table
 * @code begin
 */
$route['administrator/competitions/(:num)/segments'] = 'system-administrator/segments/index/$1';
$route['administrator/competitions/(:num)/segments/(close|open|view)/(:num)'] = 'system-administrator/segments/$2/$3/$1';
$route['administrator/competitions/(:num)/segments/(:num)/rankings'] = 'system-administrator/segments/rankings/0/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/rankings/(:num)'] = 'system-administrator/segments/rankings/$3/$2/$1';
/**
 * Competition Segments Routing Table
 * @code end
 */

/**
 * Competition Segment Contestants Routing Table
 * @code begin
 */
$route['administrator/competitions/(:num)/segments/(:num)/contestants'] = 'system-administrator/contestants/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/contestants/(create|get|save|upload)'] = 'system-administrator/contestants/$3/$2/$1';
/**
 * Competition Segments Contestants Routing Table
 * @code end
 */

/**
 * Competition Segments Judges Routing Table
 * @code start
 */
$route['administrator/competitions/(:num)/segments/(:num)/judges'] = 'system-administrator/judges/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/judges/import/(:num)'] = 'system-administrator/judges/import/$3/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/judges/(create|save|join)'] = 'system-administrator/judges/$3/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/judges/sheet/(:num)/(empty|score)'] = 'system-administrator/judges/sheet/$4/$3/$2/$1';
/**
 * Competition Segments Judges Routing Table
 * @code end
 */

/**
 * Competition Segment Criterias Routing Table
 * @code start
 */
$route['administrator/competitions/(:num)/segments/(:num)/criterias'] = 'system-administrator/criterias/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/criterias/(create|get|save)'] = 'system-administrator/criterias/$3/$2/$1';
$route['administrator/competitions/(:num)/segments/(:num)/criterias/(edit|update|delete)/(:num)'] = 'system-administrator/criterias/$3/$4/$2/$1';
/**
 * Competition Segments Judges Routing Table
 * @code end
 */
 
/**
 * @deprecated
 */
$route['competition_segments'] = 'judges/competition_segments/$1';
$route['judge/(:num)'] = 'judges/judging/$1';
// $route['competition_segments'] = 'judges/review/$1';

/**
 * Tiara Competition Routing Table
 * @code begin
 */
$route['([a-z0-9-]+)'] = 'competitions/index/$1';
$route['([a-z0-9-]+)/(logout)'] = 'competitions/logout/$1';
/**
 * Tiara Competition Routing Table
 * @code end
 */

$route['([a-z0-9-]+)/judges'] = 'segments/index/$1';
$route['([a-z0-9-]+)/judges/([a-z0-9-]+)'] = 'segments/sheet/$2/$1';
$route['([a-z0-9-]+)/judges/([a-z0-9-]+)/score/(:num)'] = 'criterias/score/$3/$2/$1';
$route['([a-z0-9-]+)/judges/([a-z0-9-]+)/scores'] = 'criterias/scores/$2/$1';
$route['([a-z0-9-]+)/judges/([a-z0-9-]+)/contestants/(:num)'] = 'contestants/view/$3/$2/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
