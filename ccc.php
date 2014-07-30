<?php
require "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader);

$show = array('name' => 'Ju');


echo $twig->render('aaa.html',$show );