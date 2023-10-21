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
                                    <img src="../img/admin.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@fvc.com</p>
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
                    <td class="menu-btn menu-icon-dashbord <?php if ($lastSegment == 'index.php'){echo 'menu-icon-session-active';}?>" >
                        <a href="index.php" class="non-style-link-menu <?php if ($lastSegment == 'index.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Clinic Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor <?php if ($lastSegment == 'doctors.php'){echo 'menu-icon-session-active';}?>">
                        <a href="doctors.php" class="non-style-link-menu  <?php if ($lastSegment == 'doctors.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Veterinarians</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule <?php if ($lastSegment == 'schedule.php'){echo 'menu-icon-session-active';}?>">
                        <a href="schedule.php" class="non-style-link-menu  <?php if ($lastSegment == 'schedule.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Clinic Schedule</p></div></a>
                    </td>
                </tr>
				<tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment <?php if ($lastSegment == 'appointment.php'){echo 'menu-icon-session-active';}?>">
                        <a href="appointment.php" class="non-style-link-menu <?php if ($lastSegment == 'appointment.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Clinic Appointments</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord <?php if ($lastSegment == 'gindex.php'){echo 'menu-icon-session-active';}?>" >
                        <a href="gindex.php" class="non-style-link-menu <?php if ($lastSegment == 'gindex.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Grooming Dashboard</p></a></div></a>
                    </td>
                </tr>				
				<tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor <?php if ($lastSegment == 'groomers.php'){echo 'menu-icon-session-active';}?>">
                        <a href="groomers.php" class="non-style-link-menu <?php if ($lastSegment == 'groomers.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Groomers</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule <?php if ($lastSegment == 'gschedule.php'){echo 'menu-icon-session-active';}?>">
                        <a href="gschedule.php" class="non-style-link-menu <?php if ($lastSegment == 'gschedule.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Grooming Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment  <?php if ($lastSegment == 'gappointment.php'){echo 'menu-icon-session-active';}?>">
                        <a href="gappointment.php" class="non-style-link-menu <?php if ($lastSegment == 'gappointment.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Grooming Appointments</p></a></div>
                    </td>
                </tr>
				<tr class="menu-row" >
                    <td class="menu-btn menu-icon-doctor <?php if ($lastSegment == 'staff.php'){echo 'menu-icon-session-active';}?> ">
                        <a href="staff.php" class="non-style-link-menu  <?php if ($lastSegment == 'staff.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Staffs</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient <?php if ($lastSegment == 'patient.php'){echo 'menu-icon-session-active';}?> ">
                        <a href="patient.php" class="non-style-link-menu <?php if ($lastSegment == 'patient.php'){echo 'menu-icon-session-active';}?> "><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>
				<tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord <?php if ($lastSegment == 'inventory.php'){echo 'menu-icon-session-active';}?>">
                        <a href="inventory.php" class="non-style-link-menu <?php if ($lastSegment == 'inventory.php'){echo 'non-style-link-menu-active';}?>"><div><p class="menu-text">Inventory</p></a></div>
                    </td>
                </tr>


            </table>