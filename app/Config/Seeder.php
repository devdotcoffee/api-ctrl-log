<?php

namespace App\Config;

use App\Config\Database;

class Seeder {

    private $connection;

    public function __construct()
    {
        $this->connection = Database::connect();
    }

    public function seed(): void 
    {
        $this->customers();
        $this->employees();
        $this->loginUsers();
    }

    private function customers(): void
    {
        try {
            $this->connection->exec(
                "INSERT INTO `cliente` (`cnpj`, `razao_social`, `email`, `telefone`, `endereco`) 
                VALUES
                ('1754892665888', 'Vivo', 'vivo@gmail.com', '21996865472', '2'),
                ('1546894875123', 'TIM', 'matheusmbc13@gmail.com', '2433623289', '1')"
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function employees(): void
    {
        try {
            $this->connection->exec(
                "INSERT INTO `funcionario` (`nome`, `cpf`, `id_Funcionario`, `endereco`, `email`, `telefone`) 
                VALUES
                ('Roberto', '15424516859', 1, 'Rua 1', 'roberto@gmail.com', '21996845721')"
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function loginUsers(): void 
    {
        try {
            $this->connection->exec(
                "INSERT INTO `login_usuario` (`usuario`, `senha`, `nome_comp`, `tipo`) 
                VALUES
                ('matheus.siqueira', 'b7a0e33bb8c65c66d12273a13e3cb774', 'Matheus Silva Santos de Siqueira', 'Gerente'),
                ('allan.sabino', '81dc9bdb52d04dc20036dbd8313ed055', 'Allan Santos Sabino', 'Gerente'),
                ('jonathan.ferreira', '827ccb0eea8a706c4c34a16891f84e7b', 'Jonathan ferreira Monteiro', 'Funcionario'),
                ('Fernando.Neves', '01cfcd4f6b8770febfb40cb906715822', 'Fernando Neves da Silva', 'Funcionario'),
                ('erick.oliveira', '674f3c2c1a8a6f90461e8a66fb5550ba', 'Erick da silva de oliveira', 'Gerente'),
                ('thomas.verdam', '68053af2923e00204c3ca7c6a3150cf7', 'Thomas de Oliveira Verdam', 'Funcionario'),
                ('jadson.carmo', '148684480cc5f7ee1318d8cfdd93285e', 'Jadson do Carmo Moreira', 'Funcionario'),
                ('Claudio.Gimenez', 'bec66a50c11bba876a4afc895c28f003', 'Claudio Gimenez', 'Gerente'),
                ('Luciana.Santos', '81dc9bdb52d04dc20036dbd8313ed055', 'Luciana Silva Santos de Siqueira', 'Funcionario')
            ");
            
        } catch (\PDOException $e) {
           echo $e->getMessage(); 
        }
    }
}