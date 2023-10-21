<?php
// Include your database connection code
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected cart items from the POST request data
    $selectedItems = $_POST["selectedItems"];

    // Add your validation and security checks here

    session_start();
    $useremail = $_SESSION['user'];
    $userrow = $database->query("SELECT * FROM patient WHERE pemail = '$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userId = $userfetch["pid"];

    // Initialize an array to store the cart 'id's of items to delete
    $cartIdsToDelete = [];

    // Insert selected items into the 'Order' table and mark them as 'Pending'
    $sql = "INSERT INTO `orders` (customer, product, quantity, price, discount, status, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $database->prepare($sql);

    foreach ($selectedItems as $item) {
        $cartId = $item['id'];
        $product = $item['product'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $payment_method = $item['payment_method'];
        $discount = 0;
        $status = "Pending"; // Set the status to 'Pending'

        $stmt->bind_param("iiidsss", $userId, $product, $quantity, $price, $discount, $status, $payment_method);
        $stmt->execute();

        // Add the cart 'id' to the array for deletion
        $cartIdsToDelete[] = $cartId;
    }

    $stmt->close();

    // Delete the selected items from the 'carts' table using the 'id' column
    $sqlDelete = "DELETE FROM `carts` WHERE customer = ? AND id IN (".implode(",", $cartIdsToDelete).")";
    $stmtDelete = $database->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $userId);
    $stmtDelete->execute();
    $stmtDelete->close();

    // Optional: You can perform additional actions or return a response if needed
    echo json_encode(["message" => "Order confirmed successfully, and cart items have been deleted"]);
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(["message" => "Invalid request method"]);
}
