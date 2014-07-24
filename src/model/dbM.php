<?php

class dbconn
{

    function connectMysql()
    {
        $con=mysqli_connect("localhost", "root", "1234", "aaa");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $con ;
    }

    function viewall()
    {
         
        $con = call_user_func('dbconn::connectMysql');

        $result = mysqli_query($con, "SELECT * FROM aaa");

        mysqli_close($con);
        //          return $result;
         
        return $result;
         
    }
     
}

