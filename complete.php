<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="cart.css" />
    <title>Orders</title>
</head>

<body style="background-image: url(./images/background.jpg); background-size: cover;">
<nav class=" navbar navbar-expand" style="background-color: #000; height: 75px;">
        <div class="container">
            <a href="restaurant.php" class="navbar-brand mb-0 h1" style="color: white;">
                IV Medical Center
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a href="#" class="nav-link " style="color: white;">
                            <img src="/images/fblogo.png" alt="HTML5 Icon" style="width:30px;height:30px;">
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link " style="color: white;">
                            <img src="/images/twitterlogo.png" alt="HTML5 Icon" style="width:30px;height:30px;">
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link " style="color: white;">
                            <img src="/images/instagramlogo.png" alt="HTML5 Icon" style="width:30px;height:30px;">
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="logout.php" class="nav-link " style="color: white;">
                            <img src="/images/logout.png" alt="HTML5 Icon" style="width:30px;height:30px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <h4>DISPATCHED ORDERS</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $status = "On Kitchen";
                include "connectionsql_server.php";
                $query = "SELECT DISTINCT OrderID, PatientID, Status FROM Orders WHERE Status != ? ORDER BY STATUS DESC";
                $params = array($status);
                $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
                $result = sqlsrv_query($conn, $query, $params, $options);
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo "
                     <tr>
                     <td>$row[OrderID]</td> 
                     <td>$row[Status]</td> 
                     <td>
                      <form method ='post' >
                      <a class='btn btn-danger' href=viewcompleted.php?orderid=$row[OrderID]>VIEW ORDER</a>
                      </form>
                       </td>
                      </tr>
                     ";
                }
                sqlsrv_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>