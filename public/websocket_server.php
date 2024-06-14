<?php

use Swoole\WebSocket\Server;

$server = new Server("127.0.0.1", 9502);

$server->on("start", function (Server $server) {
    echo "Swoole WebSocket server started at http://127.0.0.1:9502\n";
});

$server->on('open', function (Server $server, $request) {
    echo "Connection opened: {$request->fd}\n";
});

$server->on('message', function (Server $server, $frame) {
    echo "Received message: {$frame->data}\n";
    $server->push($frame->fd, "Hello, this is Swoole WebSocket server");
});

$server->on('close', function ($server, $fd) {
    echo "Connection closed: {$fd}\n";
});

$server->start();
