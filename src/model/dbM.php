<?php
namespace model;
use \PDO;

class Dbconn
{

    private $con;
    public function __construct()
    {
        $this->con = new PDO(
                        "mysql:host=localhost;dbname=aaa",'root','1234',
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    }    

    public function viewall()
    {
        $result = $this->con->query('SELECT * FROM aaa');
        return $result;
    }

    public function upload()
    {
        if ($_FILES["file"]["error"] > 0) {

            $msg = array("a", "請確認您的檔案是否正確！");
            return $msg ;
        } else {
            if (file_exists("img/" . $_FILES["file"]["name"])) {

                $msg = array("a", "已有相同檔案名稱，請勿重覆上傳相同檔案或更改檔案名稱");
                return $msg ;
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$_FILES["file"]["name"]);
                try
                {
                    $query='INSERT INTO aaa (tmpname, imgname, username) VALUES(:tmpname,:imgname,:username)';
                    $stmt = $this->con->prepare($query);
                    $stmt->execute(array(
                                    ':tmpname' => $_FILES["file"]["name"],
                                    ':imgname' => $_POST["imgname"],
                                    ':username' => $_POST["username"]
                    ));
                } catch(PDOException $e)
                {
                    echo 'Error: ' . $e->getMessage();
                }
                $msg = array("b", $_POST["imgname"], $_POST["username"]);
                return $msg;
            }
        }
    }

    public function edit()
    {
        $imgno=$_GET["imgno"];
        $imgname=$_GET["imgname"];
        try {
            $stmt = $this->con->prepare('UPDATE aaa SET imgname = :imgname WHERE imgno = :imgno');
            $stmt->execute(array(
                            ':imgno'   => $imgno,
                            ':imgname' => $imgname
            ));
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $result = $this->con->query('SELECT * FROM aaa');
        return $result;
    }

    public function del()
    {

        if ($_POST["imgno"]== null){
            
            echo "<script> alert('您沒有勾選任何要刪除的圖片！') </script>";
        }else {
            $alldel = str_repeat("?,", count($_POST["imgno"])-1) . "?";
            $killfn =  $this->con->prepare('SELECT tmpname FROM aaa where imgno in ('.$alldel.')');

            $killfn->execute($_POST["imgno"]);
            foreach($killfn as $row) {
                unlink("img/".$row['tmpname']);
            }
            try {
                $stmt = $this->con->prepare('DELETE FROM aaa WHERE imgno in ('.$alldel.')');
                $stmt->execute($_POST["imgno"]);
                 
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
            echo "<script> alert('圖片已刪除！') </script>";
        }
    }

    public function uploads()
    {
        $uploads_dir = 'img';
        foreach ($_FILES["ff"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {

                $tmp_name = $_FILES["ff"]["tmp_name"][$key];
                $name = $_FILES["ff"]["name"][$key];
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $con = $this->connectMysql();
                $tmpname = mysqli_real_escape_string($con, $_FILES["ff"]["name"][$key]);
                $imgname = '';
                $username = 'aaa';
                $sql="INSERT INTO aaa (tmpname, imgname, username)
                VALUES ('$tmpname', '$imgname', '$username')";
                mysqli_query($con, $sql);
                /*                 if (!mysqli_query($con, $sql)) {
                 die('Error: ' . mysqli_error($con));
                }
                mysqli_close($con);
                $msg = array("b", $_POST["imgname"], $_POST["username"]);
                return $msg;
                */
            }
        }
    }
}

