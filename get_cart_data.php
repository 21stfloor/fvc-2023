<?php
include("connection.php");

session_start();
// Add your database connection code here

// Replace with your actual database table and column names
$useremail = $_SESSION['user'];
$userrow = $database->query("SELECT * FROM patient WHERE pemail = '$useremail'");
$userfetch = $userrow->fetch_assoc();
$userId = $userfetch["pid"];

$sql = "SELECT c.id, c.product, i.invname, c.quantity, c.price, c.payment_method, (c.quantity * c.price) AS total FROM carts c
        LEFT JOIN inventory i ON c.product = i.invid
        WHERE c.customer = ?";
$stmt = $database->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$cartData = [];
while ($row = $result->fetch_assoc()) {
    $cartData[] = $row;
}

// Encode the cart data as JSON for DataTables
echo json_encode(["data" => $cartData]);
?>