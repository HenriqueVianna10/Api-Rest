<?php

namespace App\DAO;
use App\Models\LojaModel;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTodasLojas(): array
    {
        $lojas = $this->pdo
            ->query('SELECT
                     id,
                     nome,
                     telefone,
                     endereco
                FROM loja;')
            ->fetchALL(\PDO::FETCH_ASSOC);

        return $lojas;
    }

    public function insertLoja(LojaModel $loja): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO loja VALUES(
                null,
                :nome,
                :telefone,
                :endereco
            );');
        $statement->execute([
            'nome' =>     $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }

    public function updateLoja(LojaModel $loja): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE loja SET 
                    nome = :nome, 
                    telefone = :telefone, 
                    endereco = :endereco 
                   WHERE id = :id');
        $statement->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco(),
            'id' => $loja->getId()
        ]);
    }

    public function deleteLoja(LojaModel $loja): void 
    {
        $statement = $this->pdo
        ->prepare("DELETE FROM loja where id = :id");
        $statement->execute([
            'id' => $loja->getId()
        ]);
    }
}