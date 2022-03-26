<?php
use function Swoole\Coroutine\run;

run(function (){

    sleep(1);
    echo 2;
});
echo 3;
run(function (){

    sleep(1);
    echo 1;
});