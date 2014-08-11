<?php
require 'vendor/autoload.php';
use Pux\Mux;

$mux = new Mux;

$mux->add('/a', array('controller\UserC','albumMainC'));
$mux->add('/', array('controller\AlbumC','imgMainC'));
$mux->add('/upload', array('controller\AlbumC','uploadImgC'));
$mux->any('/doupload', array('controller\AlbumC','douploadC'));
$mux->any('/edit', array('controller\AlbumC','editC'));
$mux->any('/editalbum', array('controller\AlbumC','doeditC'));
$mux->any('/delimg', array('controller\AlbumC','delimgC'));
$mux->sort();

return $mux;
