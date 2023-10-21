<?php
// Include your database connection code
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the product_id to delete from the POST request
    $product_id = $_POST["product_id"];

    // Add your validation and security checks here

    // Delete the cart item from the database
    session_start();
    $useremail = $_SESSION['user'];
    $userrow = $database->query("SELECT * FROM patient WHERE pemail = '$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userId = $userfetch["pid"];

    $sql = "DELETE FROM carts WHERE customer = ? AND id = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("ii", $userId, $product_id);

    if ($stmt->execute()) {
        // Successful deletion
        echo json_encode(["message" => "Cart item deleted successfully"]);
    } else {
        // Failed to delete
        http_response_code(500);
        echo json_encode(["message" => "Failed to delete cart item"]);
    }

    $stmt->close();
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(["message" => "Invalid request method"]);
}
?>
