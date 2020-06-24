<?php 

namespace App\Interfaces;

interface Table {

    public static function create();
    
    public static function drop();
}