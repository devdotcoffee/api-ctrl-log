<?php

namespace App\Tests\Config;

use App\Config\Database;
use PHPUnit\Framework\TestCase;
use PDO;

class DatabaseTest extends TestCase 
{
    public function testConnect(): void
    {
        $this->assertInstanceOf(PDO::class, Database::connect(), "Conexão não estabelecida");
    }

    public function testCreateSchema(): void
    {
        $this->assertEquals(0, Database::createSchema());
    }
}
