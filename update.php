<?php
    //on effectue des requete en fonctions du type de donnée que l'on veut modifier.
    include "db_function.php" ;
    connect_db("localhost","root","root","concession_klein_florian");
    if ($_POST['type']=="client"){
        db_query("UPDATE personne SET nom = '".$_POST['nom']."', prenom = '".$_POST['prenom']."' WHERE id=".$_POST['id']);
        if ($db_result==false){
            echo "UPDATE personne SET nom = '".$_POST['nom']."', prenom = '".$_POST['prenom']."' WHERE id=".$_POST['id'];
        }
        else{
            echo "Changement effectué";
        }
    }
    if ($_POST['type']=="vehicule"){
        db_query("UPDATE vehicule SET immatriculation = '".$_POST['immatriculation']."', marque = '".$_POST['marque']."', modele = '".$_POST['modele']."', puissance = '".$_POST['puissance']."' WHERE id=".$_POST['id']);
        if ($db_result==false){
            echo "UPDATE vehicule SET immatriculation = '".$_POST['immatriculation']."', marque = '".$_POST['marque']."', modele = '".$_POST['modele']."', puissance = '".$_POST['puissance']."' WHERE id=".$_POST['id'];
        }
        else{
            echo "Changement effectué";
        }
    }
    if ($_POST['type']=="achat"){
        db_query("UPDATE achat SET id_personne = '".$_POST['id_personne']."',id_vehicule = '".$_POST['id_vehicule']."',date = '".$_POST['date']."', prix = '".$_POST['prix']."' WHERE id_personne=".$_POST['old_id_personne']." and id_vehicule=".$_POST['old_id_vehicule']);
        if ($db_result==false){
            echo "UPDATE achat SET id_personne = '".$_POST['id_personne']."',id_vehicule = '".$_POST['id_vehicule']."',date = '".$_POST['date']."', prix = '".$_POST['prix']."' WHERE id_personne=".$_POST['old_id_personne']." and id_vehicule=".$_POST['old_id_vehicule'];
        }
        else{
            echo "Changement effectué";
        }
    }
    header("Location: TD2.php");
?>