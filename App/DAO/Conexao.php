<?php

namespace App\Dao;

abstract class Conexao
{
    protected $pdo;

    public function __construct()
    {
        $host   = 'localhost';
        $user   = 'root';
        $pass   = '12345';
        $dbname = 'api';

        $dsn = "mysql:host={$host};dbname={$dbname}";

        $this->pdo = new \Pdo($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );

    }
    
}