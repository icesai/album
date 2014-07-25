<?php
include '../model/dbM.php';
include '../view/view.php';

$result = call_user_func('dbconn::del');
// $dbc = new dbconn;
// $result = $dbc->del();
// return new view($result, "../../templates/albumT.php");
header("refresh:1 ; url = albumC.php");