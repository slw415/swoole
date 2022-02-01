<?php
use Swoole\Process;
$process = new Process(function (){
    //todo

},true);
$pid = $process->start();
echo  $pid.PHP_EOL;