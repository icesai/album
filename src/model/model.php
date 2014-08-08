<?php
namespace model;

use \PDO;

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
            $stmt->execute($array);
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }

    }

    public function update($table, $query1, $query2, $array)
    {
        try {
            $stmt = $this->con->prepare('UPDATE '.$table.' SET '.$query1.' WHERE '.$query2);
            $stmt->execute($array);
        
        } catch (PDOException $e) {
           ErrorC::showErrorC('0');
        }
    }
    
    public function del($table, $query)
    {
        try {
            $this->con->query('DELETE FROM '.$table.' WHERE '.$query);
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
    }
}
