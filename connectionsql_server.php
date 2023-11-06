<?php
    $serverName = "azurepoc1.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "azurepoc", // update me
        "Uid" => "lavillalorenz", // update me
        "PWD" => "Uzumakinaruto08" // update me
    );
    //Establishes the connection
    $conn =sqlsrv_connect($serverName, $connectionOptions);
?>