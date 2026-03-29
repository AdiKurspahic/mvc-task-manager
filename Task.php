<?php
class Task {
    private $conn;
    private $table = "tasks";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT tasks.*, categories.name AS category_name
                FROM {$this->table}
                INNER JOIN categories ON tasks.category_id = categories.id
                ORDER BY tasks.id DESC";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function create($title, $description, $due_date, $status, $category_id) {
        $title = $this->conn->real_escape_string($title);
        $description = $this->conn->real_escape_string($description);
        $due_date = $this->conn->real_escape_string($due_date);
        $status = $this->conn->real_escape_string($status);
        $category_id = (int)$category_id;

        $sql = "INSERT INTO {$this->table} (title, description, due_date, status, category_id)
                VALUES ('$title', '$description', '$due_date', '$status', $category_id)";
        return $this->conn->query($sql);
    }

    public function update($id, $title, $description, $due_date, $status, $category_id) {
        $id = (int)$id;
        $title = $this->conn->real_escape_string($title);
        $description = $this->conn->real_escape_string($description);
        $due_date = $this->conn->real_escape_string($due_date);
        $status = $this->conn->real_escape_string($status);
        $category_id = (int)$category_id;

        $sql = "UPDATE {$this->table}
                SET title = '$title',
                    description = '$description',
                    due_date = '$due_date',
                    status = '$status',
                    category_id = $category_id
                WHERE id = $id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM {$this->table} WHERE id = $id";
        return $this->conn->query($sql);
    }
}