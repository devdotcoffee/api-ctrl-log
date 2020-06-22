<?php

namespace App\Tests\Config;

use App\Config\Database;
use PHPUnit\Framework\TestCase;
use PDO;

class DatabaseTest extends TestCase 
{
    public function testConnect()
    {
        $this->assertInstanceOf(PDO::class, Database::connect());
    }
}
