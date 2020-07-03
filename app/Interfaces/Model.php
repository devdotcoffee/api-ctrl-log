<?php

namespace App\Interfaces;

interface Model 
{
    /**
     * Get all data from database
     */
    public static function getAll(): Array;

    /**
     * Get data from database by ID
     */
    public static function getByID(int $id): Array;

}