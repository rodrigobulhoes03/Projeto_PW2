<?php

namespace src\models;
include_once 'Utilizador.php';

class Professor extends Utilizador
{
    protected int $numeroProfessor;

    public function __construct(int $id, string $nome, string $email, int $numeroProfessor)
    {
        parent::__construct($id, $nome, $email);
        $this->numeroProfessor = $numeroProfessor;
    }

    public static function criar(int $id, string $nome, string $email, int $numeroProfessor)
    {
        return new Professor($id, $nome, $email, $numeroProfessor);
    }

    public function getNumeroProfessor():int
    {
        return $this->numeroProfessor;
    }
}   
