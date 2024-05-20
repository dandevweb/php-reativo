<?php

use React\EventLoop\Factory;

require_once 'vendor/autoload.php';

$loop = Factory::create();

$fn = function () {
  echo "Executando a cada 1 segundo" . PHP_EOL;
};

$loop->addTimer(1, $fn);

$loop->run();
