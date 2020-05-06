<?php

namespace App\DAO;
use App\Models\FuncionarioModel;

class FuncionariosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTodosFuncionarios(): array
    {
        $funcionarios = $this->pdo
            ->query('SELECT
                     id,
                     nome,
                     sexo,
                     telefone,
                     endereco
                FROM funcionario;')
            ->fetchALL(\PDO::FETCH_ASSOC);

        return $funcionarios;
    }

    public function insertFuncionario(FuncionarioModel $funcionario): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO funcionario VALUES(
                null,
                :nome,
                :sexo,
                :telefone,
                :endereco
            );');
        $statement->execute([
            'nome' => $funcionario->getNome(),
            'sexo' => $funcionario->getSexo(), 
            'telefone' => $funcionario->getTelefone(),
            'endereco' => $funcionario->getEndereco()
        ]);
    }

    public function updateLoja(FuncionarioModel $funcionario): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE funcionario SET 
                    nome = :nome,
                    sexo = :sexo, 
                    telefone = :telefone, 
                    endereco = :endereco 
                   WHERE id = :id');
        $statement->execute([
            'nome' => $funcionario->getNome(),
            'sexo' => $funcionario->getSexo(), 
            'telefone' => $funcionario->getTelefone(),
            'endereco' => $funcionario->getEndereco(),
            'id' => $funcionario->getId()
        ]);
    }

    public function deleteLoja(FuncionarioModel $funcionario): void 
    {
        $statement = $this->pdo
        ->prepare("DELETE FROM funcionario where id = :id");
        $statement->execute([
            'id' => $funcionario->getId()
        ]);
    }
}