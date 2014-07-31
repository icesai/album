<?php
include '../model/dbM.php';
require "../../vendor/autoload.php";

$loader = new \Twig_Loader_Filesystem('../../templates');
$twig = new \Twig_Environment($loader);
$msg = call_user_func(aaa.'\Dbconn::upload');
switch ($msg[0])
{
    case a:
        echo $twig->render('uploaderrorT.html',array('upmsg'=>$msg));

    case b:
        echo $twig->render('uploadokT.html',array('upmsg'=>$msg));

    default:
        $msg=array("c","你這個小壞蛋！");
        echo $twig->render('uploaderrorT.html',array('upmsg'=>$msg));
}
