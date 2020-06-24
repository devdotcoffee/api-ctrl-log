<?php

namespace App\Tests\Tables;

use App\Tables\Cliente;
use App\Config\Database;
use PHPUnit\Framework\TestCase;
use PDO;

class ClienteTest extends TestCase 
{
    private String $tableName;

    protected function setUp(): void 
    {
        $this->tableName = 'cliente';
    }
    public function testCreate(): void
    {
        Cliente::create();
        $connection = Database::connect();
        $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = :database
        AND table_name = :table";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':database', DB_CONFIG['DBNAME']);
        $stmt->bindValue(':table', $this->tableName);
        $stmt->execute();
        $rows = $stmt->rowCount();

        $this->assertGreaterThan(0, $rows);
    }


}
