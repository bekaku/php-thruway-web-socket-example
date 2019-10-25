<?php


//require __DIR__ . '/vendor/autoload.php';
require '../vendor/autoload.php';

use Thruway\ClientSession;
use Thruway\Connection;

use Psr\Log\NullLogger;
use Thruway\Logging\Logger;
Logger::set(new NullLogger());

$connection = new Connection(
    [
        "realm"   => 'realm1',
		"url"     => 'ws://127.0.0.1:9000/',
    ]
);
$connection->on('open', function (ClientSession $session) use ($connection) {

      $session->publish('com.myapp.hello', 
      [array('key'=>'Hello, world from PHP!!!')],
       [], 
       ["acknowledge" => true])->then(
          function () use ($connection) {
              $connection->close(); // shutdown after unsuccessful publish
          },
          function ($error) use ($session) {
              $connection->close(); // shutdown after unsuccessful publish
          }
      );
      //$connection->close(); // shutdown after unsuccessful publish
  }
);
$connection->open();
