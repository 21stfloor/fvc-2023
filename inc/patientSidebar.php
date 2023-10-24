

<?php
// Get the current URL
$currentURL = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = parse_url($currentURL, PHP_URL_PATH);

// Use explode to split the path into segments based on "/"
$segments = explode("/", $path);

// Get the last segment
$lastSegment = end($segments);
?>

<table class="menu-container" border="0">
             <tr>
                 <td style="padding:10px" colspan="2">
                     <table border="0" class="profile-container">
                         <tr>
                             <td width="30%" style="padding-left:20px" >
                                 <img src="../img/users.png" alt="" width="100%" style="border-radius:50%">
                             </td>
                             <td style="padding:0px;margin:0px;">
                                 <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                 <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                             </td>
                         </tr>
                 </table>
                 </td>
             </tr>
             <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home" >
                        <a href="../index.php" class="non-style-link-menu"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
             <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home <?php if ($lastSegment == 'index.php'){echo 'menu-icon-session-active';}?>" >
                        <a href="../patient/index.php" class="non-style-link-menu <?php if ($lastSegment == 'index.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor <?php if ($lastSegment == 'doctors.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/doctors.php" class="non-style-link-menu <?php if ($lastSegment == 'doctors.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Veterinarians</p></a></div>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor menu-active <?php if ($lastSegment == 'petListPage.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../pet/petListPage.php" class="non-style-link-menu <?php if ($lastSegment == 'petListPage.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">My Pets</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session <?php if ($lastSegment == 'schedule.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/schedule.php" class="non-style-link-menu <?php if ($lastSegment == 'schedule.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Clinic Schedule</p></div></a>
                    </td>
                </tr>
				<tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor <?php if ($lastSegment == 'groomers.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/groomers.php" class="non-style-link-menu <?php if ($lastSegment == 'groomers.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Groomers</p></a></div>
                    </td>
                </tr>
				<tr class="menu-row" >
                    <td class="menu-btn menu-icon-session <?php if ($lastSegment == 'gschedule.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/gschedule.php" class="non-style-link-menu <?php if ($lastSegment == 'gschedule.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Grooming Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment <?php if ($lastSegment == 'appointment.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/appointment.php" class="non-style-link-menu <?php if ($lastSegment == 'appointment.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">My Clinic Bookings</p></a></div>
                    </td>
                </tr>
				<tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment <?php if ($lastSegment == 'gappointment.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/gappointment.php" class="non-style-link-menu <?php if ($lastSegment == 'gappointment.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">My Groomer Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule <?php if ($lastSegment == 'history.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/history.php" class="non-style-link-menu <?php if ($lastSegment == 'history.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">History</p></a></div>
                    </td>
                </tr>

                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-cart <?php if ($lastSegment == 'cart.php'){echo 'menu-icon-session-active';}?>">                    
                        <a href="../cart.php" class="non-style-link-menu <?php if ($lastSegment == 'cart.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Cart</p></div></a>
                    </td>
                </tr>

                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-order <?php if ($lastSegment == 'orders.php'){echo 'menu-icon-session-active';}?>">                    
                        <a href="../orders.php" class="non-style-link-menu <?php if ($lastSegment == 'orders.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Orders</p></div></a>
                    </td>
                </tr>

                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-shop <?php if ($lastSegment == 'products.php'){echo 'menu-icon-session-active';}?>">                    
                        <a href="../products.php" class="non-style-link-menu <?php if ($lastSegment == 'products.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Products</p></div></a>
                    </td>
                </tr>

                

                <!-- <li class="nav-item"><a class="nav-link" href="cart.php"><i class="bi bi-cart3"></i> Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="orders.php"> Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li> -->
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings <?php if ($lastSegment == 'settings.php'){echo 'menu-icon-session-active';}?>">
                        <a href="../patient/settings.php" class="non-style-link-menu <?php if ($lastSegment == 'settings.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>