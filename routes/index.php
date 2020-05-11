<?php

use function src\slimConfiguration;
use function src\basicAuth;
use App\Controllers\LojaController;
use App\Controllers\FuncionarioController;
use Tuupola\Middleware\HttpBasicAuthentication;


$app = new \Slim\App(slimConfiguration());

// ====================================================
$app->group('/funcionario', function() use ($app){
$app->get('',   FuncionarioController::class .    ':getFuncionarios');   
$app->post('',  FuncionarioController::class .    ':insertFuncionario');
$app->put('',   FuncionarioController::class .    ':updateFuncionario');
$app->delete('',FuncionarioController::class .    ':deleteFuncionario');
})->add(basicAuth());

$app->group('/loja', function() use ($app){
$app->get('',          LojaController::class .    ':getLojas');
$app->post('',         LojaController::class .    ':insertLoja');
$app->put('',          LojaController::class .    ':updateLoja');
$app->delete('',       LojaController::class .    ':deleteLoja');
})->add(basicAuth());

// ====================================================

$app->run();