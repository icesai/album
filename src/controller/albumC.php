<?php
include '../model/dbM.php';
require "../../vendor/autoload.php";

$loader = new \Twig_Loader_Filesystem('../../templates');
$twig = new \Twig_Environment($loader);
$result = call_user_func(AAA.'\Dbconn::viewall');
$i=0;
while ($row = mysqli_fetch_array($result)) {

    $see[$i]= $row;
    $i++;
}
echo $twig->render('albumT.html',array('seeall'=>$see));
