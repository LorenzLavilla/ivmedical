<?php
date_default_timezone_set('Asia/Manila');
include('connectionsql_server.php');
$orderid = rand(1000,2000);
$patientid = $_COOKIE['user']; 
$status = "On Kitchen";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents('php://input'));
    foreach ($data as $row) {
        $name = $row->name;
        $age = $row->age;
        $column3 = $row->column3;
        $column4 = $row->column4;
        $date = date('Y-m-d h:i A');
        $sql = "INSERT INTO Orders (OrderID, PatientID, FoodName, Quantity,Cost,Total,Status,Date) VALUES (?, ?, ?, ?,?,?,?,?)";
        $delete = "DELETE FROM Cart where PatientID = ?";
        $delparam= array($patientid);
        $params = array($orderid,$patientid,$name, $age, $column3, $column4,$status,$date);
        $stmt = sqlsrv_query($conn, $sql, $params);
        $stmt2 = sqlsrv_query($conn, $delete, $delparam);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

   sqlsrv_close($conn);
}
