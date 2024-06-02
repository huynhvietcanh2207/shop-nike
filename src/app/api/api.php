<?php
require_once 'config/database.php';
require_once 'models/Model.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$model = new Model();

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if (strpos($requestUri, '/products') !== false) {
    handleProducts($requestMethod, $model);
} elseif (strpos($requestUri, '/categories') !== false) {
    handleCategories($requestMethod, $model);
}

function handleProducts($method, $model) {
    if ($method === 'GET') {
        $sql = $model::$connection->prepare("SELECT * FROM products");
        $items = $model->select($sql);
        echo json_encode($items);
    } elseif ($method === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        $sql = $model::$connection->prepare("INSERT INTO products (name, price, image, description, size, views, likes) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("sisssii", $input['name'], $input['price'], $input['image'], $input['description'], $input['size'], $input['views'], $input['likes']);
        $sql->execute();
        echo json_encode(['success' => $sql->affected_rows > 0]);
    }
}

function handleCategories($method, $model) {
    if ($method === 'GET') {
        $sql = $model::$connection->prepare("SELECT * FROM categories");
        $items = $model->select($sql);
        echo json_encode($items);
    } elseif ($method === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        $sql = $model::$connection->prepare("INSERT INTO categories (name) VALUES (?)");
        $sql->bind_param("s", $input['name']);
        $sql->execute();
        echo json_encode(['success' => $sql->affected_rows > 0]);
    }
}
?>
