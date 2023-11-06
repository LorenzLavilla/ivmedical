    <table class="table table-striped table-dark" id="mytable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Order Name</th>
                    <th scope="col"></th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                    <th scope="col">Cost</th>
                    <th scope="col">Total</th>
                    <th score="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $patientid = $_COOKIE['user'];
                include "connectionsql_server.php";
                $query = "SELECT * FROM cart WHERE PatientID = ?";
                $params = array($patientid);
                $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
                $result = sqlsrv_query($conn, $query, $params, $options);
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $totalfood = $row["Quantity"] * $row["Cost"];
                    echo "
                    <tr data-id='$row[OrderID]'>
                    <td>$row[OrderName]</td>
                    <td><button type='button' class='btn btn-danger minus'>-</button></td>
                    <td class='quantity'>$row[Quantity]</td>
                    <td><button type='button' class='btn btn-danger add'>+</button></td>
                    <td>$row[Cost]</td>
                    <td>$totalfood</td>
                    <td>
                        <button type='button' class='btn btn-danger' onclick='deletedata($row[OrderID])'>REMOVE</button>
                    </td>
                    </tr>";
                }

                sqlsrv_close($conn);
                ?>
            </tbody>
        </table>
        