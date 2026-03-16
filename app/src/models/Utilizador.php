<?php

namespace src\models;

use src\interfaces\Autenticavel;

include '../interfaces/Autenticavel.php';

abstract class Utilizador implements Autenticavel
{
    protected int $id;
    protected string $nome;
    protected string $email;

    public function __construct(int $id, string $nome, string $email)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function login() {}

    public function logout() {}
}
