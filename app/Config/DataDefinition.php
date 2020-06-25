<?php

namespace App\Config;

use App\Tables\Cliente;
use App\Tables\Funcionario;
use App\Tables\Gerente;
use App\Tables\LoginUsuario;
use App\Tables\Pedido;

/** 
 * @author Erick O. dos Santos
*/
class DataDefinition
{
    protected $tables = [
        'Cliente',
        'Funcionario',
        'Gerente',
        'LoginUsuario',
        'Pedido'
    ];

    public function createTables(): void
    {
        foreach ($this->tables as $table) {
            $classWithNamespace = 'App\Tables\\' . $table;
            forward_static_call(array($classWithNamespace, 'create'));
        }
    }

    public function dropTables(): void
    {
        foreach ($this->tables as $table) {
            $classWithNamespace = 'App\Tables\\' . $table;
            forward_static_call(array($classWithNamespace, 'drop'));
        }
    }

    public function getTables(): Array
    {
        return $this->tables;
    }

    public function countTables(): int 
    {
        return count($this->tables);
    }
}