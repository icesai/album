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
        return $result;         
    }

    function upload()
    {
        if ($_FILES["file"]["error"] > 0) {

            $msg = array("a", "Error: " . $_FILES["file"]["error"]);
            return $msg ;
        } else {
            if (file_exists("../../img/" . $_FILES["file"]["name"])) {

                $msg = array("a", "已有相同檔案名稱，請勿重覆上傳相同檔案或更改檔案名稱");
                return $msg ;
            } else {
                //                 echo "相片名稱: " . $_POST["imgname"]."<br/>";
                //                 echo "上傳者名稱: " . $_POST["username"]."<br/>";
                move_uploaded_file($_FILES["file"]["tmp_name"], "../../img/".$_FILES["file"]["name"]);
                $con = call_user_func('dbconn::connectMysql');
                $tmpname = mysqli_real_escape_string($con, $_FILES["file"]["name"]);
                $imgname = mysqli_real_escape_string($con, $_POST["imgname"]);
                $username = mysqli_real_escape_string($con, $_POST["username"]);
                $sql="INSERT INTO aaa (tmpname, imgname, username)
                VALUES ('$tmpname', '$imgname', '$username')";
                if (!mysqli_query($con, $sql)) {

                    die('Error: ' . mysqli_error($con));

                }
                mysqli_close($con);
                $msg = array("b", $_POST["imgname"], $_POST["username"]);
                return $msg;
            }
        }
         
    }

    function edit()
    {    
        $con = call_user_func('dbconn::connectMysql');
        $imgno=$_GET["imgno"];
        $imgname=$_GET["imgname"];
        mysqli_query($con, "UPDATE aaa SET imgname='".$imgname."' WHERE imgno= ".$imgno."");
        $result = mysqli_query($con, "SELECT * FROM aaa");
        mysqli_close($con);
        return $result;
        
    }
    
    function del()
    {
        $con = call_user_func('dbconn::connectMysql');
        $imgno = $_POST["imgno"];
        $alldel = implode(", ", $imgno);
        $killfn = mysqli_query($con, "select tmpname FROM aaa where imgno in (".$alldel.")");

        while ($row = mysqli_fetch_array($killfn)){
            
            unlink("../../img/".$row['tmpname']);
        }
        mysqli_query($con, "DELETE FROM aaa where imgno in (".$alldel.")");
        echo "<script> alert('圖片已刪除！') </script>";
        mysqli_close($con);
    }     
}

