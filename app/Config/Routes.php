<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Modules');
// $routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home\HomeController::index');

// ALUNOS
$routes->get('/alunos', 'Aluno\AlunoController::index');
$routes->get('/aluno/novo', 'Aluno\AlunoController::showFormCreate');
$routes->post('/aluno/novo', 'Aluno\AlunoController::create');
$routes->get('/aluno/editar/(:any)', 'Aluno\AlunoController::showFormEdit/$1');
$routes->post('/aluno/editar/(:any)', 'Aluno\AlunoController::update/$1');
$routes->get('/aluno/deletar/(:any)', 'Aluno\AlunoController::delete/$1');

// ATIVIDADES COMPLEMENTARES
$routes->get('/atividades-complementares', 'AtividadeComplementar\AtividadeComplementarController::index');
$routes->get('/atividade-complementar/novo', 'AtividadeComplementar\AtividadeComplementarController::showFormCreate');
$routes->post('/atividade-complementar/novo', 'AtividadeComplementar\AtividadeComplementarController::create');
$routes->get('/atividade-complementar/editar/(:any)', 'AtividadeComplementar\AtividadeComplementarController::showFormEdit/$1');
$routes->post('/atividade-complementar/editar/(:any)', 'AtividadeComplementar\AtividadeComplementarController::update/$1');
$routes->get('/atividade-complementar/deletar/(:any)', 'AtividadeComplementar\AtividadeComplementarController::delete/$1');
// $routes->get('/atividades-complementares/analisar', 'AtividadeComplementar\AtividadeComplementarController::index');

// TIPOS DE ATIVIDADES
$routes->get('/tp-atividades', 'TpAtividade\TpAtividadeController::index');
$routes->get('/tp-atividade/novo', 'TpAtividade\TpAtividadeController::showFormCreate');
$routes->post('/tp-atividade/novo', 'TpAtividade\TpAtividadeController::create');
$routes->get('/tp-atividade/editar/(:any)', 'TpAtividade\TpAtividadeController::showFormEdit/$1');
$routes->post('/tp-atividade/editar/(:any)', 'TpAtividade\TpAtividadeController::update/$1');
$routes->get('/tp-atividade/deletar/(:any)', 'TpAtividade\TpAtividadeController::delete/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
