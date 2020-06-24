<?php

namespace App\Interfaces\Table;

use App\Config\Database;

/**
 * @author Erick O. dos Santos
 */
class LoginUsuario implements Table {
 
    public static function create()
    {
        $connection = Database::connection();
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
        $connection = Database::connection();
        try {
            $connection->exec("DROP TABLE IF EXISTS `login_usuario`;");
        } catch (\PDOException $e) {
            echo "Erro ao tentar deletar tabela: " . $e->getMessage();
        }
    }
}
