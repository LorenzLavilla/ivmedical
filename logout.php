<?php  
   if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']); 
    setcookie('user', '', time() - 3600, '/');
    header("Location: index.php");
    return true;
} else {
    header("Location: index.php");
    return false;
}

?>