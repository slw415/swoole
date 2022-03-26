<?php
use function Swoole\Coroutine\run;

for ($i = 0 ;$i<=2;$i++){
    run(function ()use ($i){

    });
}
