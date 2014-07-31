<?php
require 'vendor/autoload.php';
use Pux\Mux;
use Pux\Executor;
$mux = new Mux;
$mux->get('/get', ['HelloController','helloAction']);
$mux->post('/post', ['HelloController','helloAction']);
$mux->put('/put', ['HelloController','helloAction']);

$mux->mount('/hello', new HelloController);

$route = $mux->dispatch( $_SERVER['PATH_INFO'] );
echo Executor::execute($route);