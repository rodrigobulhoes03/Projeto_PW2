<?php

namespace src\utils;

use src\models\Aluno;
use src\models\Professor;
use src\models\Disciplina;
use src\utils\Database;


class Menu
{
    public static function principal(): void
    {
        do {
            Terminal::limpar();
            echo "SISTEMA DE GESTÃO ACADÉMICA\n";
            echo "1 - Listar Alunos\n";
            echo "2 - Criar Aluno\n";
            echo "3 - Listar Professores\n";
            echo "4 - Criar Professor\n";
            echo "5 - Remover Professor\n";
            echo "6 - Listar Disciplinas\n";
            echo "7 - Criar Disciplina\n";
            echo "8 - Remover Disciplina\n";
            echo "0 - Sair\n";

            echo "Opção: ";
            $opcao = trim(fgets(STDIN));

            switch ($opcao) {
                case '1': 
                    self::listarAlunos();     
                break;

                case '2': 
                    self::criarAluno();        
                break;

                case '3': 
                    self::listarProfessores(); 
                break;

                case '4': 
                    self::criarProfessor();    break;
                case '5': 
                    self::removerProfessor();  break;
                case '6': 
                    self::listarDisciplinas(); break;
                case '7': 
                    self::criarDisciplina();   break;
                case '8': 
                    self::removerDisciplina(); break;
                case '0': 
                    echo "Saindo...\n";        break;
                default:  echo "Opção inválida. Tente novamente.\n";
            }

        } while ($opcao !== '0');
    }

    public static function listarProfessores(): void
    {
        $professores = Database::lerProfessores();

        if (empty($professores)) {
            echo "Nenhum professor encontrado.\n";
            return;
        }

        echo "Professores:\n";
        foreach ($professores as $professor) {
            echo "ID: {$professor->getId()} - Nome: {$professor->getNome()} - Email: {$professor->getEmail()} - Número Professor: {$professor->getNumeroProfessor()}\n";
        }
    }

    public static function criarProfessor(): void
    {
        $professores = Database::lerProfessores();

        echo "Nome: ";
        $nome = trim(fgets(STDIN));

        echo "Email: ";
        $email = trim(fgets(STDIN));

        echo "Número Professor: ";
        $numero = (int) trim(fgets(STDIN));

        $professores[] = Professor::criar(Database::gerarId($professores), $nome, $email, $numero);
        Database::guardarProfessores($professores);

        echo "Professor criado!\n";
    }

    public static function removerProfessor(): void
    {
        $professores = Database::lerProfessores();

        echo "ID do professor a remover: ";
        $id = (int) trim(fgets(STDIN));

        $professores = array_values(array_filter($professores, fn($professor) => $professor->getId() !== $id));
        Database::guardarProfessores($professores);

        echo "Professor removido!\n";
    }

    public static function listarDisciplinas(): void
    {
        $disciplinas = Database::lerDisciplinas();

        if (empty($disciplinas)) {
            echo "Nenhuma disciplina encontrada.\n";
            return;
        }

        echo "Disciplinas:\n";
        foreach ($disciplinas as $disciplina) {
            echo "ID: {$disciplina->getId()} - Nome: {$disciplina->getNome()} - Professor: {$disciplina->getProfessor()->getNome()}\n";
        }
    }

    public static function criarDisciplina(): void
    {
        $disciplinas = Database::lerDisciplinas();
        $professores = Database::lerProfessores();

        if (empty($professores)) {
            echo "Nenhum professor disponível. Crie um professor primeiro.\n";
            return;
        }

        echo "Nome da disciplina: ";
        $nome = trim(fgets(STDIN));

        echo "ID do professor para a disciplina: ";
        $idProfessor = (int) trim(fgets(STDIN));

        $professor = null;
        foreach ($professores as $profAtual) {
            if ($profAtual->getId() === $idProfessor) {
                $professor = $profAtual;
                break;
            }
        }

        if ($professor === null) {
            echo "Professor não encontrado. Tente novamente.\n";
            return;
        }

        $disciplinas[] = Disciplina::criar(Database::gerarId($disciplinas), $nome, $professor);
        Database::guardarDisciplinas($disciplinas);

        echo "Disciplina criada!\n";
    }

    public static function removerDisciplina(): void
    {
        $disciplinas = Database::lerDisciplinas();

        echo "ID da disciplina a remover: ";
        $id = (int) trim(fgets(STDIN));

        $disciplinas = array_values(array_filter($disciplinas, fn($disciplina) => $disciplina->getId() !== $id));
        Database::guardarDisciplinas($disciplinas);

        echo "Disciplina removida!\n";
    }

    public static function listarAlunos(): void
    {
        $alunos = Database::lerAlunos();

        if (empty($alunos)) {
            echo "Nenhum aluno encontrado.\n";
            return;
        }

        echo "Alunos:\n";
        foreach ($alunos as $aluno) {
            echo "ID: {$aluno->getId()} - Nome: {$aluno->getNome()} - Email: {$aluno->getEmail()}\n";
        }
    }

    public static function criarAluno(): void
    {
        $alunos = Database::lerAlunos();

        echo "Nome: ";
        $nome = trim(fgets(STDIN));

        echo "Email: ";
        $email = trim(fgets(STDIN));

        echo "Número Aluno: ";
        $numero = (int) trim(fgets(STDIN));

        echo "ID da Disciplina: ";
        $idDisciplina = (int) trim(fgets(STDIN));

        echo "Média: ";
        $media = (float) trim(fgets(STDIN));

        $disciplina = null;
        foreach (Database::lerDisciplinas() as $disciplinaAtual) {
            if ($disciplinaAtual->getId() == $idDisciplina) {
                $disciplina = $disciplinaAtual;
                break;
            }
        }

        if ($disciplina === null) {
            echo "[ERRO] Disciplina não encontrada!\n";
            return;
        }

        $alunos[] = Aluno::criar(Database::gerarId($alunos), $nome, $email, $numero, $disciplina, $media);
        Database::guardarAlunos($alunos);

        echo "Aluno criado!\n";
    }
}