<?php

namespace App;

/**
 * @author Erick O. dos Santos
 */
class Request {

    private static $namespace = "App\Controller\\";

    /**
     * Open the request URL and execute the respective class
     * 
     */
    public static function open(Array $url, String $method): String
    {
        header('Content-type: application/json');
        
        if (empty($url['url'])) {
            if ($method == 'GET') {
                return json_encode([
                    'status' => 200
                ]);
            } else {
                http_response_code(405);
                return json_encode([
                    'status' => 405
                ]);
            }
        } else {
            return self::callClass($url['url'], $method);
        }
    } 

    /**
     * Call the class if exists
     */
    private static function callClass(String $params, String $method): String
    {
        $params = explode("/", $params); 
        $class  = self::nameClass($params[0]);
        $params = array_shift($params);

        if (class_exists($class, TRUE)) {
            $class = new $class($params, $method);
            $class->open();
        } else {
            http_response_code(400);
            return json_encode([
                'status' => 400
            ]); 
        }

    }

    private static function nameClass(String $class): String 
    {
        return self::$namespace . ucfirst($class) . 's';
    }
}