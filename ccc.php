<?php

include 'src/model/dbM.php';
require "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);
$result = call_user_func(aaa.'\Dbconn::viewall');
$con = call_user_func(AAA.'\Dbconn::connectMysql');
$sql="SELECT * FROM `aaa`";
$i=0;

while ($row = mysqli_fetch_array($result)) {

    $see[$i]= $row;    
    $i++;      
}
// var_dump($aaa);
// exit();

echo $twig->render('aaa.html',array('seeall'=>$see));

// echo $twig->render('aaa.html',$show );