<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\LayerExternal\Controllers');

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// ALUNOS
$routes->get('/alunos', 'AlunoController::index');
$routes->get('/aluno/novo', 'AlunoController::showFormCreate');
$routes->post('/aluno/novo', 'AlunoController::create');
$routes->get('/aluno/editar/(:any)', 'AlunoController::showFormEdit/$1');
$routes->post('/aluno/editar/(:any)', 'AlunoController::update/$1');
$routes->get('/aluno/deletar/(:any)', 'AlunoController::delete/$1');

// ATIVIDADES COMPLEMENTARES
$routes->get('/atividades-complementares', 'AtividadeComplementarController::index');
$routes->get('/atividade-complementar/novo', 'AtividadeComplementarController::showFormCreate');
$routes->post('/atividade-complementar/novo', 'AtividadeComplementarController::create');
$routes->get('/atividade-complementar/editar/(:any)', 'AtividadeComplementarController::showFormEdit/$1');
$routes->post('/atividade-complementar/editar/(:any)', 'AtividadeComplementarController::update/$1');
$routes->get('/atividade-complementar/deletar/(:any)', 'AtividadeComplementarController::delete/$1');
$routes->get('/atividade-complementar/analisar/(:any)', 'AtividadeComplementarController::analisarAtividadeForm/$1');
$routes->post('/atividade-complementar/analisar/(:any)', 'AtividadeComplementarController::analisarAtividade/$1');

// // TIPOS DE ATIVIDADES
$routes->get('/tp-atividades', 'TpAtividadeController::index');
$routes->get('/tp-atividade/novo', 'TpAtividadeController::showFormCreate');
$routes->post('/tp-atividade/novo', 'TpAtividadeController::create');
$routes->get('/tp-atividade/editar/(:any)', 'TpAtividadeController::showFormEdit/$1');
$routes->post('/tp-atividade/editar/(:any)', 'TpAtividadeController::update/$1');
$routes->get('/tp-atividade/deletar/(:any)', 'TpAtividadeController::delete/$1');

// // RELATÓRIOS
$routes->get('/relatorios/atividades', 'RelatorioController::atividadesList');
$routes->get('/relatorios/alunos', 'RelatorioController::alunosList');
$routes->get('/relatorios/aluno/(:any)/detalhes', 'RelatorioController::alunoDetalhes/$1');

