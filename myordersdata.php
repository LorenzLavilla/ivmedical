<table class="table table-striped table-dark" id="mytable">
    <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Date Ordered</th>
            <th scope="col"></th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $patientid = $_COOKIE['user'];
        include "connectionsql_server.php";
        $query = "SELECT DISTINCT OrderID, PatientID,Date,Status FROM Orders WHERE PatientID = ? ORDER BY DATE DESC";
        $params = array($patientid);
        $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
        $result = sqlsrv_query($conn, $query, $params, $options);
        echo '<audio id="notificationSound" src="images/notif.mp3" preload="auto"></audio>';
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo "
                     <tr>
                     <td>$row[OrderID]</td> 
                     <td>$row[Date]</td> 
                     <td>
                      <form method ='post' >
                      <a class='btn btn-danger' href=view.php?orderid=$row[OrderID]>VIEW ORDER</a>
                      </form>
                       </td>
                       <td>$row[Status]</td> 
                      </tr>
        
                     ";
        }
        sqlsrv_close($conn);
        ?>
    </tbody>
</table>
