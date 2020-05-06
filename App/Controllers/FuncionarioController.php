<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\FuncionariosDAO;
use App\Models\FuncionarioModel;

final class FuncionarioController
{
    public function getFuncionarios(Request $request, Response $response, array $args) : Response
    {
        $funcionariosDAO = new FuncionariosDAO();
        $funcionarios = $funcionariosDAO->getFuncionarios();
        $response = $response->withJson($funcionarios);
        $response = $response->WithStatus(200);
        return $response;
    }
    public function insertFuncionario(Request $request, Response $response, array $args) : Response
    {   
        $data = $request->getParsedBody();

        $funcionarioDAO = new FuncionariosDAO();
        $funcionario = new FuncionarioModel();
        $funcionario->setNome($data['nome'])
             ->setSexo($data['sexo'])
             ->setEndereco($data['endereco'])
             ->setTelefone($data['telefone']);
        $funcionarioDAO->insertFuncionario($funcionario);

        $response = $response->withJson([
            'message' => 'Funcionario inserido com sucesso!'
        ]);
        $response = $response->withStatus(201);      

        return $response;
    }

    public function updateLoja(Request $request, Response $response, array $args) : Response
    {
        $data = $request->getParsedBody();

        $funcionarioDAO = new FuncionariosDAO();
        $funcionario = new FuncionarioModel();
        $funcionario->setNome($data['nome'])
             ->setSexo($data['sexo'])
             ->setEndereco($data['endereco'])
             ->setTelefone($data['telefone'])
             ->setId($data['id']);

        if ($funcionarioDAO->updateFuncionario($funcionario)) {
            $response = $response->withJson([
                "message" => "Loja Atualizada Com Sucesso"
            ]);
            $response = $response->withStatus(200);      
        }
        return $response;
    }

    public function deleteLoja(Request $request, Response $response, array $args) : Response
    {
        $data = $request->getParsedBody();

        $funcionarioDAO = new FuncionariosDAO();
        $funcionario = new FuncionarioModel();

        $funcionario->setId($data['id']);

        $funcionarioDAO->deleteFuncionario($funcionario);

        $response = $response->withJson([
            "Message" => "funcionario deletado com sucesso!"
        ]);
        $response = $response->WithStatus(204);
        return $response;
    }
 
}