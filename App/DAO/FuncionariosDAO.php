<?php

namespace App\DAO;

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
}