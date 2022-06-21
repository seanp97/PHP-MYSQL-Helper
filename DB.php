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


    private function Connect() {
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


    public function Select($sql) {

        $result = mysqli_query($this->mysqli, $sql);

        if (!$result) {
            die(mysqli_error($this->mysqli));
        }

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return $data;
        } 
          
    }


    public function SQL($sql) {
        if (!mysqli_query($this->mysqli, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->mysqli);
        } 

    }

}
