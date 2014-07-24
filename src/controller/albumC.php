<?php
include '../model/dbM.php';
include '../view/view.php';

$result = call_user_func('dbconn::viewall');

return new view($result, "../../templates/albumT.php");