<?php

namespace src\models;

class Aluno extends Utilizador
{
    private int $numeroAluno;
    private int $disciplinaID;
    private float $media;

    public function __construct(int $id, string $nome, string $email, int $numeroAluno, int $disciplinaID, float $media)
    {
        parent::__construct($id, $nome, $email);
        $this->numeroAluno = $numeroAluno;
        $this->disciplinaID = $disciplinaID;
        $this->media = $media;
    }

    public static function criar(int $id, string $nome, string $email, int $numeroAluno, int $disciplinaID, float $media)
    {
        return new Aluno($id, $nome, $email, $numeroAluno, $disciplinaID, $media);
    }
}
