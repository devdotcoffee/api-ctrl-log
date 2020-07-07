<?php

namespace App\Tables;

use App\Config\Database;
use App\Interfaces\Table;

/**
 * Class to create and drop order table from database
 * 
 * @author Erick O. dos Santos
 */
class Pedido implements Table {
 
    public static function create()
    {
        $connection = Database::connect();
        try {
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS `pedido` (
                    `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
                    `num_nota` varchar(20) NOT NULL,
                    `status_ped` varchar(255) NOT NULL,
                    `id_cliente` int(11) DEFAULT NULL,
                    `id_Funcionario` int(11) DEFAULT NULL,
                    `localidade` varchar(255) NOT NULL,
                    `endereco_coleta` varchar(255) NOT NULL,
                    `endereco_entrega` varchar(255) NOT NULL,
                    PRIMARY KEY (`id_pedido`),
                    KEY `id_cliente` (`id_cliente`),
                    KEY `id_Funcionario` (`id_Funcionario`)
                )" . " ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;"
            );
        } catch (\PDOException $e) {
            echo "Erro ao tentar criar tabela: " . $e->getMessage();
        }
    }

    public static function drop()
    {
        $connection = Database::connect();
        try {
            $connection->exec("DROP TABLE IF EXISTS `pedido`;");
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
