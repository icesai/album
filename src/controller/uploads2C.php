<?php
include '../model/dbM.php';
include '../view/view.php';

// $msg = call_user_func('dbconn::uploads');
$dbc = new Dbconn;
$msg = $dbc->uploads();

// switch ($msg[0])
// {
// case a:
//     return new view($msg , "../../templates/uploaderrorT.php");

// case b:
//     return new view($msg , "../../templates/uploadokT.php");
// default:
//     break;
// }
