<?php

$streamList = [
    stream_socket_client('tcp://localhost:8080'),
    stream_socket_client('tcp://localhost:8001'),
    fopen('arquivo.txt', 'r'),
    fopen('arquivo2.txt', 'r'),
];
fwrite($streamList[0], "GET /http-server.php HTTP/1.1" . PHP_EOL . PHP_EOL);

foreach ($streamList as $stream) {
    stream_set_blocking($stream, false);
}

do {
    $copyReadStreamList = $streamList;
    $numeroDeStreams = stream_select($copyReadStreamList, $write, $except, 0, 200000);

    if ($numeroDeStreams === 0) {
        continue;
    }
    
    foreach ($copyReadStreamList as $key => $stream) {
        $conteudo = stream_get_contents($stream);
        $posicaoFimHttp = strpos($conteudo, "\r\n\r\n");
        if ($posicaoFimHttp !== false) {
            echo substr($conteudo, $posicaoFimHttp + 4);
        } else {
            echo $conteudo;
        }
        unset($streamList[$key]);
    }
} while (!empty($streamList));

echo "Terminou de ler todos os streams" . PHP_EOL;
