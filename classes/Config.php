<?php

class Config{

    private $servername = "localhost";
    private $username = "root";
    private $password ="";
    private $database ="project";


    public $conn;

    public function __construct(){
        //Create the connection
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->database);

        //Check the connection
        if($this->conn->connect_error){
            //stop the connection and show error message
            die("Connection error".$this->conn->connect_error);
        }
        return $this->conn;
    }
}

?>