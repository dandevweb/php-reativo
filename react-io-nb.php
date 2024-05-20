<?php


use React\EventLoop\Factory;
use React\Stream\DuplexResourceStream;
use React\Stream\ReadableResourceStream;

require_once 'vendor/autoload.php';

$loop = Factory::create();
$streamList = [
  new ReadableResourceStream(stream_socket_client('tcp://localhost:8001'), $loop),
  new ReadableResourceStream(fopen('arquivo.txt', 'r'), $loop),
  new ReadableResourceStream(fopen('arquivo2.txt', 'r'), $loop),
];

$http = new DuplexResourceStream(stream_socket_client('tcp://localhost:8080'), $loop);
$http->write("GET /http-server.php HTTP/1.1" . PHP_EOL . PHP_EOL);
$http->on('data', function ($data) {
  $posicaoFimHttp = strpos($data, "\r\n\r\n");
  if ($posicaoFimHttp !== false) {
    print substr($data, $posicaoFimHttp + 4) . PHP_EOL;
  } else {
    print $data;
  }
});

foreach ($streamList as $stream) {
  $stream->on('data', fn ($data) => print $data . PHP_EOL);
}

$loop->run();
