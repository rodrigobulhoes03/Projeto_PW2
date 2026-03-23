<?php

namespace src\models;
include_once 'Utilizador.php';
include_once 'Disciplina.php';


class Aluno extends Utilizador
{
    protected int $numeroAluno;
    protected Disciplina $disciplina;
    protected float $media;

    public function __construct(int $id, string $nome, string $email, int $numeroAluno, Disciplina $disciplina, float $media)
    {
        parent::__construct($id, $nome, $email);
        $this->numeroAluno = $numeroAluno;
        $this->disciplina = $disciplina;
        $this->media = max(0, min(20, $media));
    }

    public static function criar(int $id, string $nome, string $email, int $numeroAluno, Disciplina $disciplina, float $media)
    {
        return new Aluno($id, $nome, $email, $numeroAluno, $disciplina, $media);
    }    

    public function getNumeroAluno(): int
    {
        return $this->numeroAluno;
    }
 
    public function getDisciplina(): Disciplina
    {
        return $this->disciplina;
    }

    public function getMedia(): float
    {
        return $this->media;
    }
}
