<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>FVC | Grooming Schedule</title>
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
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    date_default_timezone_set('Asia/Singapore');

    $today = date('Y-m-d');


 ?>
 <div class="container">
     <div class="menu">
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
                    <td class="menu-btn menu-icon-home " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="doctors.php" class="non-style-link-menu"><div><p class="menu-text">Veterinarians</p></a></div>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="../pet/petListPage.php" class="non-style-link-menu"><div><p class="menu-text">My Pets</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session ">
                        <a href="schedule.php" class="non-style-link-menu "><div><p class="menu-text">Clinic Schedule</p></div></a>
                    </td>
                </tr>
				<tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor ">
                        <a href="groomers.php" class="non-style-link-menu "><div><p class="menu-text">Groomers</p></a></div>
                    </td>
                </tr>
				<tr class="menu-row" >
                    <td class="menu-btn menu-icon-session menu-active menu-icon-session-active">
                        <a href="gschedule.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Grooming Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Clinic Bookings</p></a></div>
                    </td>
                </tr>
				<tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="gappointment.php" class="non-style-link-menu"><div><p class="menu-text">My Groomer Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <?php

                $sqlmain= "select * from gschedule inner join groomer on gschedule.groomid=groomer.groomid where gschedule.gscheduledate>='$today'  order by gschedule.gscheduledate asc";
                $sqlpt1="";
                $insertkey="";
                $q='';
                $searchtype="All";
                        if($_POST){
                        if(!empty($_POST["search"])){
                            
                            $keyword=$_POST["search"];
                            $sqlmain= "select * from gschedule inner join groomer on gschedule.groomid=groomer.groomid where gschedule.gscheduledate>='$today' and (groomer.groomname='$keyword' or groomer.groomname like '$keyword%' or groomer.groomname like '%$keyword' or groomer.groomname like '%$keyword%' or gschedule.gtitle='$keyword' or gschedule.gtitle like '$keyword%' or gschedule.gtitle like '%$keyword' or gschedule.gtitle like '%$keyword%' or gschedule.gscheduledate like '$keyword%' or gschedule.gscheduledate like '%$keyword' or gschedule.gscheduledate like '%$keyword%' or gschedule.gscheduledate='$keyword' )  order by gschedule.gscheduledate asc";
                            $insertkey=$keyword;
                            $searchtype="Search Result : ";
                            $q='"';
                        }

                    }


                $result= $database->query($sqlmain)


                ?>
                  
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="gschedule.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td >
                            <form action="" method="post" class="header-search">

                                        <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Veterinarian name or Email or Date (YYYY-MM-DD)" list="groomers" value="<?php  echo $insertkey ?>">&nbsp;&nbsp;
                                        
                                        <?php
                                            echo '<datalist id="groomers">';
                                            $list11 = $database->query("select DISTINCT * from  groomer;");
                                            $list12 = $database->query("select DISTINCT * from  gschedule GROUP BY gtitle;");
                                            

                                            


                                            for ($y=0;$y<$list11->num_rows;$y++){
                                                $row00=$list11->fetch_assoc();
                                                $d=$row00["groomname"];
                                               
                                                echo "<option value='$d'><br/>";
                                               
                                            };


                                            for ($y=0;$y<$list12->num_rows;$y++){
                                                $row00=$list12->fetch_assoc();
                                                $d=$row00["gtitle"];
                                               
                                                echo "<option value='$d'><br/>";
                                                                                         };

                                        echo ' </datalist>';
            ?>
                                        
                                
                                        <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                        </form>
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                                
                                echo $today;

                                

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
                
                
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)"><?php echo $searchtype." Schedule"."(".$result->num_rows.")"; ?> </p>
                        <p class="heading-main12" style="margin-left: 45px;font-size:22px;color:rgb(49, 49, 49)"><?php echo $q.$insertkey.$q ; ?> </p>
                    </td>
                    
                </tr>
                
                
                
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                            
                        <tbody>
                        
                            <?php

                                
                                

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="gschedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                    
                                for ( $x=0; $x<($result->num_rows);$x++){
                                    echo "<tr>";
                                    for($q=0;$q<3;$q++){
                                        $row=$result->fetch_assoc();
                                        if (!isset($row)){
                                            break;
                                        };
                                        $gscheduleid=$row["gscheduleid"];
                                        $gtitle=$row["gtitle"];
                                        $groomname=$row["groomname"];
                                        $gscheduledate=$row["gscheduledate"];
                                        $gscheduletime=$row["gscheduletime"];

                                        if($gscheduleid==""){
                                            break;
                                        }

                                        echo '
                                        <td style="width: 25%;">
                                                <div  class="dashboard-items search-items"  >
                                                
                                                    <div style="width:100%">
                                                            <div class="h1-search">
                                                                '.substr($gtitle,0,21).'
                                                            </div><br>
                                                            <div class="h3-search">
                                                                '.substr($groomname,0,30).'
                                                            </div>
                                                            <div class="h4-search">
                                                                '.$gscheduledate.'<br>Starts: <b>@'.substr($gscheduletime,0,5).'</b> (24h)
                                                            </div>
                                                            <br>
                                                            <a href="gbooking.php?id='.$gscheduleid.'" ><button  class="login-btn btn-primary-soft btn "  style="padding-top:11px;padding-bottom:11px;width:100%"><font class="tn-in-text">Book Now</font></button></a>
                                                    </div>
                                                            
                                                </div>
                                            </td>';

                                    }
                                    echo "</tr>";
                                    
                                   
                                    
                                }
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

    </div>

</body>
</html>
