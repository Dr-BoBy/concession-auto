<?php
    include("db_function.php"); //on inclut les fonctions SQL
    session_start();
    $login = @$_SESSION["login"];
    $pass = @$_SESSION["pass"];
    connect_db("localhost","root","root","concession_klein_florian");
    db_request("SELECT * FROM session WHERE login='$login' AND pass=MD5('$pass')");
    //on verifie si les données de session correspondent à la BDD sinon on redirige vers la page de connexion
    if ($tab_result==null) {
        header("Location: form_login.html");
    }
?>