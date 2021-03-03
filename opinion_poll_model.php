<?php

class OpinionPoll{

    private $host = 'localhost'; private $dbname= 'opnion_poll'; 
    private $user = 'root'; private $pwd = ''; private $dbConn;

    public function __construct(){
    
        $this->dbConn = mysqli_connect($this->host, $this->user, $this->pwd);
        
        if(!$this->dbConn) {
            die('Unable to connect to MYSQL: '.mysqli_error());
        }
        
        if (!mysqli_select_db($this->dbConn,$this->dbname))
            die('Unable to select database: '.mysqli_error());
       
    }

    public function execute_query($sql_stmt){

        $result = mysqli_query($this->dbConn, $sql_stmt);//Execute query
        return $result;
    }

    public function select($sql_stmt) {

        $result = mysqli_query($this->dbConn,$sql_stmt);

        if (!$result) die("Database access failed: " . mysqli_error());

        $rows = mysqli_num_rows($result);

        $data = array();

        if ($rows) {

            while ($row = mysqli_fetch_array($result)) {

                $data = $row;

            }

        }

        return $data;

    }

    public function insert($sql_stmt) {
        
        return $this->execute_query($sql_stmt);

    }

    public function __destruct(){

        mysqli_close($this->db_handle);

    }
}