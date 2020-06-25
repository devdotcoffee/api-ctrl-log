<?php

namespace App\CLI;

/**
 * @author Erick O. dos Santos
 */
class Command {

    private static $commands = [
        'createTables'  => 'Cria todas as tabelas especificadas no diretório ./app/Tables',
        'dropTables'    => 'Deleta todas as tabelas especificadas no diretório ./app/Tables',
        'refresh'       => 'Deleta e cria todas as tabelas especificadas no diretório ./app/Tables', 
    ];

    private static $options = [
        '--seed' => 'Incrementa dados em todas as tabelas criadas'
    ];

    public static function help(): void
    {
        echo("\nUso:\n\n");
        echo("\tdb [comando] [option]\n\n");
        echo("Comandos:\n\n");
        
        $keys   = array_keys(self::$commands);
        $values = array_values(self::$commands);

        for ($i = 0; $i <= (count(self::$commands) - 1); $i++) {
            echo("\t" . $keys[$i] . "\t\t" . $values[$i] . "\n");
        }
    }
}