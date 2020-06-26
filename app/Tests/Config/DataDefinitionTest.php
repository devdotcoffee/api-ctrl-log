<?php

namespace App\Tests\Config;

use PHPUnit\Framework\TestCase;
use App\Config\DataDefinition;
use App\Config\Database;

class DataDefinitionTest extends TestCase {

    private $connection;

    protected function setUp(): void
    {
        $this->connection = Database::connect();
    }

    /**
     * @group createTable
     * @group createAllTables
     */
    public function testCreateTables(): void 
    {
        $database = new DataDefinition();
        $database->createTables();

        $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = :database";
        $query = $this->connection->prepare($query);
        $query->bindValue(':database', DB_CONFIG['DBNAME']);
        $query->execute();
        $rows = $query->rowCount();

        $tables = $database->countTables();
        
        $this->assertEquals($tables, $rows);
    }

    /**
     * @group dropTable
     * @group dropAllTables
     */
    public function testDropTables(): void 
    {
        $database = new DataDefinition();
        $database->dropTables();

        $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = :database";
        $query = $this->connection->prepare($query);
        $query->bindValue(':database', DB_CONFIG['DBNAME']);
        $query->execute();
        $rows = $query->rowCount();
        
        $this->assertEquals(0, $rows);
    }

    protected function tearDown(): void
    {
        $this->connection = null;
    }
}