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


    if($_POST){
        if(isset($_POST["booknow"])){
            $gapponum=$_POST["gapponum"];
            $gscheduleid=$_POST["gscheduleid"];
            $date=$_POST["date"];
            $gscheduleid=$_POST["gscheduleid"];
            $sql2="insert into gappointment(pid,gapponum,gscheduleid,gappodate) values ($userid,$gapponum,$gscheduleid,'$date')";
            $result= $database->query($sql2);
            header("location: gappointment.php?action=booking-added&id=".$gapponum."&gtitleget=none");

        }
    }
 ?>