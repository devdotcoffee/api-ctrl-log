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

                self::$connection = new PDO("mysql:dbname=projetologistica;host=localhost;","root","");
                
                return self::$connection;

            } catch(PDOException $e){

                echo "Erro no Banco de dados: " . $e->getMesssage();
            
            } catch(Exception $e){
                
                echo "Um erro foi encontrado: " . $e->getMessage();
            }
        } else {

            return self::$connection;
        
        }

    }

}

