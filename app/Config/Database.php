<?php

namespace App\Config;

use PDO;

class Database 
{
    private static $connection;

    public static function connect(): PDO
    {
        if (self::$connection == null)
        {
            try{

                self::$connection = new PDO(
                    DB_CONFIG['DRIVER'] . ":dbname=" . DB_CONFIG['DBNAME'] . ";host=" . DB_CONFIG['HOST'] . ";",
                    DB_CONFIG['USER'],
                    DB_CONFIG['PASSWORD']
                );
                
                return self::$connection;

            } catch(\PDOException $e){

                self::verifyIfDatabaseExists($e);
            
            } catch(\Exception $e){
                
                echo "Um erro foi encontrado: " . $e->getMessage();
            }
        } else {

            return self::$connection;
        
        }

    }

    public static function createSchema(): int
    {
        $connection = new PDO(
            DB_CONFIG['DRIVER'] . ":host=" . DB_CONFIG['HOST'],
            DB_CONFIG['USER'],
            DB_CONFIG['PASSWORD']
        );

        $database = "`" . DB_CONFIG['DBNAME'] . "`";

        try {
            return $connection->exec("CREATE DATABASE " . $database . ";");
        } catch (\PDOException $e) {
            echo "Erro ao tentar criar banco de dados: " . $e->getMessage();
        }
    }

    private static function verifyIfDatabaseExists(\PDOException $error): void 
    {
        if ($error->getCode() == 1049) {
            self::createSchema();
        } else {
            echo 'Erro ao tentar fazer conexão: ' . $error->getMessage();
        }
    }

}

