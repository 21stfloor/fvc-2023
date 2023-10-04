<?php
include('../connection.php');
if (isset($_POST)) {
    $speId = $_POST['specieId'];
    $stmt = $database->query("SELECT * FROM breed WHERE speId='$speId'");
    $breedArray = array();
    while ($breedDetails = $stmt->fetch_assoc()) {
        $breedId = $breedDetails['breedId'];
        $breedName = $breedDetails['name'];
        $breedArray[$breedId] = ucwords($breedName);
    }
    echo json_encode($breedArray);
}
?>