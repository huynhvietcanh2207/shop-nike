<?php
include 'database.php';
include 'model.php';
include 'user.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$model = new Model();
$user = new User();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Handling CORS preflight request
if ($requestMethod === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    return;
}

$requestData = json_decode(file_get_contents('php://input'), true);

if ($requestMethod === 'POST') {
    if (strpos($_SERVER['REQUEST_URI'], '/register') !== false) {
        $result = $user->register($requestData['name'], $requestData['email'], $requestData['password']);
        if ($result) {
            echo json_encode(['success' => true]);
            $result = $user->register($requestData['name'], $requestData['email'], $requestData['password']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Registration failed']);
        }
    } elseif (strpos($requestUri, '/login') !== false) {
        $result = $user->login($requestData['email'], $requestData['password']);
        if ($result) {
            echo json_encode(['success' => true, 'user_id' => $result]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Login failed']);
        }
    }
} elseif ($requestMethod === 'GET') {
    if (strpos($requestUri, '/products') !== false) {
        handleProductsGET($model);
    } elseif (strpos($requestUri, '/categories') !== false) {
        handleCategoriesGET($model);
    } elseif (strpos($requestUri, '/cart') !== false) {
        handleCartGET($model, $userId);
    } 
    elseif (isset($_GET['q']) && strpos($requestUri, '/search') !== false) {
        $keyword = $_GET['q'];
        handleSearchGET($model, $keyword);
    }
}
function handleSearchGET($model, $keyword)
{
    $sql = $model::$connection->prepare('SELECT * FROM products WHERE name LIKE ?');
    $keyword = "%{$keyword}%";
    $sql->bind_param('s', $keyword);
    $result = $model->select($sql); 
    echo json_encode($result);
}

function handleProductsGET($model)
{
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 4;
    $offset = ($page - 1) * $limit;

    $stmt = $model::$connection->prepare("SELECT * FROM products LIMIT ? OFFSET ?");
    if ($stmt === false) {
        echo json_encode(['error' => 'Lỗi chuẩn bị câu lệnh']);
        return;
    }

    $stmt->bind_param("ii", $limit, $offset);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);

        $total = $model->select("SELECT COUNT(*) AS total FROM products")[0]['total'];
        $totalPages = ceil($total / $limit);

        echo json_encode([
            'products' => $items,
            'total' => $total,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    } else {
        echo json_encode(['error' => 'Lỗi thực thi câu lệnh']);
    }

    $stmt->close();
}

function handleCategoriesGET($model)
{
    $items = $model->select("SELECT * FROM categories");
    echo json_encode($items);
}

function handleCartGET($model, $userId)
{
    $items = $model->select("SELECT * FROM cart WHERE user_id = $userId");
    echo json_encode($items);
}

function handleProductsByCategoryGET($model, $categoryId)
{
    // Prepare SQL query
    $sql = "SELECT * FROM products WHERE categories_id = ?";
    $stmt = $model::$connection->prepare($sql);
    if ($stmt === false) {
        echo json_encode(['error' => 'Failed to prepare statement']);
        return;
    }
    $stmt->bind_param("i", $categoryId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($items);
    } else {
        echo json_encode(['error' => 'Failed to execute statement']);
    }

    $stmt->close();
}


function handleProductsPOST($model, $requestData)
{
    if (isset($requestData['name'], $requestData['price'], $requestData['image'], $requestData['description'], $requestData['size'], $requestData['views'], $requestData['likes'], $requestData['categories_id'])) {
        $sql = $model::$connection->prepare("INSERT INTO products (name, price, image, description, size, views, likes, categories_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($sql === false) {
            echo json_encode(['error' => 'Failed to prepare statement']);
            return;
        }
        $sql->bind_param("sisssisi", $requestData['name'], $requestData['price'], $requestData['image'], $requestData['description'], $requestData['size'], $requestData['views'], $requestData['likes'], $requestData['categories_id']);

        if ($sql->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to execute statement']);
        }

        $sql->close();
    } else {
        echo json_encode(['error' => 'Invalid input data']);
    }
}

function handleCategoriesPOST($model, $requestData)
{
    if (isset($requestData['name'])) {
        $sql = $model::$connection->prepare("INSERT INTO categories (name) VALUES (?)");
        if ($sql === false) {
            echo json_encode(['error' => 'Failed to prepare statement']);
            return;
        }
        $sql->bind_param("s", $requestData['name']);

        if ($sql->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to execute statement']);
        }

        $sql->close();
    } else {
        echo json_encode(['error' => 'Invalid input data']);
    }
}
function handleCartPOST($model, $requestData)
{
    if (isset($requestData['user_id'], $requestData['product_id'], $requestData['quantity'])) {
        $userId = $requestData['user_id'];
        $productId = $requestData['product_id'];
        $quantity = $requestData['quantity'];

        $sql = $model::$connection->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        if ($sql === false) {
            echo json_encode(['error' => 'Failed to prepare statement']);
            return;
        }
        $sql->bind_param("iii", $userId, $productId, $quantity);

        if ($sql->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to execute statement']);
        }

        $sql->close();
    } else {
        echo json_encode(['error' => 'Invalid input data']);
    }
}
