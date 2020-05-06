<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\FuncionariosDAO;

final class FuncionarioController
{
    public function getFuncionarios(Request $request, Response $response, array $args) : Response
    {
        $funcionariosDAO = new FuncionariosDAO();
        $funcionarios = $funcionariosDAO->getTodosFuncionarios();
        $response = $response->withJson($funcionarios);

        return $response;
    }
}