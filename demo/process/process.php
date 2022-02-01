<?php
use Swoole\Process;
$process = new Process(function (Process $pro){
    //todo
       $pro->exec("/home/work/study/soft/php/bin/php",[__DIR__.'./server/http_server.php']);
},false);
$pid = $process->start();
echo  $pid.PHP_EOL;