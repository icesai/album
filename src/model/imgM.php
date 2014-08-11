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
    
    public function newImg($tmpname, $imgname, $username)
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$_FILES["file"]["name"]);
        $query1='tmpname, imgname, username';
        $query2=':tmpname,:imgname,:username';
        $array=array(
                   ':tmpname' => $tmpname,
                   ':imgname' => $imgname,
                   ':username' => $username
                );
        $this->insert($this->table, $query1, $query2, $array);
        return ;
 
    }

    public function showImg()
    {
        return self::select($this->table, $query);
    }

    public function editImg($imgno, $imgname)
    {
        $query1 = 'imgname = :imgname';
        $query2 = 'imgno = :imgno';
        $array = array(':imgno'   => $imgno, ':imgname' => $imgname);
        $this->update($this->table, $query1, $query2, $array);
        return self::select($this->table, $query);
    }

    public function delImg($imgno)
    {
        if ($imgno == null) {
        
            ErrorC::showErrorC('4');
        } else {
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
