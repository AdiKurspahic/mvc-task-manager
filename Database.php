<?php
class Database {
    private $host = "localhost";
    private $dbname = "mvc_task_manager";
    private $username = "root";
    private $password = "";

    public function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Greška konekcije: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");
        return $conn;
    }
}