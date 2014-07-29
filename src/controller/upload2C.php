<?php
include '../model/dbM.php';
include '../view/view.php';

$msg = call_user_func(aaa.'\Dbconn::upload');

switch ($msg[0])
{
    case a:
        return new see\view($msg, "../../templates/uploaderrorT.php");

    case b:
        return new see\view($msg, "../../templates/uploadokT.php");

    default:
        break;
}
