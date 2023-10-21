<?php
include("connection.php");

$sql = "SELECT * FROM inventory";
$result = $database->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    $products = array();

    // Fetch each product as an associative array
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    // No products found in the table
    $products = array();
}

// Close the database connection
$database->close();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lightgallery-bundle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-fullscreen.min.css" integrity="sha512-JlgW3xkdBcsdFiSfFk5Cfj3sTgo3hA63/lPmZ4SXJegICSLcH43BuwDNlC9fqoUy2h3Tma8Eo48xlZ5XMjM+aQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-medium-zoom.min.css" integrity="sha512-ILbxmmqtYUE97Fmhl6ebHhHR6Q1G3GSC9dpbU64NITFIG8XGXqdYlmzGAb0I49htqaP8JNm2eLbEdBITqWbL5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-thumbnail.min.css" integrity="sha512-GRxDpj/bx6/I4y6h2LE5rbGaqRcbTu4dYhaTewlS8Nh9hm/akYprvOTZD7GR+FRCALiKfe8u1gjvWEEGEtoR6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <title>FVC - Products</title>
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

        .card-img-top {
  width: 100%;
  height: 15vw;
  object-fit: cover;
}
    </style>
        
</head>
<body id="page-top">
<?php include('navigation.php') ?>
<header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h2>Our Products</h2>
                </div>
                <tr>
            </div>
            
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>

<div class="container-fluid bg-light py-4 h-100 px-0">
    <div class="row mb-5">
        <section class="container my-5">
            <div class="row p-5" id="lightgallery">
                <?php foreach ($products as $product) { ?>
                    <div class="col-lg-4">
                        <div class="card mb-4 p-3 h-100">
                            <img src="<?php echo 'uploads/'.$product['image']; ?>" class="card-img-top thumbnail w-100" alt="<?php echo $product['invname']; ?>" data-src="<?php echo 'uploads/'.$product['image']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['invname']; ?></h5>
                                <p class="card-text"><?php echo $product['invdescription']; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" data-product="<?php echo $product['invid']; ?>" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    ₱<?php echo $product['invprice']; ?><br>Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
            <!-- Footer-->
            <footer class="py-5 bg-black px-0 w-100 mx-0">
            <div class="container px-0"><p class="m-0 text-center text-white small">Copyright &copy; FRIENDSTARS VETERINARY CLINIC
 <?php echo date("Y");?></p></div>
        </footer>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centere">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buy now</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="order-form" action="addToCart.php" method="POST">
                    <h2 id="product-name"></h2>
                    <img id="product-thumbnail" class="img-fluid w-25" src="path/to/product/image.jpg" alt="Product Image">
                    <p id="product-description"></p>
                    <p id="product-price" class="fw-bolder"></p>
                    <input type="hidden" name="product_id" value="" />
                    <input type="hidden" name="price" value="" />
                    <input type="hidden" name="discount" value="" />
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                    <label for="payment_method" class="form-label requiredField">Payment method<span class="asteriskField">*</span></label>
                    <select name="payment_method" class="select form-select" id="payment_method">
                        <option value="Cash" selected="selected">Cash</option>
                        <option value="Gcash">Gcash</option>
                        <option value="Card">Card</option>
                    </select>
                    <p id="total-price" class="fw-bolder fs-3"></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="order-form" class="btn btn-primary" id="addToCart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js" integrity="sha512-jEJ0OA9fwz5wUn6rVfGhAXiiCSGrjYCwtQRUwI/wRGEuWRZxrnxoeDoNc+Pnhx8qwKVHs2BRQrVR9RE6T4UHBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/fullscreen/lg-fullscreen.min.js" integrity="sha512-11B0rPDzvnSOYzAT37QdnYgt0z9Xg+wX5tckB1QKl5Znl8RPvrB5npo38K2jCt+Ad44udCfBiKt9D4jRdkSE1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/pager/lg-pager.es5.min.js" integrity="sha512-8HOl3Wy4i/c6mO3//QLqwMjxpCpyWlZe+8Z3QPD241qm1nI1D23aYG3mqFhp3yBpGpSXFeNUFYHlIfVCNfJ3Uw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js" integrity="sha512-BLW2Jrofiqm6m7JhkQDIh2olT0EBI58+hIL/AXWvo8gOXKmsNlU6myJyEkTy6rOAAZjn0032FRk8sl9RgXPYIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js" integrity="sha512-VBbe8aA3uiK90EUKJnZ4iEs0lKXRhzaAXL8CIHWYReUwULzxkOSxlNixn41OLdX0R1KNP23/s76YPyeRhE6P+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.8.1/js/jquery.justifiedGallery.min.js" integrity="sha512-8dQZtymfQeDiZ4bBCFhrKZhDcZir15MqnEDBRiR6ReIVHLcdnCyJrhPIS0QifLGuMkFZsw9QMNeD9JtiLwieTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
        
        <script type="text/javascript">
        var selectedProduct = null;

        function getProductInfo(selectedId){
            $.ajax({
                url: `productinfo.php?id=${selectedId}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Process the data (the service details) received from the API
                    console.log(data);
                    selectedProduct = data;
                    
                    $("#product-thumbnail").attr('src', data.image);
                    $("#product-name").text(data.name);
                    $("#product-description").text(data.description);
                    $("#product-price").text(`₱${data.price}`);
                    $("input[name='product_id']").val(data.id);
                    var quantityInput = document.getElementById("quantity");
                    quantityInput.value = 1;
                    updateTotalPrice(data.price);
                    $('input[name="discount"]').val(data.discount);
                    $('input[name="price"]').val(data.price);
                },
                error: function(error) {
                console.log(error);
                }
            });
        }

        function updateTotalPrice(basePrice){
            let quantity = $('#quantity').val();
            let total = `₱${basePrice * quantity}`;
            $('#total-price').text(`Total Price: ${total}`);
            $('input[name="price"]').val(total);
        }
        
        $(document).ready(function(){

            var quantityInput = document.getElementById("quantity");

            // Add an onchange event listener
            quantityInput.addEventListener("change", function () {
                // Get the new quantity value
                // var newQuantity = quantityInput.value;

                // Perform any actions you want when the quantity changes
                // console.log("New quantity: " + newQuantity);
                if(selectedProduct != null){
                    updateTotalPrice(selectedProduct.price);
                }
            });
            
            const myModal = document.getElementById('exampleModal')

            myModal.addEventListener('shown.bs.modal', (event) => {
                let id = event.relatedTarget.getAttribute('data-product');
                getProductInfo(id);
            })

            const container = document.getElementById('lightgallery');

            lightGallery(container, {
                    plugins: [lgZoom, lgThumbnail],
                    // licenseKey: 'your_license_key',
                    speed: 500,
                    selector: '.thumbnail',
                });

            

        });
    </script>
    </body>
</html>