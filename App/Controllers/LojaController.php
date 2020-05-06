<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\LojasDAO;
use App\Models\LojaModel;

final class LojaController
{
    public function getLojas(Request $request, Response $response, array $args) : Response
    {
        $lojasDAO = new LojasDAO();
        $lojas = $lojasDAO->getTodasLojas();
        $response = $response->withJson($lojas);

        return $response;
    }

    public function insertLoja(Request $request, Response $response, array $args) : Response
    {   
        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();
        $loja->setNome($data['nome'])
             ->setEndereco($data['endereco'])
             ->setTelefone($data['telefone']);
        $lojasDAO->insertLoja($loja);

        $response = $response->withJson([
            'message' => 'Loja Inserida Com Sucesso!'
        ]);

        return $response;
    }

    public function updateLoja(Request $request, Response $response, array $args) : Response
    {
        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();

        $loja->setNome($data['nome'])
            ->setTelefone($data['telefone'])
            ->setEndereco($data['endereco'])
            ->setId($data['id']);

        if ($lojasDAO->updateLoja($loja)) {
            $response = $response->withJson([
                "message" => "Loja Atualizada Com Sucesso"
            ]);
        }

        return $response;
    }

    public function deleteLoja(Request $request, Response $response, array $args) : Response
    {
        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();

        $loja->setId($data['id']);

        $lojasDAO->deleteLoja($loja);

        $response = $response->withJson([
            "Message" => "Loja Deletada Com Sucesso!"
        ]);

        return $response;
    }


}