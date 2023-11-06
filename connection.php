<?php
$con = new mysqli("localhost","root","","azurepoc");
if($con->connect_error)
{
    die("Failed to connect : ".$con->connect_error);
}
else
{
}

?>