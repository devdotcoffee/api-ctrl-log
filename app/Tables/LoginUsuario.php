<?php

namespace App\Tables;

use App\Config\Database;
use App\Interfaces\Table;

/**
 * Class to create and drop login table from database
 * 
 * @author Erick O. dos Santos
 */
class LoginUsuario implements Table {
 
    public static function create()
    {
        $connection = Database::connect();
        try {
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS `login_usuario` (
                    `usuario` varchar(20) NOT NULL,
                    `senha` varchar(32) NOT NULL,
                    `nome_comp` varchar(255) NOT NULL,
                    `tipo` varchar(20) NOT NULL,
                    PRIMARY KEY (`usuario`)
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
            $connection->exec("DROP TABLE IF EXISTS `login_usuario`;");
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
