<?php 

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

require_once 'vendor/autoload.php';

$chatComponent = new class implements MessageComponentInterface {
    private SplObjectStorage $connections;

    public function __construct()
    {
        $this->connections = new SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) 
    {
        echo "New connection! \n";
        $this->connections->attach($conn);
    }

    public function onClose(ConnectionInterface $conn)
    {
        echo "Connection closed! \n";
        $this->connections->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        foreach ($this->connections as $client)
        {
            if ($from !== $client)
            {
                $client->send((string) $msg);
            }
        }
    }
};

$server = IoServer::factory(
    new HttpServer(
    new WsServer($chatComponent)
    ), 8002);

$server->run();
