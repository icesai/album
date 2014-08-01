<?php
use model\Dbconn;
include '../model/dbM.php';
require "../../vendor/autoload.php";

$loader = new \Twig_Loader_Filesystem('../../templates');
$twig = new \Twig_Environment($loader);
// $result = call_user_func(AAA.'\Dbconn::edit');
$aaa = new Dbconn();
$result = $aaa->edit();
$i=0;
while ($row = mysqli_fetch_array($result)) {

    $see[$i]= $row;
    $i++;
}

echo $twig->render('editalbumT.html',array('seeall'=>$see));