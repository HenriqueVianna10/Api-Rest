<?php

use function src\slimConfiguration;
use App\Controllers\LojaController;
use App\Controllers\FuncionarioController;

$app = new \Slim\App(slimConfiguration());

// ====================================================
$app->get('/funcionario',   FuncionarioController::class .    ':getFuncionarios');
$app->post('/funcionario',  FuncionarioController::class .    ':insertFuncionario');
$app->put('/funcionario',   FuncionarioController::class .    ':updateFuncionario');
$app->delete('/funcionario',FuncionarioController::class .    ':deleteFuncionario');

$app->get('/loja',          LojaController::class .    ':getLojas');
$app->post('/loja',         LojaController::class .    ':insertLoja');
$app->put('/loja',          LojaController::class .    ':updateLoja');
$app->delete('/loja',       LojaController::class .    ':deleteLoja');


// ====================================================

$app->run();