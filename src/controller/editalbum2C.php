<?php
include '../model/dbM.php';
include '../view/view.php';

$result = call_user_func(aaa.'\Dbconn::edit');

return new see\view($result, "../../templates/editalbumT.php");
