<?php

namespace App\Models;

final class FuncionarioModel
{
    public $id;
    public $nome;
    public $sexo;
    public $telefone;
    public $endereco;

    public function getId(): int 
    {
        return $this->id;

    }

    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): FuncionarioModel
    {
        $this->nome = $nome;
        return $this;

    }

    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): FuncionarioModel
    {
        $this->sexo = $sexo;
        return $this;

    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): FuncionarioModel
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): FuncionarioModel
    {
        $this->endereco = $endereco;
        return $this;
    }
}