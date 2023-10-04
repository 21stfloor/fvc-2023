<?php
include('../connection.php');
if (isset($_POST)) {
    $petName = $_POST['petName'];
    $bday = $_POST['birthdate'];
    $specieId = $_POST['specie'];
    $breedId = $_POST['breed'];
    $pid = $_POST['pid'];
    $stmt = $database->query("SELECT * FROM pet WHERE pid='$pid' AND name='$petName' AND birthday='$bday' AND breedId='$breedId' AND speId='$specieId'");

    if ($stmt->num_rows >= 1 || $petName === "" || $bday === "") {
        if ($petName === "" || $bday === "") {
            echo "Insufficient Details!";
        } else {
            echo "This pet already exists!";
        }
    } else {
        $result = $database->query("INSERT INTO pet (name, pid, birthday, speId, breedId) VALUES ('$petName', '$pid', '$bday', '$specieId', '$breedId')");
        
        $stmt = $database->query("SELECT petId FROM pet WHERE pid='$pid' AND name='$petName' AND birthday='$bday' AND breedId='$breedId' AND speId='$specieId'");
        $stmt = $stmt->fetch_assoc();
        $petId = $stmt['petId'];

        $targetDirectory = "..\uploads\owners\\" . $pid . "\\" . $petId . "\\";
        if (!file_exists(str_replace("\\", "/", $targetDirectory))) {
            mkdir(str_replace("\\", "/", $targetDirectory), 0777, true);
        }
        $targetFile = $targetDirectory . basename($_FILES['profilePic']['name']);

        if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile)) {
            $targetFile = str_replace('\\', '/', $targetFile);
            $database->query("UPDATE pet SET picturedir='$targetFile' WHERE pid='$pid' AND petId='$petId'");
        }

        if ($result === true) {
            echo "Pet addition success!";
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