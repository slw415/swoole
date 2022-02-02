<?php
//创建内存表
use Swoole\Table;
$table = new Table(1024);
//内存表增加一行
$table->column('id',$table::TYPE_INT, 4);
$table->column('name', $table::TYPE_STRING,64 );
$table->column('age', $table::TYPE_INT, 3);
$table->create();

$table->set('singwa_imooc', ['id' => 1, 'name' => 'singwa', 'age' => 14]);

print_r($table->get('singwa_imooc'));