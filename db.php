<?php
class Db{
    private $host;
    private $username;
    private $password;
    private $db;

    protected $connection;

    public function __construct(){
        if (!isset($this->connection)) {
            $this->host = 'localhost';
            $this->username= 'root';
            $this->password= '';
            $this->db= 'project';

            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);
 
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }
        return $this->connection;
    }
}