<?php
use aaa\Dbconn;
include '../model/dbM.php';

// $result = call_user_func(aaa.'\Dbconn::del');
$aaa = new Dbconn();
$result = $aaa->del();

header("refresh:1 ; url = albumC.php");
