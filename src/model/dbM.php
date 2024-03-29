<?php
namespace model;

use \PDO;
use helper\ErrorC;

class DbconM
{
    private $con;
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=aaa", 'root', '1234');
        $this->con->exec("SET NAMES utf8");
    }
    
    public function select($table, $query)
    {
        if($query==null){
            
            $query = '1';
        }
        try {

            $result = $this->con->query('SELECT * FROM '.$table.' WHERE '.$query);

        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
        return $result;

    }
    
    public function insert($table, $query1, $query2, $array)
    {
        try {
            $stmt = $this->con->prepare('INSERT INTO '.$table.' ('.$query1.') VALUES ('.$query2.')');
            $aa=$stmt->execute($array);
            return $aa;
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }

    }

    public function update($table, $query1, $query2, $array)
    {
        try {
            $stmt = $this->con->prepare('UPDATE '.$table.' SET '.$query1.' WHERE '.$query2);
            $aa=$stmt->execute($array);

            return $aa;
            
        } catch (PDOException $e) {
           ErrorC::showErrorC('0');
        }
    }
    
    public function del($table, $query)
    {
        try {
            $stmt=$this->con->prepare('DELETE FROM '.$table.' WHERE '.$query);
            $aa=$stmt->execute();
            return $aa;
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
    }
}
