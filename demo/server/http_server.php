<?php
$http = new Swoole\Http\Server('0.0.0.0', 8811);
$http->set(
  [
      'enable_static_handler' => true,
      'document_root' => '/home/work/study/swoole_mooc/demo/data'
  ]
);
$http ->on('Request', function ($request,$response){
    $response->header('Content-Type', 'text/html; charset=utf-8');
    print_r($request->get);
    $response->end('<h1>Hello Swoole. #' . rand(1000, 9999) . '</h1>');
});
$http->start();