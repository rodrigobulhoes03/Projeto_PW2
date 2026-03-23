<?php

namespace src\utils;

use src\models\Aluno;
use src\models\Professor;
use src\models\Disciplina;

class Database
{

    const PROFESSORES = "database/professores.txt";
    const ALUNOS = "database/alunos.txt";
    const DISCIPLINAS = "database/disciplinas.txt";

    public static function lerProfessores(): array
    {
        if (!file_exists(self::PROFESSORES)) return [];

        $professores = [];

        foreach (file(self::PROFESSORES, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linha) {
            $partes = explode(';', $linha);
            $professores[] = Professor::criar((int)$partes[0], $partes[1], $partes[2], (int)$partes[3]);
        }

        return $professores;
    }

    public static function guardarProfessores(array $professores): void
    {
        $linhas = [];
        foreach ($professores as $professor) {
            $linhas[] = "{$professor->getId()};{$professor->getNome()};{$professor->getEmail()};{$professor->getNumeroProfessor()}";
        }
        file_put_contents(self::PROFESSORES, implode(PHP_EOL, $linhas) . PHP_EOL);
    }

    public static function lerDisciplinas(): array
    {
        if (!file_exists(self::DISCIPLINAS)) return [];

        $professores = self::lerProfessores();
        $disciplinas = [];

        foreach (file(self::DISCIPLINAS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linha) {
            $partes = explode(';', $linha);

            $professor = null;
            foreach ($professores as $profAtual) {
                if ($profAtual->getId() == (int)$partes[2]) {
                    $professor = $profAtual;
                    break;
                }
            }

            if ($professor !== null) {
                $disciplinas[] = Disciplina::criar((int)$partes[0], $partes[1], $professor);
            }
        }

        return $disciplinas;
    }

    public static function guardarDisciplinas(array $disciplinas): void
    {
        $linhas = [];
        foreach ($disciplinas as $disciplina) {
            $linhas[] = "{$disciplina->getId()};{$disciplina->getNome()};{$disciplina->getProfessor()->getId()}";
        }
        file_put_contents(self::DISCIPLINAS, implode(PHP_EOL, $linhas) . PHP_EOL);
    }

    public static function lerAlunos(): array
    {
        if (!file_exists(self::ALUNOS)) return [];

        $disciplinas = self::lerDisciplinas();
        $alunos      = [];

        foreach (file(self::ALUNOS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linha) {
            $partes = explode(';', $linha);

            $disciplina = null;
            foreach ($disciplinas as $disciplinaAtual) {
                if ($disciplinaAtual->getId() == (int)$partes[4]) {
                    $disciplina = $disciplinaAtual;
                    break;
                }
            }

            if ($disciplina !== null) {
                $alunos[] = Aluno::criar((int)$partes[0], $partes[1], $partes[2], (int)$partes[3], $disciplina, (float)$partes[5]);
            }
        }

        return $alunos;
    }

    public static function guardarAlunos(array $alunos): void
    {
        $linhas = [];
        foreach ($alunos as $aluno) {
            $linhas[] = "{$aluno->getId()};{$aluno->getNome()};{$aluno->getEmail()};{$aluno->getNumeroAluno()};{$aluno->getDisciplina()->getId()};{$aluno->getMedia()}";
        }
        file_put_contents(self::ALUNOS, implode(PHP_EOL, $linhas) . PHP_EOL);
    }

    public static function alunosDisciplina(int $idDisciplina): array
    {
        $resultado = [];
        foreach (self::lerAlunos() as $aluno) {
            if ($aluno->getDisciplina()->getId() == $idDisciplina) {
                $resultado[] = $aluno;
            }
        }
        return $resultado;
    }

    public static function disciplinaProfessores(int $idDisciplina): ?Professor
    {
        foreach (self::lerDisciplinas() as $disciplina) {
            if ($disciplina->getId() == $idDisciplina) {
                return $disciplina->getProfessor();
            }
        }
        return null;
    }

    public static function mediaDisciplina(int $idDisciplina): ?float
    {
        $alunos = self::alunosDisciplina($idDisciplina);
        if (count($alunos) === 0) return null;

        $soma = 0;
        foreach ($alunos as $aluno) {
            $soma += $aluno->getMedia();
        }
        return $soma / count($alunos);
    }

    public static function gerarId(array $lista): int
    {
        return count($lista) + 1;
    }
}
  



