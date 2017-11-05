<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conn
 *
 * @author user
 */
class Conn {
    //put your code here
    private $hostName;
    private $userName;
    private $pass;
    private $dbName;
    private $conn;
    
    function __construct(){
        $this->hostName='localhost';
        $this->userName='root';
        $this->pass='';
        $this->dbName='cleanning_system';
        $this->conn = mysqli_connect($this->hostName, $this->userName, $this->pass, $this->dbName);
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
               
    }    
        
    public function getConn(){
        if ($this->conn) {
            return $this->conn;
        } else {
            return null;
        }
    }
    
    public function closeCOnnection(){
        mysqli_close($this->conn);
    }
    
}

?>
