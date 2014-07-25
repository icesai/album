<?php
include '../model/dbM.php';
include '../view/view.php';

$result = call_user_func('dbconn::viewall');
// $dbc = new dbconn;
// $result = $dbc->connectMysql();

return new view($result, "../../templates/editalbumT.php");