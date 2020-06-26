<?php

namespace App\Tables;

use App\Config\Database;
use App\Interfaces\Table;

/**
 * Class to create and drop employee table from database
 * 
 * @author Erick O. dos Santos
 */
class Funcionario implements Table {

    private static $tableName = "funcionario";
 
    public static function create(): void
    {
        $connection = Database::connect();
        try {
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS `funcionario` (
                    `nome` varchar(255) NOT NULL,
                    `cpf` varchar(255) NOT NULL,
                    `id_Funcionario` int(11) NOT NULL AUTO_INCREMENT,
                    `endereco` varchar(255) NOT NULL,
                    `email` varchar(255) NOT NULL,
                    `telefone` varchar(20) NOT NULL,
                    PRIMARY KEY (`id_Funcionario`)
                )" . " ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;"
            );
        } catch (\PDOException $e) {
            echo "Erro ao tentar criar tabela: " . $e->getMessage();
        }
    }

    public static function drop(): void
    {
        $connection = Database::connect();
        try {
            $connection->exec("DROP TABLE IF EXISTS `funcionario`;");            
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
