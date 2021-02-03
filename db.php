<?php
class Db{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'project';

    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);

        if ($this->conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        return $this->conn;
    }
}

$conn = new Db();