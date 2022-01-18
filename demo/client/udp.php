<?php
//链接swoole tcp 服务
$client = new Swoole\Client(SWOOLE_SOCK_UDP);
if (!$client->connect('127.0.0.1', 9502, -1)){
    echo "链接失败";
    exit;
}
//php cli 常量
fwrite(STDOUT,'请输入消息:');
$msg = trim(fgetc(STDIN));

//发送消息 给 tcp server 服务器
$client->send($msg);
//接收 来自server 的数据
$res = $client->recv();
echo $res;
