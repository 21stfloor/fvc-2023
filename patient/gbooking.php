<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>FVC | Booking</title>
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
     <?php include('../inc/patientSidebar.php') ?>
        </div>
        
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="gschedule.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td >
                            <form action="gschedule.php" method="post" class="header-search">

                                        <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Groomer name or Email or Date (YYYY-MM-DD)" list="groomers" >&nbsp;&nbsp;
                                        
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

                    </td>
                    
                </tr>
                
                
                
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                            
                        <tbody>
                        
                            <?php
                            
                            if(($_GET)){
                                
                                
                                if(isset($_GET["id"])){
                                    

                                    $id=$_GET["id"];

                                    $sqlmain= "select * from gschedule inner join groomer on gschedule.groomid=groomer.groomid where gschedule.gscheduleid=$id  order by gschedule.gscheduledate desc";

                                    
                                    $result= $database->query($sqlmain);
                                    $row=$result->fetch_assoc();
                                    $gscheduleid=$row["gscheduleid"];
                                    $gtitle=$row["gtitle"];
                                    $groomname=$row["groomname"];
                                    $groomemail=$row["groomemail"];
                                    $gscheduledate=$row["gscheduledate"];
                                    $gscheduletime=$row["gscheduletime"];
                                    $sql2="select * from gappointment where gscheduleid=$id";

                                     $result12= $database->query($sql2);
                                     $gapponum=($result12->num_rows)+1;
                                    
                                    echo '
                                        <form action="gbooking-complete.php" method="post">
                                            <input type="hidden" name="gscheduleid" value="'.$gscheduleid.'" >
                                            <input type="hidden" name="gapponum" value="'.$gapponum.'" >
                                            <input type="hidden" name="date" value="'.$today.'" >

                                        
                                    
                                    ';
                                     

                                    echo '
                                    <td style="width: 50%;" rowspan="2">
                                            <div  class="dashboard-items search-items"  >
                                            
                                                <div style="width:100%">
                                                        <div class="h1-search" style="font-size:25px;">
                                                            Session Details
                                                        </div><br><br>
                                                        <div class="h3-search" style="font-size:18px;line-height:30px">
                                                            Groomer Name:  &nbsp;&nbsp;<b>'.$groomname.'</b><br>
                                                            Groomer Email:  &nbsp;&nbsp;<b>'.$groomemail.'</b> 
                                                        </div>
                                                        <div class="h3-search" style="font-size:18px;">
                                                          
                                                        </div><br>
                                                        <div class="h3-search" style="font-size:18px;">
                                                            Session Title: '.$gtitle.'<br>
                                                            Session Scheduled Date: '.$gscheduledate.'<br>
                                                            Session Starts : '.$gscheduletime.'<br>
                                                            

                                                        </div>
                                                        <br>
                                                        
                                                </div>
                                                        
                                            </div>
                                        </td>
                                        
                                        
                                        
                                        <td style="width: 25%;">
                                            <div  class="dashboard-items search-items"  >
                                            
                                                <div style="width:100%;padding-top: 15px;padding-bottom: 15px;">
                                                        <div class="h1-search" style="font-size:20px;line-height: 35px;margin-left:8px;text-align:center;">
                                                            Your Appointment Number
                                                        </div>
                                                        <center>
                                                        <div class=" dashboard-icons" style="margin-left: 0px;width:90%;font-size:70px;font-weight:800;text-align:center;color:var(--btnnictext);background-color: var(--btnice)">'.$gapponum.'</div>
                                                    </center>
                                                       
                                                        </div><br>
                                                        
                                                        <br>
                                                        <br>
                                                </div>
                                                        
                                            </div>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:10px;padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;width:95%;text-align: center;" value="Book now" name="booknow"></button>
                                            </form>
                                            </td>
                                        </tr>
                                        '; 
                                        




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