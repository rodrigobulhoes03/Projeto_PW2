<?php

namespace src\utils;

use src\models\Aluno;
use src\models\Professor;
use src\models\Disciplina;

class Database
{
    /*
     * LER ALUNOS
     */
    
    public static function lerAlunos(): array
    {
        $ficheiro = "database/alunos.txt";

        if (!file_exists($ficheiro)) {
            return [];
        }

        $linhas = file($ficheiro, FILE_IGNORE_NEW_LINES);
        $alunos = [];

        foreach ($linhas as $linha) {
            list($id, $nome, $email, $numero, $disciplina, $media) = explode(';', $linha);

            $alunos[] = Aluno::criar(
                (int)$id,
                $nome,
                $email,
                (int)$numero,
                Disciplina::criar((int)$disciplina),
                (float)$media
            );
        }

        return $alunos;
    }

    public static function lerProfessores(): array
    {
        $ficheiro = "database/professores.txt";

        if (!file_exists($ficheiro)) {
            return [];
        }

        $linhas = file($ficheiro, FILE_IGNORE_NEW_LINES);
        $professores = [];

        foreach ($linhas as $linha) {
            list($id, $nome, $email, $numeroProfessor) = explode(';', $linha);

            $professores[] = Professor::criar((int)$id, $nome, $email, (int) $numeroProfessor);
        }

        return $professores;
    }

    public static function lerDisciplinas(): array
    {
        $ficheiro = "database/disciplinas.txt";

        if (!file_exists($ficheiro)) {
            return [];
        }

        $linhas = file($ficheiro);
        $disciplinas = [];

        foreach ($linhas as $linha) {
            list($id, $nome, $professorId) = explode(';', $linha);

            $disciplinas[] = Disciplina::criar(
                (int)$id,
                $nome,
                (int)$professor
            );
        }

        return $disciplinas;
    }

    public static function guardarLinha(string $ficheiro, string $linha): void
    {
        file_put_contents("database/" . $ficheiro, $linha . PHP_EOL, FILE_APPEND);
    }
}