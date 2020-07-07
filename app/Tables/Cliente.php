<?php

namespace App\Tables;

use App\Config\Database;
use App\Interfaces\Table;

/**
 * Class to create and drop client table from database
 * 
 * @author Erick O. dos Santos
 */
class Cliente implements Table {

    private static $tableName = "cliente";
 
    public static function create(): void
    {
        $connection = Database::connect();
        try {
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS `cliente` (
                    `id_cliente` INT NOT NULL AUTO_INCREMENT,
                    `cnpj` varchar(13) NOT NULL,
                    `razao_social` varchar(255) NOT NULL,
                    `email` varchar(255) NOT NULL,
                    `telefone` varchar(11) NOT NULL,
                    `endereco` varchar(255) NOT NULL,
                    PRIMARY KEY (`id_cliente`)
                )" . " ENGINE=MyISAM DEFAULT CHARSET=latin1;"
            );
        } catch (\PDOException $e) {
            echo "Erro ao tentar criar tabela: " . $e->getMessage();
        }
    }

    public static function drop(): void
    {
        $connection = Database::connect();
        try {
            $connection->exec("DROP TABLE IF EXISTS `cliente`;");            
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }

    }

    public static function verifyIfExists(): boolean
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
