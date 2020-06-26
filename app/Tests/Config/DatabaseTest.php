<?php

namespace App\Tests\Config;

use App\Config\Database;
use PHPUnit\Framework\TestCase;
use PDO;

class DatabaseTest extends TestCase 
{
    private $connection;
    
    public function testConnect(): void
    {
        $this->connection = Database::connect();
        $this->assertInstanceOf(PDO::class, $this->connection, "Conexão não estabelecida");
    }

}
