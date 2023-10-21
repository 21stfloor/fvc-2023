

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
    <title>FVC - Cart</title>
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
                    <h2>Your Cart</h2>
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
            <table id="cartTable" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="check" colspan="1"><input type="checkbox" id="checkAll"/>Select</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart data will be populated here using PHP -->
                </tbody>
            </table>
    </div>

    <div class="row">
        <button id="checkoutButton" class="btn btn-success w-25">Checkout</button>
    </div>
</div>


<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Selected Cart Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody id="selectedItemsTableBody">
                            <!-- Selected cart items will be displayed here -->
                        </tbody>
                    </table>
                    <p>Total: <span id="checkoutTotal"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- You can add a "Confirm Order" button here for finalizing the order -->
                    <button type="button" id="confirmOrderButton" class="btn btn-success" data-bs-dismiss="modal">Check out Now</button>
                    
                </div>
            </div>
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
            var checkAll = false;

            $(document).ready(function() {
                $("#checkAll").on('click', function(){
                    checkAll = !checkAll;
                    // if(checkAll == false){
                    //     $('.cartCheck').removeAttr('checked');
                    // }
                    // else{
                        $('.cartCheck').prop('checked', checkAll);
                    // }

                    table.draw();
                });

                const table = $('#cartTable').DataTable({
                    "ajax": {
                        "url": "get_cart_data.php", // URL to your PHP script
                        "dataSrc": "data" // Data source property in the JSON response
                    },
                    "columns": [
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return '<input type="checkbox" class="cartCheck" value="' + data.id + '" />';
                            }
                        },
                        { "data": "invname" },
                        { "data": "quantity" },
                        { "data": "price" },
                        { "data": "total" },
                        { "data": "payment_method" },
                        {
                            "data": null,
                            "render": function (data, type, row) {
                                return '<button type="button" class="btn btn-danger delete" id="'+data.id+'" >Delete</button>';
                            }
                        },
                    ]
                });

                var selectedItems = [];
                // Event handler for "Checkout" button
                $('#checkoutButton').click(function() {
                    selectedItems = [];
                    var total = 0;

                    // Iterate over selected checkboxes in the DataTable
                    $('input[type="checkbox"]:checked', table.column(0).nodes()).each(function() {
                        var rowData = table.row($(this).closest('tr')).data();
                        selectedItems.push(rowData);
                        total += parseFloat(rowData.total);
                    });

                    if(selectedItems.length == 0){
                        bootbox.alert('No item was selected!');
                        return;
                    }

                    $('#checkoutModal').modal('show');

                    // Populate the modal with selected cart items and total
                    $('#selectedItemsTableBody').html('');
                    selectedItems.forEach(function(item) {
                        console.log(item);
                        $('#selectedItemsTableBody').append(
                            '<tr>' +
                            '<td>' + item.invname + '</td>' +
                            '<td>' + item.quantity + '</td>' +
                            '<td>' + item.price + '</td>' +
                            '<td>' + item.total + '</td>' +
                            '<td>' + item.payment_method + '</td>' +
                            '</tr>'
                        );
                    });

                    $('#checkoutTotal').text(total.toFixed(2));
                });

                $('#confirmOrderButton').click(function() {
                    // Send an AJAX request to create rows in the 'Order' table
                    $.ajax({
                        type: 'POST',
                        url: 'confirm_order.php', // Specify the PHP script to handle the order confirmation
                        data: {
                            selectedItems: selectedItems
                        },
                        success: function(response) {
                            // Handle the response from the server, e.g., show a success message
                            // alert('Order confirmed successfully');
                            bootbox.alert(`Order confirmed successfully`, function() {
                                            // Reload the page or refresh the cart data
                                            location.reload();
                                        });
                            // You can close the modal or perform any other actions
                        },
                        error: function(error) {
                            // Handle errors, e.g., show an error message
                            alert('Error confirming the order');
                        }
                    });
                });


                $('#cartTable').on('click', '.delete', function() {
                    // var row = table.row($(this).closest('tr'));
                    var product_id = this.id;
                    // console.log();
                    // Display Bootbox confirmation dialog
                    bootbox.confirm({
                        message: "Are you sure you want to delete this item from your cart?",
                        buttons: {
                            confirm: {
                                label: 'Delete',
                                className: 'btn-danger'
                            },
                            cancel: {
                                label: 'Cancel',
                                className: 'btn-secondary'
                            }
                        },
                        callback: function(result) {
                            if (result) {
                                // User confirmed deletion, send an AJAX request to delete the item
                                $.ajax({
                                    type: 'POST',
                                    url: 'delete_cart_item.php',
                                    data: { product_id: product_id },
                                    success: function(response) {
                                        // Successful deletion
                                        bootbox.alert(`Cart Item was successfully deleted`, function() {
                                            // Reload the page or refresh the cart data
                                            location.reload();
                                        });
                                    },
                                    error: function(error) {
                                        // Error handling
                                        bootbox.alert(error.responseJSON.message);
                                    }
                                });
                            }
                        }
                    });
                });
                
            });
        </script>


    </body>
</html>