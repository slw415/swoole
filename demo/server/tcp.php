<?php

$server = new Swoole\Server('127.0.0.1', 9501);

$server->set(
    [
        'work_num' => 4,//work 进程数
        'max_request' => 10000

    ]
);
/**
 * $fd 客户端链接的唯一标识
 * $reactor_id 线程id
 */
$server->on('Connect', function ($server, $d, $reactor_id){
    echo "Client:{$reactor_id}-{$d}Connect.\n";
});

//监听数据接收事件
$server->on('Receive', function ($server, $fd, $reactor_id, $data){
   $server->send($fd, "Server:{$reactor_id}-{$data}");
});

//监听链接关闭事件
$server->on('Close',function ($server, $fd){
    echo "Clinent:Close.\n";
});
//启动服务器
$server->start();