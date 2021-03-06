<?php

namespace App\Tests\Tables;

use App\Tables\LoginUsuario;
use App\Config\Database;
use PHPUnit\Framework\TestCase;

class LoginUsuarioTest extends TestCase 
{
    private $tableName;

    protected function setUp(): void 
    {
        $this->tableName = 'login_usuario';
    }

    /**
     * @group createTable
     */
    public function testCreate(): void
    {
        LoginUsuario::create();
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

    /**
     * @group dropTable
     */
    public function testDrop(): void
    {
        LoginUsuario::drop();
        $connection = Database::connect();
        $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = :database
        AND table_name = :table";
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':database', DB_CONFIG['DBNAME']);
        $stmt->bindValue(':table', $this->tableName);
        $stmt->execute();
        $rows = $stmt->rowCount();

        $this->assertLessThan(1, $rows);
    }
}
