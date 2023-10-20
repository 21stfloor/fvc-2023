<?php
    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }

    } else {
        header("location: ../login.php");
    }

    include("../connection.php");

    $sqlmain = "select * from patient where pemail=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch = $userrow->fetch_assoc();

    $userid = $userfetch["pid"];
    $username = $userfetch["pname"];

    ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>FVC | My Pets</title>
	<link rel="icon" type="image/x-icon" href="../img/icon.ico">
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>


</head>

<body>
    
    <div class="container">        
        <div class="menu">
            <?php include('../inc/patientSidebar.php') ?>
        </div>
        <div class="dash-body" style="margin-top: 15px; padding-left:40px">
            <h1 class="mt-4">Pet List</h1>
            <table id="petTable" width="93%" class="sub-table scrolldown" border="0">
                <thead>
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <?php
                            // Assuming you have already established a MySQL connection
                            $patientEmail = $_SESSION['user'];
                            $stmt = $database->query("SELECT pid FROM patient WHERE pemail='$patientEmail'");
                            $stmt = $stmt->fetch_assoc();
                            $pid = $stmt['pid'];
                            $_POST['patientId'] = $pid;
                            $patientId = $_POST['patientId']; // Assuming you pass patientId as a query parameter
                            
                            // Fetch the pets belonging to the patient from the "pet" table
                            $sql = "SELECT * FROM pet WHERE pid = '$patientId'";
                            $result = mysqli_query($database, $sql);
                            $num_rows = $result->num_rows;
                        ?>
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">My Pets (<?php echo $num_rows; ?>)</p>
                    </td>
                    
                </tr>
                    <tr>
                        <th class="table-headin">Picture</th>
                        <th class="table-headin">Name</th>
                        <th class="table-headin">Species</th>
                        <th class="table-headin">Breed</th>
                        <th class="table-headin">Birthday</th>
                        <th class="table-headin">Edit Pet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    

                    // Loop through the pet records and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        $petId = $row['petId'];
                        $breedId = $row['breedId'];
                        $breedNameAndSpecId = $database->query("SELECT name, speId FROM breed WHERE breedId='$breedId'");
                        $breedNameAndSpecId = $breedNameAndSpecId->fetch_assoc();
                        $breedName = $breedNameAndSpecId['name'];
                        $specieId = $breedNameAndSpecId['speId'];
                        $specieOfBreed = $database->query("SELECT name FROM species WHERE speId='$specieId'");
                        $specieOfBreed = $specieOfBreed->fetch_assoc();
                        $specieName = $specieOfBreed['name'];
                        $picturedir = "";
                        if ($row['picturedir'] == "") {
                            $picturedir = "placeholder.png";
                        } else {
                            $picturedir = $row['picturedir'];
                        }
                        echo "<tr>";
                        echo "<td><img src='$picturedir' placeholder='Picture of your pet' class='img-pet-list img-fluid w-25'></td>";
                        echo "<td id='$petId'>" . ucwords($row['name']) . "</td>";
                        echo "<td id='specieName'>" . ucwords($specieName) . "</td>";
                        echo "<td id='breedName'>" . ucwords($breedName) . "</td>";
                        echo "<td id='petBday'>" . $row['birthday'] . "</td>";
                        echo "<td>
                                <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                    <a href='editPetPage.php' id='$petId' type='button' class='btn btn-warning pet-edit'>Edit Pet</a>
                                    <button id='$petId' type='button' class='btn btn-danger pet-delete'>Delete</button>
                                </div>
                            </td>";

                        echo "</tr>";

                    }
                    // Close the MySQL connection
                    mysqli_close($database);
                    ?>
                </tbody>
            </table>
            <a href="addPetPage.php" class="btn btn-primary mt-3">Add New Pet</a>
        </div>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script> -->

    <?php //include('../inc/scripts.php') ?>
</body>

</html>