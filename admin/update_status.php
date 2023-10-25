<?php
// Include your database connection code
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId']; // Order ID
    $newStatus = $_POST['newStatus']; // New status

    // Function to update inventory based on order status change
    function updateInventory($orderId, $newStatus, $previousStatus, $database, $quantity) {
        // ... (Previous code)

        // Check if inventory quantity is less than or equal to 10
        if ($newStatus === 'Shipped' && ($previousStatus === 'Pending' || $previousStatus === 'Processing')) {
            // Deduct inventory based on order quantity
            $orderSql = "SELECT o.product, o.quantity, p.ptel FROM orders o
                         JOIN patient p ON o.customer = p.pid
                         WHERE o.id = ?";
            $stmt = $database->prepare($orderSql);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $orderResult = $stmt->get_result();
        
            if ($orderRow = $orderResult->fetch_assoc()) {
                $productId = $orderRow['product'];
                $deductedQuantity = $quantity - $orderRow['quantity'];
                $ptel = $orderRow['ptel'];

                if($deductedQuantity < 0){

                    return 'not enough stock';
                }
        
                // Deduct the quantity from the inventory
                $deductSql = "UPDATE inventory SET invquantity = ? WHERE invid = ?";
                $stmt = $database->prepare($deductSql);
                $stmt->bind_param('ii', $deductedQuantity, $productId);
                if ($stmt->execute()) {
                    // Inventory deducted successfully
        
                    // Check if inventory quantity is critical (less than or equal to 10)
                    $inventorySql = "SELECT invquantity FROM inventory WHERE invid = ?";
                    $stmt = $database->prepare($inventorySql);
                    $stmt->bind_param('i', $productId);
                    $stmt->execute();
                    $inventoryResult = $stmt->get_result();
        
                    if ($inventoryRow = $inventoryResult->fetch_assoc()) {
                        $invquantity = $inventoryRow['invquantity'];
                        try {
                            if ($invquantity <= 10) {
                                // Send an SMS notification
                                $message = "Inventory for product ID: $productId is critical.";
                                include("sms_critical_inventory.php");
                            }
                        } catch (Twilio\Exceptions\RestException $e) {
                            // Handle the Twilio RestException here
                            // echo "Twilio RestException: " . $e->getMessage();
                            return 'success';
                        }
                    }
                    return 'success';
                }

                return 'error updating the stock';
            }
        }
         else if (($newStatus === 'Pending' || $newStatus === 'Processing') && $previousStatus === 'Shipped') {
            // Return the quantity to the inventory
            $orderSql = "SELECT product, quantity FROM orders WHERE id = ?";
            $stmt = $database->prepare($orderSql);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $orderResult = $stmt->get_result();

            if ($orderRow = $orderResult->fetch_assoc()) {
                $productId = $orderRow['product'];
                $returnedQuantity = $orderRow['quantity'] + $quantity;

                // Return the quantity to the inventory
                $returnSql = "UPDATE inventory SET invquantity = ? WHERE invid = ?";
                $stmt = $database->prepare($returnSql);
                $stmt->bind_param('ii', $returnedQuantity, $productId);
                if ($stmt->execute()) {
                    // Inventory updated successfully
                    return 'success';
                }

                return 'error updating the stock';
            }
        }
        return 'error updating the stock';
    }
    // Retrieve the previous status using a SELECT statement
    $prevStatusSql = "SELECT status, quantity, product FROM orders WHERE id = ?";
    $stmt = $database->prepare($prevStatusSql);
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $prevStatusResult = $stmt->get_result();

    $quantity = 0;

    if ($prevStatusRow = $prevStatusResult->fetch_assoc()) {
        $previousStatus = $prevStatusRow['status'];

        $inventorySql = "SELECT invquantity FROM inventory WHERE invid = ?";
        $stmt = $database->prepare($inventorySql);
        $stmt->bind_param('i', $prevStatusRow['product']);
        $stmt->execute();
        $inventoryResult = $stmt->get_result();
        if($inventoryRow = $inventoryResult->fetch_assoc()){
            $quantity = $inventoryRow['invquantity'];
        }
    }

    // Update the status in the database
    $updateSql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $database->prepare($updateSql);
    $stmt->bind_param('si', $newStatus, $orderId);

    $updateResult = updateInventory($orderId, $newStatus, $previousStatus, $database, $quantity);
    if ($updateResult == 'success') {
        if($stmt->execute()){
            echo 'success';
        }
    } else {
        echo $updateResult;
    }
}