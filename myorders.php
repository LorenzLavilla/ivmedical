    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="cart.css" />
        <title>MY ORDERS</title>
    </head>

    <body style="background-image: url(./images/background.jpg); background-size: cover;">
        <nav class="navbar navbar-expand sticky-top" style="background-color: #000; height: 75px; ">
            <div class="container">
                <a href="home.php" class="navbar-brand mb-0 h1" style="color: white;">
                    IV Medical Center
                </a>
                <a class="navbar-brand mb-0 h1" style="color: white;">
                    |
                </a>
                <ul class="navbar-nav ">
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
        <div class="container my-4">
            <h4 style="color: #fff;">MY ORDERS</h4>
            <div id="link_wrapper">

            </div>
        </div>
    </body>

    </html>
    <script>
        function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("link_wrapper").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "myordersdata.php", true);
            xhttp.send();
        }
        setInterval(function() {
            loadXMLDoc();
        }, 1000);
        window.onload = loadXMLDoc;
    </script>