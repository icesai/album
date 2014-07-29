<?php
include '../model/dbM.php';
include '../view/view.php';

$result = call_user_func(aaa.'\Dbconn::viewall');


return new see\view($result, "../../templates/albumT.php");
