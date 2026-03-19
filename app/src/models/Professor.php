<?php

namespace src\models;

class Professor extends Utilizador
{
    private int $numeroProfessor;

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
