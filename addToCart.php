<?php
include("connection.php");

session_start();

$useremail = $_SESSION['user'];
$userrow = $database->query("select * from patient where pemail='$useremail'");
$userfetch = $userrow->fetch_assoc();
$userid = $userfetch["pid"];

// Get data from the request
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$payment_method = $_POST['payment_method'];

// Query the database to fetch product details
$stmt = $database->prepare("SELECT * FROM inventory WHERE invid = ?");
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();

$product = $result->fetch_assoc();

if (!$product) {
    echo json_encode(['message' => 'Product not found']);
    http_response_code(400);
    exit;
}

$discount = 0;

// Check if the product is already in the cart
$stmt = $database->prepare("SELECT * FROM carts WHERE customer = ? AND product = ?");
$stmt->bind_param('ii', $userid, $product_id);
$stmt->execute();
$existingCartItem = $stmt->get_result()->fetch_assoc();

if ($existingCartItem) {
    // If the product is already in the cart, update the quantity
    $newQuantity = $existingCartItem['quantity'] + $quantity;
    $newPrice = $price * (int)$newQuantity;

    // Update the existing row
    $stmt = $database->prepare("UPDATE carts SET quantity = ?, price = ? WHERE customer = ? AND product = ?");
    $stmt->bind_param('diii', $newQuantity, $newPrice, $userid, $product_id);
    $stmt->execute();
} else {
    // If the product is not in the cart, insert a new row
    $price = $price * (int)$quantity;
    $stmt = $database->prepare("INSERT INTO `carts` (customer, product, quantity, price, discount, payment_method) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('iiidis', $userid, $product_id, $quantity, $price, $discount, $payment_method);
    $stmt->execute();
}

// Set the response headers and message
header('Location: cart.php'); // Redirect to the cart page
http_response_code(302);
echo json_encode(['message' => 'Successfully added to cart']);

// Close the database connection
$stmt->close();
$database->close();
?>
