<?php
$ws = new Swoole\WebSocket\Server('0.0.0.0', 9502);

//监听webSocket链接打开事件 握手完成后会调用此函数
$ws->on('Open', function ($ws, $request){
   $ws->push($request->fd, "hello welcome\n");
});
//监听WebSocket消息事件
$ws->on('Message', function ($ws, $frame){
   echo "Message:{$frame->data}\n";
});
$ws->on('Close',function ($ws, $fd){
   echo "client-{$fd} is closed\n";
});
$ws->start();