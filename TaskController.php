<?php
require_once "../config/Database.php";
require_once "../models/Task.php";
require_once "../models/Category.php";

class TaskController {
    private $task;
    private $category;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->task = new Task($db);
        $this->category = new Category($db);
    }

    public function index() {
        $tasks = $this->task->getAll();
        include "../views/tasks/index.php";
    }

    public function create() {
        $categories = $this->category->getAll();
        include "../views/tasks/create.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = trim($_POST["title"] ?? "");
            $description = trim($_POST["description"] ?? "");
            $due_date = $_POST["due_date"] ?? "";
            $status = $_POST["status"] ?? "Novo";
            $category_id = $_POST["category_id"] ?? "";

            if ($title !== "" && $category_id !== "") {
                $this->task->create($title, $description, $due_date, $status, $category_id);
            }
        }

        header("Location: index.php?controller=task&action=index");
        exit;
    }

    public function edit() {
        $id = $_GET["id"] ?? null;
        if (!$id) {
            header("Location: index.php?controller=task&action=index");
            exit;
        }

        $taskResult = $this->task->getById($id);
        $task = $taskResult ? $taskResult->fetch_assoc() : null;

        if (!$task) {
            header("Location: index.php?controller=task&action=index");
            exit;
        }

        $categories = $this->category->getAll();
        include "../views/tasks/edit.php";
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"] ?? null;
            $title = trim($_POST["title"] ?? "");
            $description = trim($_POST["description"] ?? "");
            $due_date = $_POST["due_date"] ?? "";
            $status = $_POST["status"] ?? "Novo";
            $category_id = $_POST["category_id"] ?? "";

            if ($id && $title !== "" && $category_id !== "") {
                $this->task->update($id, $title, $description, $due_date, $status, $category_id);
            }
        }

        header("Location: index.php?controller=task&action=index");
        exit;
    }

    public function delete() {
        $id = $_GET["id"] ?? null;
        if ($id) {
            $this->task->delete($id);
        }

        header("Location: index.php?controller=task&action=index");
        exit;
    }
}