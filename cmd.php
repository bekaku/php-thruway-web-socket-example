<?php
require __DIR__ . '/vendor/autoload.php';
// require '../vendor/autoload.php';
// require 'C:\composer/vendor/autoload.php';

//un mark if you want to quiet mode
//use Psr\Log\NullLogger;
//use Thruway\Logging\Logger;
//Logger::set(new NullLogger());

$router = new Thruway\Peer\Router();
$transportProvider = new Thruway\Transport\RatchetTransportProvider("0.0.0.0", 9000);//running websocket port 9000
$router->addTransportProvider($transportProvider);
$router->start();
