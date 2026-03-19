<?php

namespace src\models;

class Disciplina
{
    protected int $id;
    protected string $nome;
    protected Professor $professor;

    public function __construct(int $id, string $nome, Professor $professor)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->professor = $professor;
    }

    public static function criar(int $id, string $nome, Professor $professor)
    {
        return new Disciplina($id, $nome, $professor);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getProfessor(): Professor
    {
        return $this->professor;
    }
    

}
