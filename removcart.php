<?php
   header("Cache-Control: no-cache, must-revalidate");
   header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      if(isset($_POST['action']))
      {
            if($_POST['action'] == 'delete')
            {
                  delete();
            }
      }
      function delete() {
            include('connectionsql_server.php');
            $orderid = $_POST["OrderID"];
            $patientid = $_COOKIE['user']; 
            $removequery = "DELETE FROM cart WHERE PatientID = ? AND OrderID = ?";
            $params = array($patientid, $orderid);
            $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
            $deleteResult = sqlsrv_query($conn, $removequery, $params, $options);
            sqlsrv_close($conn);
        }
        

?>