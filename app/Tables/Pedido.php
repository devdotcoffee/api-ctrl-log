<?php

namespace App\Interfaces\Table;

use App\Config\Database;

/**
 * @author Erick O. dos Santos
 */
class Pedido implements Table {
 
    public static function create()
    {
        $connection = Database::connection();
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
        $connection = Database::connection();
        try {
            $connection->exec("DROP TABLE IF EXISTS `pedido`;");
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }
    }
}
