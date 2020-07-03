<?php

require __DIR__.'/vendor/autoload.php';

echo App\Request::open($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
