<?php

require __DIR__.'/vendor/autoload.php';

echo App\Request::open($_REQUEST, $_SERVER['REQUEST_METHOD']);