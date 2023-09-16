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
        $result001= $database->query("select * from inventory where invid=$id;");
        $code=($result001->fetch_assoc())["invcode"];
        $sql= $database->query("delete from webuser where code='$code';");
        $sql= $database->query("delete from inventory where invcode='$code';");
        header("location: inventory.php");
    }


?>