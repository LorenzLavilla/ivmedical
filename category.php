<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="category.css" />
    <title>CATEGORY</title>
</head>

<body style="background: black">
<?php
    
    if (!isset($_COOKIE['user'])) {
        header("Location: index.php");
    }
    ?>
    <nav class="navbar navbar-expand" style="background-color: #000; height: 75px;">
        <div class="container">
            <?php 
            include'login.php';
            ?>
            <a href=" home.php?Name=".$name class="navbar-brand mb-0 h1" style="color: white;">
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
                <li>
                    <a href="cart.php" class="nav-link " style="color: white;">
                       CART
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
    <h4>CHOOSE YOUR PREFERENCES</h4>
    <div class="main">

        <a href="ricemeal.php">
            <div class="choice1">
                <p>RICE MEAL</p>
            </div>
        </a>
        <a href="drinks.php">
            <div class="choice2">
                <p>DRINKS</p>
            </div>
        </a>
        <a href="dessert.php">
            <div class="choice3">
                <p>DESSERTS</p>
            </div>
        </a>
    </div>


</body>

</html>