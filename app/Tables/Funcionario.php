<?php

namespace App\Interfaces\Table;

use App\Config\Database;

/**
 * @author Erick O. dos Santos
 */
class Funcionario implements Table {
 
    public static function create(): void
    {
        $connection = Database::connection();
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
        $connection = Database::connection();
        try {
            $connection->exec("DROP TABLE IF EXISTS `funcionario`;");            
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }

    }
}
