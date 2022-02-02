<?php
//创建内存表
use Swoole\Table;
$table = new Table(1024);
//内存表增加一行
$table->column('id',TYPE_INT);
$table->column('name', TYPE_STRING);
$table->column('age', TYPE_INT);
$table->create();

$table->set('singwa_imooc', ['id' => 1, 'name' => 'singwa', 'age' => 14]);

print_r($table->get('singwa_imooc'));