<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_POST){

        include("../connection.php");
        $gtitle=$_POST["gtitle"];
        $groomid=$_POST["groomid"];
        $gnop=$_POST["gnop"];
        $date=$_POST["date"];
        $time=$_POST["time"];
        $sql="insert into gschedule (groomid,gtitle,gscheduledate,gscheduletime,gnop) values ($groomid,'$gtitle','$date','$time',$gnop);";
        $result= $database->query($sql);
        header("location: gschedule.php?action=session-added&gtitle=$gtitle");
        
    }


?>