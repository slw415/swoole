<?php
use function Swoole\Coroutine\run;

run(function (){

    Swoole\Coroutine\System::sleep(1);
    echo 2;
});
echo 3;
run(function (){
    echo 1;
});