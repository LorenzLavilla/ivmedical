<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="view.css" />
    <title>Document</title>
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
    <table class="table table-striped table-dark" id="mytable">
            <h4 style="color: #fff;">ORDER DETAILS</h4>
            <thead>
                <tr>
                    <th scope="col">Food Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orderid = $_GET['orderid'];
                include "connectionsql_server.php";
                $query = "SELECT * FROM Orders WHERE OrderID = ?";
                $params = array($orderid);
                $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
                $result = sqlsrv_query($conn, $query, $params, $options);
                $number = 0;
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    if ($number == 0) {
                        $patientid = $row['PatientID'];
                        $queryname = "SELECT * FROM patientrecord WHERE PatientID = ?";
                        $parameter = array($patientid);
                        $options2 = array("Scrollable" => SQLSRV_CURSOR_STATIC);
                        $result1 = sqlsrv_query($conn, $queryname, $parameter, $options2);
                        $recordCount = sqlsrv_num_rows($result1);
                        if ($recordCount > 0) {
                            $row1 = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC);
                            echo "
                            <label>NAME: <b>$row1[FirstName] $row1[LastName]</b></label>
                            <br>
                            <label>DEPARTMENT : <b>$row1[PatientDept]</b></label>
                            <br>
                            <label>ROOM NUMBER : <b>$row1[RoomNum]</b></label>
                            ";
                            $number++;
                        }
                    }
                    echo "
                     <tr>
                     <td><b>$row[FoodName]</b></td> 
                     <td>$row[Quantity]</td> 
                     <td>$row[Cost]</td> 
                     <td>$row[Total]</td> 
                    </tr>
                     ";
                }
                sqlsrv_close($conn);
                ?>
              
            </tbody>
        </table>    
        <?php
         $orderidd = $_GET['orderid'];
         echo
         "
         <form method ='post' >
         <a class='btn btn-danger' href=orderserved.php?orderid=$orderidd>ORDER SERVED</a>
         </form>
         ";
        ?>       
    </div>
</body>

</html>