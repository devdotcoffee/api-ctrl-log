<?php

namespace App\CLI;

use App\Config\DataDefinition;

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
        '--seed' => "Incrementa dados em todas as tabelas criadas.\n\t\t\tSó deve ser usada com [createTables] ou [refresh]."
    ];

    public static function help(): void
    {
        echo("\nUsage:\n");
        echo("\tdb [command] [option]\n\n");
        echo("Commands:\n");
        self::getCommands();
        echo("Options:\n");
        self::getOptions();
    }

    private static function getCommands(): void
    {
        $keys   = array_keys(self::$commands);
        $values = array_values(self::$commands);

        for ($i = 0; $i <= (count(self::$commands) - 1); $i++) {
            echo("\t" . $keys[$i] . "\t\t" . $values[$i] . "\n");
        }
    }

    private static function getOptions(): void 
    {
        $keys   = array_keys(self::$options);
        $values = array_values(self::$options);

        for ($i = 0; $i <= (count(self::$options) - 1); $i++) {
            echo("\t" . $keys[$i] . "\t\t" . $values[$i] . "\n");
        }
    }

    public static function createTables(): void 
    {
        $data = new DataDefinition();

        echo("Criando Tabelas...\n");
        $data->createTables();
        echo("Tabelas criadas com sucesso.");
    }

    public static function dropTables(): void
    {
        $data = new DataDefinition();

        echo("Apagando Tabelas...\n");
        $data->dropTables();
        echo("Tabelas deletadas com sucesso.");
    }

    public static function refresh(): void 
    {
        $data = new DataDefinition();

        echo("Apagando Tabelas...\n");
        $data->dropTables();
        echo("Criando Tabelas...\n");
        $data->createTables();
        echo("Tabelas criadas com sucesso.");

    }
}