<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from groomer where groomid=$id;");
        $email=($result001->fetch_assoc())["groomemail"];
        $sql= $database->query("delete from webuser where email='$email';");
        $sql= $database->query("delete from groomer where groomemail='$email';");
        header("location: groomers.php");
    }


?>