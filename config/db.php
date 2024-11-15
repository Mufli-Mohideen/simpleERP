<?php
//Database Class for Initializing Connection with MySQL Database
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "2003Muf$24";
    private $dbname = "simpleerp";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
