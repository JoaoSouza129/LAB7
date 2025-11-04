<?php
    session_start();
    $_SESSION['message']="See you back soon";
    session_destroy();
    setcookie('rememberMe', '', -1);
    unset($_COOKIE["rememberMe"]);
    header("location: message.php");
?>