<?php

    $database= new mysqli("localhost","root","","fvc");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>