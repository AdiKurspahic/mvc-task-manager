<?php
require_once "../config/Database.php";
require_once "../models/Category.php";

class CategoryController {
    private $category;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->category = new Category($db);
    }

    public function index() {
        $categories = $this->category->getAll();
        include "../views/categories/index.php";
    }

    public function create() {
        include "../views/categories/create.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = trim($_POST["name"] ?? "");
            if ($name !== "") {
                $this->category->create($name);
            }
        }
        header("Location: index.php?controller=category&action=index");
        exit;
    }

    public function edit() {
        $id = $_GET["id"] ?? null;
        if (!$id) {
            header("Location: index.php?controller=category&action=index");
            exit;
        }

        $categoryResult = $this->category->getById($id);
        $category = $categoryResult ? $categoryResult->fetch_assoc() : null;

        if (!$category) {
            header("Location: index.php?controller=category&action=index");
            exit;
        }

        include "../views/categories/edit.php";
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"] ?? null;
            $name = trim($_POST["name"] ?? "");

            if ($id && $name !== "") {
                $this->category->update($id, $name);
            }
        }

        header("Location: index.php?controller=category&action=index");
        exit;
    }

    public function delete() {
        $id = $_GET["id"] ?? null;
        if ($id) {
            $this->category->delete($id);
        }
        header("Location: index.php?controller=category&action=index");
        exit;
    }
}