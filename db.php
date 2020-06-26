<?php

require __DIR__ . '/vendor/autoload.php';

if (isset($argv[1])) {
    switch ($argv[1]) {
        case 'createTables':
            App\CLI\Command::createTables();
            break;
        case 'dropTables':
            App\CLI\Command::dropTables();
            break;
        case 'refresh':
            App\CLI\Command::refresh();
            break;
        default:
            echo("Comando inválido.");
            break;
    }
} else {
    App\CLI\Command::help();
}
