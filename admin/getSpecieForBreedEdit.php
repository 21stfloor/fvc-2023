<?php
include('../connection.php');
$stmtForIdArray = $database->query("SELECT speId FROM species");
$stmtForNameArray = $database->query("SELECT name FROM species");
$idArray = array();
$nameArray = array();
if ($stmtForIdArray) {
    while ($row = $stmtForIdArray->fetch_assoc()) {
        $idArray[] = $row['speId'];
    }
}
if ($stmtForNameArray) {
    while ($row = $stmtForNameArray->fetch_assoc()) {
        $nameArray[] = $row['name'];
    }
}
$idArray = json_encode($idArray);
$nameArray = json_encode($nameArray);
?>