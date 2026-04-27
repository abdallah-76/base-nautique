<?php
use App\Controllers\Apropos;
use App\Controllers\Accueil;
use App\Controllers\Compte;
use App\Controllers\Actualite;
use App\Controllers\Demande;
use App\Controllers\Visiteur;
use App\Controllers\Message;
use App\Controllers\Admin;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Accueil::class, 'afficher']);
$routes->get('accueil/afficher', [Accueil::class, 'afficher']);
$routes->get('accueil/afficher/(:segment)', [Accueil::class, 'afficher']);

$routes->get('apropos/afficher', [Apropos::class, 'afficher']);
$routes->get('admin/afficher', 'Admin::afficher');

$routes->get('compte/lister', [Compte::class, 'lister']);
$routes->get('actualite/afficher', [Actualite::class, 'afficher']);
$routes->get('actualite/afficher/(:num)', [Actualite::class, 'afficher']);

$routes->get('demande/afficher', [Demande::class, 'afficher']);
$routes->get('demande/afficher/(:alphanum)', [Demande::class, 'afficher']);

$routes->match(['get', 'post'], 'compte/creer', [Compte::class, 'creer']);
$routes->match(['get', 'post'], 'visiteur/creer', [Visiteur::class, 'creer']);
$routes->get('visiteur/afficher/(:any)', [Visiteur::class, 'afficher']);
$routes->match(['get', 'post'], 'message/verifier', [Message::class, 'verifier']);

$routes->get('message/verifier', [Message::class, 'verifier']);

$routes->get('compte/connecter', [Compte::class, 'connecter']);
$routes->post('compte/connecter', [Compte::class, 'connecter']);

$routes->get('compte/deconnecter', [Compte::class, 'deconnecter']);
$routes->get('compte/afficher_profil', [Compte::class, 'afficher_profil']);

$routes->get('admin/reservations', [\App\Controllers\Admin::class, 'reservations']);
$routes->get('compte/afficher_profil', [\App\Controllers\Compte::class, 'afficher_profil']);

$routes->get('compte/activer/(:num)', 'Compte::activer/$1');
$routes->get('compte/desactiver/(:num)', 'Compte::desactiver/$1');
$routes->get('compte/supprimer/(:num)', 'Compte::supprimer/$1');

$routes->get('admin/demandes', 'Admin::demandes');
$routes->match(['get','post'], 'admin/repondre_message/(:num)', 'Admin::repondre_message/$1');


$routes->get('admin/afficher', [Admin::class, 'afficher']);
$routes->get('admin/demandes', [Admin::class, 'demandes']);
$routes->match(['get','post'],'admin/repondre_message/(:num)', [Admin::class, 'repondre_message/$1']);
$routes->get('admin/reservations', [Admin::class, 'reservations']);

$routes->match(['get','post'],'compte/connecter', [Compte::class, 'connecter']);
$routes->get('compte/liste_adherents', [Compte::class, 'liste_adherents']);


$routes->match(['get','post'], 'admin/ajouter_ressource', 'Admin::ajouter_ressource');
$routes->get('admin/ressources', 'Admin::ressources');

$routes->get('admin/supprimer_ressource/(:num)', [Admin::class, 'supprimer_ressource/$1']);

$routes->match(['get','post'], 'admin/seances', 'Admin::seances');
$routes->match(['get','post'], 'compte/seances', 'Compte::seances');
$routes->get('compte/accueil_invite', 'Compte::accueil_invite');
