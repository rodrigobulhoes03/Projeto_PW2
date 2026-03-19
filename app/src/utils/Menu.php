<?php

namespace src\utils;

use src\models\Aluno;
use src\models\Professor;
use src\models\Disciplina;
use src\utils\Database;

class Menu
{
    /*
     * Exemplo prático de uma classe para utlidades de menu,
     * alterar conforme necessário
     */
    
    public static function principal(): void
    {
        echo "1 - Listar alunos\n";
        echo "2 - Criar aluno\n";
        echo "3 - Listar professores\n";
        echo "4 - Criar professor\n";
        echo "5 - Remover professor\n";
        echo "6 - Listar disciplinas\n";
        echo "7 - Criar disciplina\n";
        echo "8 - Remover disciplina\n";
        echo "9 - Adicionar professor a disciplina\n";
        echo "0 - Sair\n";

        $opecao = trim(fgets(STDIN));
        switch ($opecao) {
            case '1':
                // Lógica para listar alunos
                break;
            case '2':
                // Lógica para criar aluno
                break;
            case '3':
                // Lógica para listar professores
                break;
            case '4':
                // Lógica para criar professor
                break;
            case '5':
                // Lógica para remover professor
                break;
            case '6':
                // Lógica para listar disciplinas
                break;
            case '7':
                // Lógica para criar disciplina
                break;
            case '8':
                // Lógica para remover disciplina
                break;
            case '9':
                // Lógica para adicionar professor a disciplina
                break;
            case '0':
                echo "Saindo...\n";
                exit(0);
            default:
                echo "Opção inválida. Tente novamente.\n";
        }
    }
    // Adicionar lógica referente ao menu
}