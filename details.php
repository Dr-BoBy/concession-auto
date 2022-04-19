<?php
    include "check_login.php"; //on inclut la verification de session
    connect_db("localhost","root","root","concession_klein_florian"); //on se connecte à la table et on répuère les donnée d'achat du client
    db_request("SELECT personne.id, nom, prenom,vehicule.id, marque, modele, date, prix FROM `personne`,`achat`,`vehicule` WHERE personne.id=".$_POST['id']." and personne.id=achat.id_personne and vehicule.id=achat.id_vehicule");
    if (empty($tab_result)){
        echo "Aucun achat pour ce client";
    }
    else { //on affiche le tout dans un tableau
        $titles=["ID véhicule","Marque","Modèle","Date d'achat","Prix d'achat"];
        echo "<table>";
            echo "<tr style=>Achat de ".$tab_result[0][1]." ".$tab_result[0][2]." (ID=".$tab_result[0][0].") :</tr>";
            echo "<tr>";
            for ($i=0; $i<count($titles); $i++){
                echo "<td style='text-align: center; padding: 15px'>".$titles[$i]."</td>";
            }
            echo "</tr>";
            for ($i=0; $i<(count($tab_result)); $i++){
                echo "<tr>";
                for ($j=3; $j<(count($tab_result[$i])/2); $j++){
                    echo "<td style='text-align: center; padding: 15px'>".$tab_result[$i][$j]."</td>";
                }
                echo "</tr>";
            }
        echo "<table>";
    }
    echo "<form action='TD2.php'><input type='submit' value='Annuler' /></form>";
?>