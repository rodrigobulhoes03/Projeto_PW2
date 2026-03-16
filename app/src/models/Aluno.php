<?php

namespace src\models;

include '../models/Utilizador.php';

class Aluno extends Utilizador
{
    private int $numeroAluno;
    private string $disciplina;
    private string $media;

    public function __construct(int $id, string $nome, string $email, int $numeroAluno, string $disciplina, string $media)
    {
        parent::__construct($id, $nome, $email);
        $this->numeroAluno = $numeroAluno;
        $this->disciplina = $disciplina;
        $this->media = $media;
    }

    public function criar(int $id, string $nome, string $email, int $numeroAluno, string $disciplina, string $media)
    {
        return new Aluno($id, $nome, $email, $numeroAluno, $disciplina, $media);
    }
}
