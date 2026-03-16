<?php

namespace src\models;

include '../models/Utilizador.php';

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
}   
