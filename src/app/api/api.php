<?php
include 'database.php';
include 'model.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$model = new Model();

$requestMethod = $_SERVER['REQUEST_METHOD'];

// Handling CORS preflight request
if ($requestMethod === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

$requestData = json_decode(file_get_contents('php://input'), true);

if ($requestMethod === 'GET') {
    if (strpos($_SERVER['REQUEST_URI'], '/products') !== false) {
        handleProductsGET($model);
    } elseif (strpos($_SERVER['REQUEST_URI'], '/categories') !== false) {
        handleCategoriesGET($model);
    }
} elseif ($requestMethod === 'POST') {
    if (strpos($_SERVER['REQUEST_URI'], '/products') !== false) {
        handleProductsPOST($model, $requestData);
    } elseif (strpos($_SERVER['REQUEST_URI'], '/categories') !== false) {
        handleCategoriesPOST($model, $requestData);
    }
}

function handleProductsGET($model) {
    $items = $model->select("SELECT * FROM products");
    echo json_encode($items);
}

function handleCategoriesGET($model) {
    $items = $model->select("SELECT * FROM categories");
    echo json_encode($items);
}

function handleProductsPOST($model, $requestData) {
    $sql = $model::$connection->prepare("INSERT INTO products (name, price, image, description, size, views, likes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sisssii", $requestData['name'], $requestData['price'], $requestData['image'], $requestData['description'], $requestData['size'], $requestData['views'], $requestData['likes']);
    $sql->execute();
    echo json_encode(['success' => $sql->affected_rows > 0]);
}

function handleCategoriesPOST($model, $requestData) {
    $sql = $model::$connection->prepare("INSERT INTO categories (name) VALUES (?)");
    $sql->bind_param("s", $requestData['name']);
    $sql->execute();
    echo json_encode(['success' => $sql->affected_rows > 0]);
}
?>
