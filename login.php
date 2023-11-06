
<?php
      session_start();  
      include('connectionsql_server.php');
        if (isset($_POST["username"] ) && isset($_POST["password"] ))
            {
                $username= $_POST['username'];
                $password=  $_POST['password'];
                $query = "SELECT * FROM patientrecord where Username = '$username' AND Password = '$password'";
                $params = array($username, $password);
                $options = array("Scrollable" => SQLSRV_CURSOR_STATIC);
                $result = sqlsrv_query($conn, $query , $params, $options);
                if ($result === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                $recordCount = sqlsrv_num_rows($result);

                if ($recordCount > 0) 
                {
                    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                    $_id =  $row["PatientID"];
                    setcookie('user', $_id,  time() + 3600, '/');
                    $name = $row["FirstName"] ;
                    setcookie('name', $name, time()+3600, '/');
                    header("Location: home.php?Name=".$name);
                    sqlsrv_close($conn);
                    exit();
                }
                else if($username == "kitchen@IV.com" & $password=="12345")
                {
                    header("Location:restaurant.php");
                    exit();
                }
                else 
                {
                    echo'<script>
                    window.location.href ="index.php";
                    alert ("Invalid Username or Password")
                    </script>';
                }
            } 
?>
