<?php
    //on verifie si le couple indentifiant/mdp est présent dans la base de donnée
    include("db_function.php");
    $login = @$_POST["login"];
    $pass = @$_POST["pass"];
    connect_db("localhost","root","root","concession_klein_florian");
    db_request("SELECT * FROM session WHERE login='$login' AND pass=MD5('$pass')");
    //si Non on renvoie à la meme page
    if ($tab_result==null) {
        header("Location: form_login.html");
    }
    //si oui on stock les données dans la session
    session_start();
    $_SESSION["login"]=$login;
    $_SESSION["pass"]=$pass;
    header("Location: TD2.php");
?>