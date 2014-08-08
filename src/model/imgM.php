<?php
namespace model;


class ImgM extends DbconM
{
    private  $table;
    public function __construct()
    {
        $this->table = 'aaa';
        parent::__construct();
    }
    
    public function newImg()
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$_FILES["file"]["name"]);
        $query1='tmpname, imgname, username';
        $query2=':tmpname,:imgname,:username';
        $array=array(
                   ':tmpname' => $_FILES["file"]["name"],
                   ':imgname' => $_POST["imgname"],
                   ':username' => $_POST["username"]
                );
        $this->insert($this->table, $query1, $query2, $array);
        $msg = array($_POST["imgname"], $_POST["username"]);
        return $msg;
    }

    public function showImg()
    {
        return self::select($this->table, $query);
    }

    public function editImg()
    {
        $imgno=$_GET["imgno"];
        $imgname=$_GET["imgname"];
        $query1 = 'imgname = :imgname';
        $query2 = 'imgno = :imgno';
        $array = array(':imgno'   => $imgno, ':imgname' => $imgname);
        $this->update($this->table, $query1, $query2, $array);
        return self::select($this->table, $query);
    }

    public function delImg()
    {
        if ($_POST["imgno"] == null) {
        
            ErrorC::showErrorC('4');
        } else {
            $imgno = $_POST["imgno"];
            $alldel = implode(", ", $imgno);
            $query = ('imgno in ('.$alldel.')');
            $result = $this->select($this->table,$query);
            
            foreach ($result as $row) {
                
                unlink("img/".$row['tmpname']);
            }
            try {
                $query = ('imgno in ('.$alldel.')');
                $result = $this->del($this->table, $query);
        
            } catch (PDOException $e) {
                ErrorC::showErrorC('0');
            }
        }
    }
}
