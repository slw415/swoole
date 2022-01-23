<?php

/**
 * ws封装
 */
class Ws{
    const HOST = "0.0.0.0";
    const PORT = 8812;
    public $ws = null;
    public function __construct(){
        $this->ws = new Swoole\WebSocket\Server('0.0.0.0', 9502);
        $this->ws->set(
            [
                'worker_num' =>2,
                'task_worker_num' =>2,
                'enable_static_handler' => true,
                'document_root' => '/home/work/study/swoole_mooc/swoole/data'
            ]);

        $this->ws->on("open",[$this,'onOpen']);
        $this->ws->on("message", [$this,'onMessage']);
        $this->ws->on("task", [$this,'onTask']);
        $this->ws->on("finish", [$this,'onFinish']);
        $this->ws->on("close",[$this,'onClose']);
        $this->ws->start();
    }

    /**
     *DESC:接听ws链接事件
     *AUTHOR:余杭胡歌
     *DATE:2022/1/23
     *TIME:6:48 下午
     * @param $ws
     * @param $request
     */
    public function onOpen($ws,$request){
        var_dump($request->fd);
    }

    /**
     *DESC:监听ws消息事件
     *AUTHOR:余杭胡歌
     *DATE:2022/1/23
     *TIME:6:48 下午
     * @param $ws
     * @param $frame
     */
    public function onMessage($ws, $frame){
        echo "ser-push-message:{$frame->data}\n";
        //todo 10s
        $data = [
          'task' => 1,
          'fd' => $frame->fd
        ];
        $ws->task($data);
        $ws->push($frame->fd, "server-push:".date("Y-m-d H:i:s"));
    }

    /**
     *DESC:
     *AUTHOR:余杭胡歌
     *DATE:2022/1/23
     *TIME:7:21 下午
     * @param $serv
     * @param $taskId
     * @param $workId
     * @param $data
     */
    public function onTask($serv, $taskId, $workId, $data){
        print_r($data);
        //耗时场景
        sleep(10);
        return "on task finish";//告诉worker进程
    }

    public function onFinish($serv,$taskId,$data){
        echo "taskId:{$taskId}\n";
        echo "finish-data-success:{$data}";

    }
    /**
     *DESC:ws 关闭事件
     *AUTHOR:余杭胡歌
     *DATE:2022/1/23
     *TIME:6:52 下午
     * @param $ws
     * @param $fd
     */
    public function onClose($ws,$fd){
        echo "clientid:{$fd}\n";
    }


}
$obj = new Ws();