<?php
include('../connection.php');
if (isset($_POST)) {
    $pid = $_POST['pid'];
    $petId = $_POST['petId'];
    $newPicture = $_FILES['profilePic'];
    $username = $_POST['username'];
    $targetDirectory = "..\uploads\owners\\" . $pid . "\\" . $petId . "\\";
    if (!file_exists(str_replace("\\", "/", $targetDirectory))) {
        mkdir(str_replace("\\", "/", $targetDirectory), 0777, true);
    }
    $targetFile = $targetDirectory . basename($_FILES['profilePic']['name']);


    $petName = $_POST['petName'];
    $bday = $_POST['birthdate'];
    $specieId = $_POST['specie'];
    $breedId = $_POST['breed'];

    $targetDirectory = str_replace("\\", "/", $targetDirectory);
    $picToDelete = scandir($targetDirectory);
    foreach ($picToDelete as $picToDel) {
        if (!($picToDel == "." || $picToDel == "..")) {
            unlink($targetDirectory . $picToDel);
        }
    }
    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile)) {
        $targetFile = str_replace('\\', '/', $targetFile);
        $database->query("UPDATE pet SET picturedir='$targetFile' WHERE pid='$pid' AND petId='$petId'");
    }

    $stmt = $database->query("SELECT * FROM pet WHERE pid='$pid' AND name='$petName' AND birthday='$bday' AND breedId='$breedId' AND speId='$specieId'");
    if ($stmt->num_rows >= 1 || $bday === "" || $petName === "") {
        if ($petName === "" || $bday === "") {
            echo "Insufficient Details!";
        } else {
            header("Location: petListPage.php");
        }
    } else {
        $result = $database->query("UPDATE pet SET name='$petName', birthday='$bday', speId='$specieId', breedId='$breedId' WHERE pid='$pid' AND petId='$petId'");

        if ($result === true) {
            echo "Pet edit success!";
            header("Location: petListPage.php");
            exit;
        } else {
            echo "Error adding data!";
            header("Location: petListPage.php");
            exit;
        }
    }
}
?>