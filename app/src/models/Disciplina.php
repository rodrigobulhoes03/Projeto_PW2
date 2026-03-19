<?php

namespace src\models;

class Disciplina
{
    private int $id;
    private string $nome;
    private int $professorID;

    public function __construct(int $id, string $nome, int $professorID)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->professorID = $professorID;
    }

    public static function criar(int $id, string $nome, int $professorID)
    {
        return new Disciplina($id, $nome, $professorID);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getProfessorID(): int
    {
        return $this->professorID;
    }
}
