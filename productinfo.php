<?php

if (isset($_GET['id'])) {
    
    // Get the 'id' parameter from the URL
    $id = $_GET['id'];

    include("connection.php");

    // Your existing code to fetch data from the database

    $sqlmain = "select * from inventory where invid='$id'";
    $result = $database->query($sqlmain);
    $row = $result->fetch_assoc();

    $name = $row["invname"];
    $code = $row["invcode"];
    $spe = $row["invcategory"];
    $spcil_res = $database->query("select sname from category where id='$spe'");
    $spcil_array = $spcil_res->fetch_assoc();
    $spcil_name = $spcil_array["sname"];
    // $quantity = $row["invquantity"];
    $description = $row["invdescription"];
    $price = $row["invprice"];
    $image = $row["image"];

    // Create an associative array with the data
    $data = [
        "id" => $id,
        "name" => $name,
        "code" => $code,
        "category" => $spcil_name,
        // "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "image" => 'uploads/'.$image
    ];

    // Encode the data as JSON
    $jsonData = json_encode($data);

    // Set the Content-Type header to indicate that the response is JSON
    header('Content-Type: application/json');

    // Return the JSON data
    echo $jsonData;
} else {
    echo "No 'id' parameter found in the URL.";
}

?>