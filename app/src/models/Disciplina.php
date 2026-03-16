<?php

namespace src\models;

class Disciplina
{
    private int $id;
    private string $nome;
    private string $professor;

    public function __construct(int $id, string $nome, string $professor)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->professor = $professor;
    }

    public static function criar(int $id, string $nome, string $professor)
    {
        return new Disciplina($id, $nome, $professor);
    }
}
