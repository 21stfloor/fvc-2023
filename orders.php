<?php
// Include your database connection code
include("connection.php");

session_start();
$useremail = $_SESSION['user'];

// Get the user's ID from the database based on their email
$userrow = $database->query("SELECT * FROM patient WHERE pemail = '$useremail'");
$userfetch = $userrow->fetch_assoc();
$userId = $userfetch["pid"];

// Query to retrieve the user's orders from the 'Order' table with product name
$sql = "SELECT o.id, p.invname, o.quantity, o.price, o.discount, o.status, o.payment_method
        FROM `orders` o
        INNER JOIN `inventory` p ON o.product = p.invid
        WHERE o.customer = ?";
$stmt = $database->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/index.css">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <title>FVC - Orders</title>
	<link rel="icon" type="image/x-icon" href="img/icon.ico">
    <style>
        table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        /* @media (min-width: 992px)
        header.masthead {
            padding-top: 6rem;
            padding-bottom: 3rem;
        } */
        header.masthead {
            position: relative;
            overflow: hidden;
            padding-top: 6rem;
            padding-bottom: 3rem;
            background: linear-gradient(0deg, #095aee 0%, #00ceff 100%);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
        }

        html, body {
            height: 100%;
        }

        /* Style to keep the footer fixed at the bottom */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* You can adjust the styles as needed */
        }
        .check{
            max-width: 25px;
        }
    </style>
        
</head>
<body id="page-top">
<?php include('navigation.php') ?>
<header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h2>Your Orders</h2>
                </div>
                <tr>
            </div>
            
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>

<div class="container-fluid bg-light p-4 h-100">
    <div class="row mb-5">
    <table id="ordersTable" class="display">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Payment Method</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["invname"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["discount"] . "</td>";
                echo "<td>" . $row["payment_method"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>

</div>




        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; FRIENDSTARS VETERINARY CLINIC
 <?php echo date("Y");?></p></div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

            $(document).ready(function() {
                $('#ordersTable').DataTable();
            });
        </script>


    </body>
</html>