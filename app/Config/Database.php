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

                self::$connection = new PDO("mysql:dbname=projetlogistica;host=localhost;","root","");
                
                return self::$connection;

            } catch(\PDOException $e){
                if ($e->getCode() == "1109") 
                {
                    self::createSchema();
                
                } else {
                    echo "Não foi possível se conectar ao banco: " . $e->getMessage();
                }
            
            } catch(\Exception $e){
                
                echo "Um erro foi encontrado: " . $e->getMessage();
            }
        } else {

            return self::$connection;
        
        }

    }

    private static function createSchema(): int
    {
        //Implementar método para montar tabela
    }

}

