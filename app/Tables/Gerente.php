<?php

namespace App\Tables;

use App\Config\Database;
use App\Interfaces\Table;

/**
 * Class to create and drop manager table from database
 * 
 * @author Erick O. dos Santos
 */
class Gerente implements Table {
 
    public static function create()
    {
        $connection = Database::connect();
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
        $connection = Database::connect();
        try {
            $connection->exec("DROP TABLE IF EXISTS `gerente`;");
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }
    }

    public static function verifyIfExists(): bool
    {
        $connection = Database::connect();
        $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = :database
        AND table_name = :table";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':database', DB_CONFIG['DBNAME']);
        $stmt->bindValue(':table', self::$tableName);
        $stmt->execute();
        $rows = $stmt->rowCount();

        if ($rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
