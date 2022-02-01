<?php
use Swoole\Process;
echo "process-start-time:".date("Y-m-d H:i:s");
$urls = [
  'http://baidu.com',
  'http://sina.com.cn',
  'http://qq.com',
  'http://baidu.com?search=singwa',
  'http://baidu.com?search=singwa2',
  'http://baidu.com?search=imooc',
];

for ($i = 0; $i<6; $i++){
    //子进程
    $process = new Process(function (Process $pro) use($i,$urls){
        //todo
        $content = curlData($urls[$i]);
        echo $content.PHP_EOL;
    },true);
    $pid = $process->start();
    $workers[$pid] = $process;
}
foreach ($workers as $process){
    echo  $process->read();
}
function curlData($url){
    sleep(1);
    return $url."success".PHP_EOL;
}
echo "process-end-time:".date("Y-m-d H:i:s");