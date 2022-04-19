<?php
    include "db_function.php" ; //on inclut les fonctions SQL
    connect_db("localhost","root","root","concession_klein_florian");
    $del = explode(" ", $_POST['del']);
    //on effectue une requete en fonction du type de donnée que l'on supprime
    if ($del[0]=="client"){
        db_query("delete from personne where id=".$del[1]);
        echo "Client supprimé.";
    }
    if ($del[0]=="vehicule"){
        db_query("delete from vehicule where id=".$del[1]);
        echo "Véhicules supprimé.";
    }
    if ($del[0]=="achat"){
        db_query("delete from achat where id_personne=".$del[1]." and id_vehicule=".$del[2]);
        echo "Achat supprimé.";
    }
    header("Location: TD2.php");
?>