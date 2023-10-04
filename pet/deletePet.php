<?php
include('../connection.php');
if (isset($_POST)) {
    $petId = $_POST['petId'];
    $stmt = $database->query("SELECT pid, picturedir FROM pet WHERE petId='$petId'");
    $stmt = $stmt->fetch_assoc();
    $pid = $stmt['pid'];
    $picturedir = $stmt['picturedir'];
    $targetDirectory = "../uploads/owners/" . $pid . "/" . $petId . "/";
    $picToDelete = scandir($targetDirectory);
    foreach ($picToDelete as $picToDel) {
        if (!($picToDel == "." || $picToDel == "..")) {
            unlink($targetDirectory . $picToDel);
        }
    }
    $pholder = "";
    $targetDirectory = "../uploads/owners/" . $pid . "/" . $petId;
    rmdir($targetDirectory);
    $pholder = "";

    $result = $database->query("DELETE FROM pet WHERE petId='$petId'");
    if ($result === true) {
        echo "Deletion Successful!";
    } else {
        echo "An error occured!!";
    }
}
?>