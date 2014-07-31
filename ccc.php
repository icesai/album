<?php
require 'vendor/autoload.php';
use Pux\Mux;
use Pux\Executor;
$mux = new Mux;
$mux->get('/get', ['HelloController','helloAction']);
$mux->post('/post', ['HelloController','helloAction']);
$mux->put('/put', ['HelloController','helloAction']);
$route = $mux->dispatch( $_SERVER['route'] );
var_dump($mux);
exit();
echo Executor::execute($route);