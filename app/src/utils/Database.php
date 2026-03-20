<?php

namespace src\utils;

use src\models\Aluno;
use src\models\Professor;
use src\models\Disciplina;

class Database
{
   public static function guardarLinha(string $ficherio, string $linha)
   {
    file_put_contents("app/database/$ficherio", $linha . PHP_EOL, FILE_APPEND);
   }

   public static function lerProfessores()
   {
     $ficheiro = "database/professores.txt";

        if (!file_exists($ficheiro)) {
            return [];
        }

        $professores = [];

        $ponteiroFicheiro = fopen($ficheiro, 'r');

        while ($linha = fgets($ponteiroFicheiro)) {
            $linha = trim($linha);

            if ($linha == '') continue;

            list($id, $nome, $email, $numeroProfessor) = explode(';', $linha);
            $professor[] = Professor::criar($id, $nome, $email, (int)$numeroProfessor);
            
        }

        fclose($ponteiroFicheiro);

        return $professores;
   }

    public static function guardarProfessor(Professor $professor): void
    {
        $linha = $professor->getId() . '|' . $professor->getNome() . '|' . $professor->getEmail() . '|'. $professor->getNumeroProfessor();

        self::guardarLinha("professores.txt", $linha);
    }

    public static function removerProfessor()
    {

    }

    public static function lerAlunos()
    {
       return [];      
    }

    public static function lerDisciplinas()
    {
       return [];
    }


}
    


