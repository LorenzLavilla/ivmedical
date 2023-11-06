<?php

                $orderid = $_GET['orderid'];
                include "connectionsql_server.php";
                $query = "UPDATE Orders SET status = 'Order Served' WHERE OrderID = ?";
                $params = array($orderid);
                $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
                $result = sqlsrv_query($conn, $query, $params, $options);
               echo'
                <script>    
                window.location.href ="complete.php";
                </script>
                ';
                
?>