<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST");

require './templates/inc.connection.php';

// Get request method
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    // Fetch all products
    $stmt = $pdo->query("SELECT * FROM categories");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
} elseif ($method == "POST") {
    // Get raw POST data
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!empty($data['name']) && !empty($data['price'])) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->execute(['name' => $data['name'], 'price' => $data['price']]);
        
        echo json_encode(["message" => "Product added successfully"]);
    } else {
        echo json_encode(["error" => "Invalid input"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?>
