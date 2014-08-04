<?php
require 'vendor/autoload.php';
use Pux\Mux;

$mux = new Mux;

$mux->add('/', array('controller\Albumcontroller','albumC'));
$mux->add('/upload', array('controller\Albumcontroller','uploadC'));
$mux->any('/doupload', array('controller\Albumcontroller','douploadC'));
$mux->any('/edit', array('controller\Albumcontroller','editC'));
$mux->any('/editalbum', array('controller\Albumcontroller','edit2C'));
$mux->any('/delimg', array('controller\Albumcontroller','delimgC'));
$mux->sort();

return $mux;
