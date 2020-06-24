<?php

namespace App\Interfaces\Table;

use App\Config\Database;

/**
 * @author Erick O. dos Santos
 */
class Gerente implements Table {
 
    public static function create()
    {
        $connection = Database::connection();
        try {
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS `gerente` (
                    `nome` varchar(255) NOT NULL,
                    `cpf` varchar(255) NOT NULL,
                    `endereco` varchar(255) NOT NULL,
                    `email` varchar(255) NOT NULL,
                    `telefone` varchar(255) NOT NULL,
                    PRIMARY KEY (`cpf`)
                )" . " ENGINE=MyISAM DEFAULT CHARSET=latin1;"
            );            
        } catch (\PDOException $e) {
            echo "Erro ao tentar criar tabela: " . $e->getMessage();
        }

    }

    public static function drop()
    {
        $connection = Database::connection();
        try {
            $connection->exec("DROP TABLE IF EXISTS `gerente`;");
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }
    }
}
