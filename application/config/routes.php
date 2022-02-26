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

$route['home'] = 'welcome/home';//___la page d'accueil

$route['404_override'] = 'welcome/error_404';

$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'connection/login'; //___page de connection

$route['publications'] = 'publication/publications'; //___page de publications effectuées par le vendeur

$route['addarticle'] = 'publication/addarticle';//___la page d'ajout d'un nouvel articles

$route['about'] = '';//___la page qui parle de l'entreprise AfricVillage

$route['category/(:num)'] = 'publication/cat/$1';//___la page qui detaille les articles d'une categorie lambda

$route['signin'] = 'formclient/formulaireclient';//___la page d'inscription d'un client 

$route['info/(:num)'] = 'publication/info/$1'; //___la page qui donne les details par rapport a un article posté par un vedeur

$route['messagelist'] = 'account/list_message';//___la page qui retourne la liste des message recu par un utilisateur

$route['more/(:num)'] = 'publication/more/$1';//___la page qui retourne les details sur un article 

$route['message/(:num)'] = 'account/message/$1';//___la page d'edition d'un message a envoyer

$route['myaccount'] = 'account/personnalInfo';//___la page qui retourne les information personnelles d'un utilisateur

$route['mypublications'] = '';//___la page qui retourne la liste des articles publié paar un vendeur

$route['search/(:any)/(:any)'] = 'publication/search/$1/$2';//___la page qui retourne les resultats d'une recherche

$route['upgradstatut'] = 'publication/toseller';//___to_seller : la page qui permet au client de devenir un vendeur

$route['writeus'] ='about/write_us';//___la page qui permet a un utilisateur d'envoyer un message a l'administrateur

$route['seller/(:num)'] = 'account/seller/$1';//___la page de profil d'un vendeur

$route['del/(:num)'] = 'publication/del/$1';//___suppression d'un article

$route['delmsg/(:num)'] = 'account/del/$1';//___suppression d'un message

$route['categories'] = 'publication/category';




///////////////////////////////////////////////////////
///                                                 ///
///     les routes de la partie administrateur      ///
///                                                 ///
///////////////////////////////////////////////////////
