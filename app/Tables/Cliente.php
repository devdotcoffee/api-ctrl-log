<?php

namespace App\Interfaces\Table;

use App\Config\Database;

/**
 * @author Erick O. dos Santos
 */
class Cliente implements Table {
 
    public static function create(): void
    {
        $connection = Database::connection();
        try {
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS `cliente` (
                    `id_cliente` INT NOT NULL AUTO_INCREMENT,
                    `cnpj` varchar(13) NOT NULL,
                    `razao_social` varchar(255) NOT NULL,
                    `email` varchar(255) NOT NULL,
                    `telefone` varchar(11) NOT NULL,
                    `endereco` varchar(255) NOT NULL,
                    PRIMARY KEY ('id_cliente')
                )" . " ENGINE=MyISAM DEFAULT CHARSET=latin1;"
            );
        } catch (\PDOException $e) {
            echo "Erro ao tentar criar tabela: " . $e->getMessage();
        }
    }

    public static function drop(): void
    {
        $connection = Database::connection();
        try {
            $connection->exec("DROP TABLE IF EXISTS `cliente`;");            
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }

    }
}
