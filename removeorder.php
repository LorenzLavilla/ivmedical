<?php
session_start();
include('connection.php');
if($con->connect_error)
{
    die("Failed to connect : ".$con->connect_error);
}
else
{
    $patientid = $_COOKIE['user']; 
    $query = $con->prepare("delete * from cart where PatientID = $patientid");
    $query->execute();
}
sqlsrv_close($conn);
?>