<?php
use Swoole\Process;
$process = new Process(function (){
    //todo
       echo 111;
},false);
$pid = $process->start();
echo  $pid.PHP_EOL;