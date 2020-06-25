<?php

namespace App\Tests\Config;

use PHPUnit\Framework\TestCase;
use App\Config\DataDefinition;

class DataDefinitionTest extends TestCase {

    public function testCreateTables(): void 
    {
        DataDefinition::createTables();
    }

    public function testDropTables(): void 
    {
        DataDefinition::dropTables();
    }
}