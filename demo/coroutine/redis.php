<?php
use Swoole\Coroutine\Redis;
use function Swoole\Coroutine\run;
run(function () {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    var_dump($redis->set('slw',2222));
    var_dump($redis->get('key'));
});
