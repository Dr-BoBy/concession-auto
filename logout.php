<?php 
    session_start();
    session_destroy();//on détruit la session
    header("Location: TD2.php");
?>