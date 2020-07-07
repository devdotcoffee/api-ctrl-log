<?php

namespace App\Controller;

use App\Config\Database;

/**
 * @author Erick O. dos Santos
 */
class Funcionarios {

    private $connection;
    private $params;
    private $method;

    public function __construct($params, $method)
    {
        $this->connection   = Database::connect();
        $this->params       = $params;
        $this->method       = $method;
    }

    public function open(): String
    {
        if (isset($this->params[1])) {
            if (is_numeric($this->params[1])) {
                return $this->getByID($this->params[1]);
            } else {
                http_response_code(400);
                return json_encode($this->params);
            }
        } else {
            return $this->getAll();
        }
    }

    private function getAll(): String 
    {
        if ($this->method == 'GET') {
            $response = Funcionario::getAll();
            return json_encode([
                'status'    => 200,
                'data'      => $response
            ]);
        } else {
            http_response_code(405);
            return json_encode([
                'status' => 405
            ]);
        }
    }

    private function getByID(int $id): String
    {
        if ($this->method == 'GET') {
            $response = Funcionario::getByID($id);
            return json_encode([
                'status'    => 200,
                'data'      => $response
            ]);
        } else {
            http_response_code(405);
            return json_encode([
                "status" => 405
            ]);
        }

    }

}