<?php

namespace App;

class Request {

    private static $modelNamespace = "App/Model/";

    public static function open(String $request, String $method): void
    {
        header('Content-type: application/json');

        switch ($method) {
            case 'GET':
                if ($request === "/") {
                    self::home();
                } else {
                    $params = explode("/", $request);
                    self::callClass($params);
                }
                break;
            case 'POST':

                break;
            case 'PUT':

                break;

            case 'DELETE':

                break;
            default:
                http_response_code(405);
                echo json_encode(['status' => 405]);
                break;
        }
        
    }

    private static function home(): String
    {
        $response = [
            'status' => 200
        ];

        return json_encode($response);
    } 

    private static function callClass(Array $params, String $method): String
    {
        if (isset($params[1])) 
        {
            if (isset($params[2])) {

            } else {
                if ($method === 'GET') {
                    $class = ucfirst($params[1]);
                    $response = forward_static_call(array(self::$modelNamespace, 'getAll'));
                    return json_encode(['status' =>  200, $data => $response]);
                } else {
                    self::httpError(405);
                }
            
            }
        } 
        
    }

    private static function httpError(int $code): String
    {
        http_response_code($code);
        return json_encode(['status' => $code]);
    }
}