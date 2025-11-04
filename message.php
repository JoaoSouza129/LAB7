<?php
    session_start();
    if(!isset($_SESSION['username']))
        echo "<h1>SEE YOU SOON</h1>";
    else
        echo "<h1>WELCOME BACK! " ,$_SESSION['username'], "</h1>";
    
    
    header( "refresh:3;url=index.php" );
    

?>