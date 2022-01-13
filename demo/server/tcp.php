<?php

$server = new Swoole\Server('127.0.0.1', 9501);

$server->on('Connect', function ($server, $d){
    echo "Client:Connect.\n";
});

//监听数据接收事件
$server->on('Receive', function ($server, $fd, $reactor_id, $data){
   $server->send($fd, "Server:{$data}");
});

//监听链接关闭事件
$server->on('Close',function ($server, $fd){
    echo "Clinent:Close.\n";
});
//启动服务器
$server->start();