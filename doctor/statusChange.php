<?php
include('../connection.php');
if (isset($_POST)) {
    $appoid = $_POST['appoid'];
    $status = $_POST['statusValue'];
    $stmt = $database->query("UPDATE appointment SET status='$status' WHERE appoid='$appoid'");
    if ($stmt) {
        $statusMessage = "Status changed!";
        $stmt = $database->query("SELECT pid, appodate FROM appointment WHERE appoid='$appoid'");
        $appointment = $stmt->fetch_assoc();
        $pid = $appointment['pid'];
        $appodate = $appointment['appodate'];
        $stmt = $database->query("SELECT pname, ptel FROM patient WHERE pid='$pid'");
        $patient = $stmt->fetch_assoc();
        $pname = $patient['pname'];
        $ptel = "+63" . $patient['ptel'];
        if ($status === '1') {
            $statusMessage = "Good day, " . $pname . "! Your appointment in " . $appodate . " is currently pending. Please wait for further information.";
            include("../admin/sms.php");
        } else if ($status === '2') {
            $statusMessage = "Good day, " . $pname . "! Your appointment in " . $appodate . " is currently ongoing.";
            include("../admin/sms.php");
        } else if ($status === '3') {
            $statusMessage = "Good day, " . $pname . "! Your appointment in " . $appodate . " has been completed.";
            include("../admin/sms.php");
        } else if ($status === '4') {
            $statusMessage = "Good day, " . $pname . "! Unfortunately, your appointment in " . $appodate . " has been rejected by your doctor.";
            include("../admin/sms.php");
        }
        echo $statusMessage;
    }
}

?>