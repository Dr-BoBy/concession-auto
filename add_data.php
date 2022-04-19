<?php
    include "db_function.php" ;//on inclut les fonctions SQL
    connect_db("localhost","root","root","concession_klein_florian");
    //on effectue une requete en fonction du type de donnée ajouté
    if ($_POST['type']=="Client"){
        db_query("INSERT INTO `personne` (`nom`, `prenom`) VALUES ('".$_POST['nom']."','".$_POST['prenom']."')");
        echo "Nouveau client ajouté.";
    }
    if ($_POST['type']=="Vehicule"){
        db_query("INSERT INTO `vehicule` (`immatriculation`, `marque`, `modele`, `puissance`) VALUES ('".$_POST['immatriculation']."','".$_POST['marque']."','".$_POST['modele']."','".$_POST['puissance']."')");
        echo "Nouveau véhicule ajouté.";
    }
    if ($_POST['type']=="Achat"){
        db_query("INSERT INTO `achat` (`id_personne`, `id_vehicule`, `date`, `prix`) VALUES ('".$_POST['id_client']."','".$_POST['id_vehicule']."','".$_POST['date']."','".$_POST['price']."')");
        echo "Nouvel achat ajouté.";
    }
    header("Location: TD2.php");
?>