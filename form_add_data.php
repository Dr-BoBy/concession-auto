<?php
    include "check_login.php"; // on inclut la verification de session
?>
<html>
    <body>
        <!--Form nouveau client-->
        <h1>Nouveau Client</h1>
        <form action="add_data.php" method="post">
            <label>Nom : <input type="text" name="nom"/></label><br>
            <label>Prénom : <input type="text" name="prenom"/></label><br><br>
            <button type='submit' name='type' value="Client">Ajouter</button>
        </form>
        <!--Form nouveau vehicule-->
        <h1>Nouveau Véhicule</h1>
        <form action="add_data.php" method="post">
            <label>Immatriculation : <input type="text" name="immatriculation"/></label><br>
            <label>Marque : <input type="text" name="marque"/></label><br>
            <label>Modèle : <input type="text" name="modele"/></label><br>
            <label>Puissance : <input type="text" name="puissance"/> kW</label><br><br>
            <button type='submit' name='type' value="Vehicule">Ajouter</button>
        </form>
        <!--Form nouvel achat-->
        <h1>Nouvel Achat</h1>
        <form action="add_data.php" method="post">
            <label>ID Client / Nom<select name="id_client">
            <?php
                //requete sql pour créer un select dynamique avec les clients de la BDD
                connect_db("localhost","root","root","concession_klein_florian");
                db_request("Select id,nom from personne");
                for ($i=0; $i<count($tab_result); $i++){
                    echo "<option value='".$tab_result[$i][0]."'>".$tab_result[$i][0]." / ".$tab_result[$i][1]."</option>";
                }
                
            ?>
            </select></label><br>

            <label>ID Véhicule / Modèle <select name="id_vehicule">
            <?php
                //requete sql pour créer un select dynamique avec les véhicules de la BDD
                connect_db("localhost","root","root","concession_klein_florian");
                db_request("Select id,modele from vehicule");
                for ($i=0; $i<count($tab_result); $i++){
                    echo "<option value='".$tab_result[$i][0]."'>".$tab_result[$i][0]." / ".$tab_result[$i][1]."</option>";
                }
                
            ?>
            </select></label><br>
            <label>Prix : <input type="text" name="price"/> €</label><br>
            <label>Date : <input type="date" name="date"/></label><br><br>
            <button type='submit' name='type' value="Achat">Ajouter</button>
        </form>
    </body>
</html>