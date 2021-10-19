<?php

class Database {

    private $host;
    private $user;
    private $pass;
    private $db;
    public $mysqli;


    public function __construct() {
        $this->Connect();
    }


    private function Connect(){
        $this->host = '';
        $this->user = '';
        $this->pass = '';
        $this->db = '';

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }

        return $this->mysqli;
    }


    public function Select($sql){

        $result = mysqli_query($this->mysqli, $sql);


        if (mysqli_num_rows($result) > 0) {
            
            $data = array();

            while($row = mysqli_fetch_assoc($result)) {
                $data += $row;
            }

            return $data;

        } 
          
        mysqli_close($this->mysqli);
    }


    public function Insert($sql) {
        if (mysqli_query($this->mysqli, $sql)) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->mysqli);
        }
        
        mysqli_close($this->mysqli);
    }


    public function Delete($sql) {
        if (mysqli_query($this->mysqli, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($this->mysqli);
        }
          
        mysqli_close($this->mysqli);
    }


    public function Update($sql) {
        if (mysqli_query($this->mysqli, $sql)) {
            echo "Record updated successfully";
        } else {
        echo "Error updating record: " . mysqli_error($this->mysqli);
        }
          
        mysqli_close($this->mysqli);
    }

}