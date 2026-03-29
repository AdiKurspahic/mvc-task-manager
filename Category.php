<?php
class Category {
    private $conn;
    private $table = "categories";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function create($name) {
        $name = $this->conn->real_escape_string($name);
        $sql = "INSERT INTO {$this->table} (name) VALUES ('$name')";
        return $this->conn->query($sql);
    }

    public function update($id, $name) {
        $id = (int)$id;
        $name = $this->conn->real_escape_string($name);
        $sql = "UPDATE {$this->table} SET name = '$name' WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM {$this->table} WHERE id = $id";
        return $this->conn->query($sql);
    }
}