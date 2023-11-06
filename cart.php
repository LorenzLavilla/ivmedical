<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="cart.css" />
    <meta http-equiv="cache-control" content="no-cache">
    <title>MY CART</title>
</head>

<body style="background-image: url(./images/background.jpg); background-size: cover;">
    <?php
    if (!isset($_COOKIE['user'])) {
        header("Location: index.php");
        return true;
    }
    ?>
    <nav class="navbar navbar-expand" style="background-color: #000; height: 75px;">
        <div class="container">
            <a href="home.php" class="navbar-brand mb-0 h1" style="color: white;">
                IV Medical Center
            </a>
            <a class="navbar-brand mb-0 h1" style="color: white;">
                |
            </a>
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a href="myorders.php" class="nav-link " style="color: white;">
                        MY ORDERS
                    </a>
                </li>
            </ul>
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
        <h4>MY CART</h4>
        <br>
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
                    <tr data-id=$row[OrderID]>
                    <td>$row[OrderName]</td>
                    <td><button type='button' class='btn btn-danger minus'>-</button></td>
                    <td class='quantity' data-cost='$row[Cost]'>$row[Quantity]</td>
                    <td><button type='button' class='btn btn-danger add'>+</button></td>
                    <td class='cost'>$row[Cost]</td>
                    <td class='total'>$totalfood</td>
                    <td>
                        <button type='button' class='btn btn-danger' onclick='deletedata($row[OrderID])'>REMOVE</button>
                    </td>
                    </tr>";
                }
                sqlsrv_close($conn);
                ?>
            </tbody>
        </table>
        <script type="text/javascript">
            function deletedata(OrderID) {
                $.ajax({
                    url: 'removcart.php',
                    type: 'POST',
                    data: {
                        OrderID: OrderID,
                        action: 'delete'
                    },
                    success: function(response) {
                        // Handle the response from the server if needed
                        console.log(response);
                        location.reload(true);
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors here
                        console.error(error);
                    }
                });
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Use event delegation to handle button clicks
                document.querySelector("table").addEventListener('click', function(e) {
                    if (e.target.classList.contains('add')) {
                        const row = e.target.closest('tr');
                        const quantityElement = row.querySelector('.quantity');
                        const costElement = row.querySelector('.cost');
                        const totalElement = row.querySelector('.total');

                        let quantity = parseInt(quantityElement.textContent);
                        let cost = parseFloat(costElement.textContent);

                        quantity++;
                        quantityElement.textContent = quantity;

                        // Check if the total is a whole number (no decimal part)
                        const newTotal = quantity * cost;
                        if (newTotal === Math.floor(newTotal)) {
                            totalElement.textContent = newTotal;
                        } else {
                            totalElement.textContent = newTotal.toFixed(2);
                        }
                    } else if (e.target.classList.contains('minus')) {
                        const row = e.target.closest('tr');
                        const quantityElement = row.querySelector('.quantity');
                        const costElement = row.querySelector('.cost');
                        const totalElement = row.querySelector('.total');

                        let quantity = parseInt(quantityElement.textContent);
                        let cost = parseFloat(costElement.textContent);

                        if (quantity > 1) {
                            quantity--;
                            quantityElement.textContent = quantity;

                            // Check if the total is a whole number (no decimal part)
                            const newTotal = quantity * cost;
                            if (newTotal === Math.floor(newTotal)) {
                                totalElement.textContent = newTotal;
                            } else {
                                totalElement.textContent = newTotal.toFixed(2);
                            }
                        }
                    }
                });
            });
        </script>
        <img id="image1" src="images/empty.jpg" width="500" height="300">
        <br>
        <a id="checkout" class='btn btn-success' href='category.php'>ADD ORDER</a>
        <button class='btn btn4 btn-danger' id="insert-all-button">CHECK OUT</button></a>
        <script src="script.js"></script>
        <script>
            var btn7 = document.getElementById("insert-all-button");
            var table = document.getElementById("mytable");
            var image = document.getElementById('image1');

            function updateButtonStatus() {
                if (table.rows.length <= 1) {
                    btn7.disabled = true;
                    table.style.display = 'none';
                    image.style.display = 'block';
                } else {
                    btn7.disabled = false;
                    table.style.display = 'table';
                    image.style.display = 'none';
                }
            }
            updateButtonStatus();
            setInterval(updateButtonStatus, 1000);
        </script>
    </div>
</body>

</html>