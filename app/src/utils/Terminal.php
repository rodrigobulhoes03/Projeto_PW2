<?php

namespace src\utils;

class Terminal
{

    /*
     * Classe para utilidades do Terminal em si, não
     * para impressão de menu e etc.
     * Alterar conforme necessário
     */

    public static function limpar(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            system('cls');
        } else {
            system('clear');
        }
    }

    public static function linha(): void
    {
        print "-------------------------\n";
    }

    // Adicionar lógica necessária para funções de terminal
    
}