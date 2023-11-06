<?php
session_start();
$orderid = rand(0, 100);
$patientid = $_COOKIE['user'];
include('connectionsql_server.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $smallContent1 = $_POST['quant3'];
    $h6Content1 = $_POST['price3'];
    $pContent1 = $_POST['foodname3'];

    // Check if the combination of $patientid and $pContent1 already exists
    $checkSql = "SELECT * FROM cart WHERE PatientID = ? AND OrderName = ?";
    $checkParams = array($patientid, $pContent1);
    $checkStmt = sqlsrv_query($conn, $checkSql, $checkParams);
    if ($checkStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);
    if ($row < 1) {
        // The combination does not exist, so proceed with the insertion
        $insertSql = "INSERT INTO cart (PatientID, OrderName, Quantity, Cost, OrderID) VALUES (?, ?, ?, ?, ?)";
        $insertParams = array($patientid, $pContent1, $smallContent1, $h6Content1, $orderid);
        $insertStmt = sqlsrv_query($conn, $insertSql, $insertParams);
        if ($insertStmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_close($conn);
    } else {
        sqlsrv_close($conn);
    }

    sqlsrv_free_stmt($checkStmt);
    sqlsrv_free_stmt($insertStmt);
}
?>
