<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="drinks.css" />
    <title>Document</title>
</head>

<body style="background-image: url(./images/food1.jpg); background-size: cover;">
    <?php
    if (!isset($_COOKIE['user'])) {
        header("Location: index.php");
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
    <h4>SELECT YOUR DRNKS</h4>
    <div class="div">
        <ul class="ul1">
            <li class="list">
                <div class="foods">
                    <p id="foodname2" class="foodname2">AVOCADO SHAKE</p>
                    <h6 id="price2" class="price2">80</h6>
                    <img class="foodimage" src="/images/avocado.jpg" alt="HTML5 Icon">
                    <div class="buttons">
                        <button id="addbutton2" type="button" class="btn btn-primary btn-sm">-</button>
                        <small id="quant2" class="quant2">0</small>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('addbutton2').addEventListener('click', function() {
                                    document.getElementById('quant2').innerHTML--;
                                });
                            });
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('minusbutton2').addEventListener('click', function() {
                                    document.getElementById('quant2').innerHTML++;
                                });
                            });
                        </script>
                        <button id="minusbutton2" type="button" class="btn btn-primary btn-sm">+</button>
                        <br>
                         <button id="insert-button2" class='btn btn2 btn-danger'>ADD TO CART</button> </a>
                        <script src="addtocart2.js"></script>
                        <script>
                                // Get references to the button and the "small" element
                                var btn3 = document.getElementById("insert-button2");
                                var btn4 = document.getElementById("addbutton2");
                                var smallElement2 = document.getElementById("quant2");

                                // Function to check and update the button's disabled state
                                function updateButtonStatus() {
                                    if (smallElement2.innerText === "0") {
                                        btn3.disabled = true;
                                        btn4.disabled = true;
                                    } else {
                                        btn3.disabled = false;
                                        btn4.disabled = false;
                                    }
                                }
                                // Call the function initially
                                updateButtonStatus();

                                // Set up an interval to periodically check and update the button's status
                                setInterval(updateButtonStatus, 100); // Check every second (adjust the interval as needed)
                            </script>
                            <script type="text/javascript">
                                $('.btn2').click(function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Added to cart successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                })
                            </script>
                    </div>
                </div>
            </li>
            <li class="list">
                <div class="foods">
                    <p id="foodname3" class="foodname3">SODA</p>
                    <h6 id="price3" class="price3">50</h6>
                    <img class="foodimage" src="/images/soda.jpg" alt="HTML5 Icon">
                    <div class="buttons">
                        <button id="addbutton3" type="button" class="btn btn-primary btn-sm">-</button>
                        <small id="quant3" class="quant3">0</small>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('addbutton3').addEventListener('click', function() {
                                    document.getElementById('quant3').innerHTML--;
                                });
                            });
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('minusbutton3').addEventListener('click', function() {
                                    document.getElementById('quant3').innerHTML++;
                                });
                            });
                        </script>
                        <button id="minusbutton3" type="button" class="btn btn-primary btn-sm">+</button>
                        <br>
                        <button id="insert-button3" class='btn btn3 btn-danger'>ADD TO CART</button> </a>
                        <script src="addtocart3.js"></script>
                        <script>
                                // Get references to the button and the "small" element
                                var btn5 = document.getElementById("insert-button3");
                                var btn6 = document.getElementById("addbutton3");
                                var smallElement3 = document.getElementById("quant3");

                                // Function to check and update the button's disabled state
                                function updateButtonStatus() {
                                    if (smallElement3.innerText === "0") {
                                        btn5.disabled = true;
                                        btn6.disabled = true;
                                    } else {
                                        btn5.disabled = false;
                                        btn6.disabled = false;
                                    }
                                }
                                // Call the function initially
                                updateButtonStatus();

                                // Set up an interval to periodically check and update the button's status
                                setInterval(updateButtonStatus, 100); // Check every second (adjust the interval as needed)
                            </script>
                            <script type="text/javascript">
                                $('.btn3').click(function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Added to cart successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                })
                            </script>
                    </div>
                </div>

            </li>
            <li class="list">
                <div class="foods">
                    <p id="foodname4" class="foodname4">GULAMAN</p>
                    <h6 id="price4" class="price4">30</h6>
                    <img class="foodimage" src="/images/gulaman.jpg" alt="HTML5 Icon">
                    <div class="buttons">
                        <button id="addbutton4" type="button" class="btn btn-primary btn-sm">-</button>
                        <small id="quant4" class="quant4">0</small>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('addbutton4').addEventListener('click', function() {
                                    document.getElementById('quant4').innerHTML--;
                                });
                            });
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('minusbutton4').addEventListener('click', function() {
                                    document.getElementById('quant4').innerHTML++;
                                });
                            });
                        </script>
                        <button id="minusbutton4" type="button" class="btn btn-primary btn-sm">+</button>
                        <br>
                        <button id="insert-button4" class='btn btn4 btn-danger'>ADD TO CART</button> </a>
                        <script src="addtocart4.js"></script>
                        <script>
                                // Get references to the button and the "small" element
                                var btn7 = document.getElementById("insert-button4");
                                var btn8 = document.getElementById("addbutton4");
                                var smallElement4 = document.getElementById("quant4");

                                // Function to check and update the button's disabled state
                                function updateButtonStatus() {
                                    if (smallElement4.innerText === "0") {
                                        btn7.disabled = true;
                                        btn8.disabled = true;
                                    } else {
                                        btn7.disabled = false;
                                        btn8.disabled = false;
                                    }
                                }
                                // Call the function initially
                                updateButtonStatus();

                                // Set up an interval to periodically check and update the button's status
                                setInterval(updateButtonStatus, 100); // Check every second (adjust the interval as needed)
                            </script>
                            <script type="text/javascript">
                                $('.btn4').click(function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Added to cart successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                })
                            </script>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</body>

</html>