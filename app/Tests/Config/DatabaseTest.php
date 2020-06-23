<?php

namespace App\Tests\Config;

use App\Config\Database;
use PHPUnit\Framework\TestCase;
use PDO;

class DatabaseTest extends TestCase 
{
    /**
     * @author Erick
     */
    public function testConnect(): void
    {
        $this->assertInstanceOf(PDO::class, Database::connect());
    }
}
