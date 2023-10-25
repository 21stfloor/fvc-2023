
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>FVC | ADMIN | Orders</title>
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
    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    

    
    ?>

    <?php
    // Include your database connection code
    include("../connection.php");

    // $useremail = $_SESSION['user'];

    // Get the user's ID from the database based on their email
    // $userrow = $database->query("SELECT * FROM patient WHERE pemail = '$useremail'");
    // $userfetch = $userrow->fetch_assoc();
    // $userId = $userfetch["pid"];

    // Query to retrieve the user's orders from the 'order' table with product name from the 'inventory' table
    $sql = "SELECT o.id AS order_id, i.invname AS product_name, o.quantity, o.price, o.discount, o.status, o.payment_method
            FROM `orders` o
            INNER JOIN `inventory` i ON o.product = i.invid";
    $stmt = $database->prepare($sql);
    // $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    
    <div class="container">
        <div class="menu">
        <?php include('../inc/adminSidebar.php') ?>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">

                    <a href="patient.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                        
                    </td>
                    
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Singapore');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Orders</p>
                    </td>
                    
                </tr>
                
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" id="orderTable" class="sub-table scrolldown" style="border-spacing:0;">
    <thead>
        <tr>
            <th class="table-headin">Order ID</th>
            <th class="table-headin">Product Name</th>
            <th class="table-headin">Quantity</th>
            <th class="table-headin">Price</th>
            <th class="table-headin">Discount</th>
            <th class="table-headin">Payment Method</th>
            <th class="table-headin">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($x = 0; $x < $result->num_rows; $x++) {
            $row = $result->fetch_assoc();
            $orderID = $row["order_id"];
            $productName = $row["product_name"];
            $quantity = $row["quantity"];
            $price = $row["price"];
            $discount = $row["discount"];
            $payment_method = $row["payment_method"];

            $stmt = $database->query("SELECT status FROM orders WHERE id='$orderID'");
            $stmt = $stmt->fetch_assoc();
            $status = $stmt['status'];

            echo '<tr>
                <td style="text-align:center;">' . $orderID . '</td>
                <td style="text-align:center;">' . $productName . '</td>
                <td style="text-align:center;">' . $quantity . '</td>
                <td style="text-align:center;">₱' . $price . '</td>
                <td style="text-align:center;">₱' . $discount . '</td>
                <td style="text-align:center;">' . $payment_method . '</td>
                <td style="text-align:center;">
                <select id="' . $orderID . '" class="status-select" name="status" aria-label="Default select example" data-status="'.$status.'">';
                    $option1 = "";
                    $option2 = "";
                    $option3 = "";
                    $option4 = "";
                    $option5 = "";
                    
                    if ($status == "Pending") {
                        $option1 = "selected ";
                    } else if ($status == "Processing") {
                        $option2 = "selected ";
                    } else if ($status == "Shipped") {
                        $option3 = "selected ";
                    } else if ($status == "Out for Delivery") {
                        $option4 = "selected ";
                    }
                    else if ($status == "Delivered") {
                        $option5 = "selected ";
                    }
                    else if ($status == "Cancelled") {
                        $option6 = "selected ";
                    }
                    echo '<option ' . $option1 . ' value="Pending">Pending</option>
                    <option ' . $option2 . 'value="Processing">Processing</option>
                    <option ' . $option3 . 'value="Shipped">Shipped</option>
                    <option ' . $option4 . 'value="Out for Delivery">Out for Delivery</option>
                    <option ' . $option5 . 'value="Delivered">Delivered</option>
                    <option ' . $option6 . 'value="Cancelled">Cancelled</option>
                </select>
            </td>
                
            </tr>';
        }
        ?>
    </tbody>
</table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
            $sqlmain= "select * from patient where pid='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["pname"];
            $email=$row["pemail"];
            $dob=$row["pdob"];
            $tele=$row["ptel"];
            $address=$row["paddress"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="patient.php">&times;</a>
                        <div class="content">

                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Patient ID: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    P-'.$id.'<br><br>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Address: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$address.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Date of Birth: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$dob.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="patient.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        
    };

?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('#orderTable').on('change', '.status-select', function(event) {
    var elemId = event.currentTarget.id;
    console.log(elemId);
    console.log(event.currentTarget.value);
    var orderId = event.currentTarget.id;

    var statusValue = event.currentTarget.value;

    $.ajax({
        type: 'POST',
        url: 'update_status.php', // PHP script to update status
        data: {
            orderId: orderId,
            newStatus: statusValue
        },
        success: function(response) {
            // Handle the response from the server
            if (response === 'success') {
                // Status updated successfully
                alert('Order Status updated successfully');
                $(`#${elemId}`).data('status', statusValue);
            } else {
                // Handle any errors or display an error message
                let previousStatus = $(`#${elemId}`).data('status');
                $(`#${elemId}`).val(previousStatus);
                console.log(`previous status was : ${previousStatus}` );
                alert(response);
            }
        }
    });
});
</script>

</body>
</html>