<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard';
$route['404_override'] = 'Dashboard/_404';
$route['translate_uri_dashes'] = FALSE;


$route['Authentification']				= 'Dashboard/index'; 
$route['Home'] 							= 'Dashboard/dashboard';


$route['associations'] 					= "Associations/index";
$route['associationsListe'] 			= "Associations/get_all";
$route['associationCreate']['post'] 	= "Associations/store";
$route['associationEdit/(:any)'] 		= "Associations/get/$1";
$route['associationUpdate'] 	 		= "Associations/update";
$route['associationDelete/(:any)'] 		= "Associations/delete/$1";
$route['associationReload/(:any)'] 		= "Associations/reload/$1";


$route['gestionnaires'] 				= "Gestionnaire/index";
$route['gestionnairesListe'] 			= "Gestionnaire/get_all";
$route['gestionnaireCreate']['post']	= "Gestionnaire/store";
$route['gestionnaireEdit/(:any)'] 		= "Gestionnaire/get/$1";
$route['gestionnaireUpdate'] 			= "Gestionnaire/update";
$route['gestionnaireDelete/(:any)'] 	= "Gestionnaire/delete/$1";


$route['paroisiens'] 					= "Paroisien/index";
$route['paroisienListe'] 				= "Paroisien/get_all";
$route['paroisienCreate']['post'] 		= "Paroisien/store";
$route['paroisienEdit/(:any)'] 			= "Paroisien/get/$1";
$route['paroisienView/(:any)'] 			= "Paroisien/view/$1";
$route['paroisienUpdate'] 				= "Paroisien/update";
$route['paroisienDelete/(:any)'] 		= "Paroisien/delete/$1";
$route['paroisienReload/(:any)'] 		= "Paroisien/reload/$1";


$route['engagements'] 					= "Engagement/index";
$route['engagementListe'] 				= "Engagement/get_all";
$route['engagementGlobal'] 				= "Engagement/engagements_versements";
$route['engagementCreate']['post'] 		= "Engagement/store";
$route['engagementEdit/(:any)'] 		= "Engagement/get/$1";
$route['engagementView/(:any)'] 		= "Engagement/view/$1";
$route['engagementUpdate'] 				= "Engagement/update";
$route['engagementDelete/(:any)'] 		= "Engagement/delete/$1";
$route['engagementReload/(:any)'] 		= "Engagement/reload/$1";


$route['versements'] 					= "Versement/index";
$route['versementListe'] 				= "Versement/get_all";
$route['versementCreate']['post'] 		= "Versement/store";
$route['versementEdit/(:any)'] 			= "Versement/get/$1";
$route['versementUpdate'] 				= "Versement/update";


// pass : 57RHriG34j57Ldj