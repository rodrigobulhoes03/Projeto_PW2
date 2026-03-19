<?php

namespace src\models;

use src\interfaces\Autenticavel;

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

    public function getId()
    {
        return $this->id;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
        
    public function getEmail()
    {
        return $this->email;
    }
            
    public function login() {
        echo "Utilizador $this -> nome faz Login";
    }
            
    public function logout() {
        echo "Utilizador $this -> nome faz Logout";
    }
}
            