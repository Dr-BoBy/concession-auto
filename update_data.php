<?php
    //meme form que pour l'ajout de donnée mais ceux ci sont prérempli
    include "check_login.php";
    connect_db("localhost","root","root","concession_klein_florian");
    $update = explode(" ", $_POST['update']);
    if ($update[0]=="client"){
        db_request("Select * from personne where id=".$update[1]);
        echo "<form action='update.php' method='post'>
            <label>ID : <input type='text' name='id' readonly='readonly' value='".$tab_result[0][0]."'/></label><br>
            <label>Nom : <input type='text' name='nom' value='".$tab_result[0][1]."'/></label><br>
            <label>Prénom : <input type='text' name='prenom' value='".$tab_result[0][2]."'/></label><br><br>
            <button type='submit' name='type' value='client'>Modifier</button>
        </form>";
    }
    if ($update[0]=="vehicule"){
        db_request("Select * from vehicule where id=".$update[1]);
        echo "<form action='update.php' method='post'>
            <label>ID : <input type='text' name='id' readonly='readonly' value='".$tab_result[0][0]."'/></label><br>
            <label>Immatriculation : <input type='text' name='immatriculation' value='".$tab_result[0][1]."'/></label><br>
            <label>Marque : <input type='text' name='marque' value='".$tab_result[0][2]."'/></label><br>
            <label>Modèle : <input type='text' name='modele' value='".$tab_result[0][3]."'/></label><br>
            <label>Puissance : <input type='text' name='puissance' value='".$tab_result[0][4]."'/>kW</label><br><br>
            <button type='submit' name='type' value='vehicule'>Modifier</button>
        </form>";
    }
    if ($update[0]=="achat"){
        echo "<form action='update.php' method='post'>
            <label>ID Client <select name='id_personne'>";
        connect_db("localhost","root","root","concession_klein_florian");
        db_request("Select id,nom from personne");
        for ($i=0; $i<count($tab_result); $i++){
            if ($tab_result[$i][0]==$update[1]){
                echo "<option value='".$tab_result[$i][0]."' selected>".$tab_result[$i][0]." / ".$tab_result[$i][1]."</option>";
            }
            else {
                echo "<option value='".$tab_result[$i][0]."'>".$tab_result[$i][0]." / ".$tab_result[$i][1]."</option>";
            } 
        }
        echo "</select></label><br>

            <label>ID Vehicule <select name='id_vehicule'>";
        connect_db("localhost","root","root","concession_klein_florian");
        db_request("Select id,modele from vehicule");
        for ($i=0; $i<count($tab_result); $i++){
            if ($tab_result[$i][0]==$update[2]){
                echo "<option value='".$tab_result[$i][0]."' selected>".$tab_result[$i][0]." / ".$tab_result[$i][1]."</option>";
            }
            else {
                echo "<option value='".$tab_result[$i][0]."'>".$tab_result[$i][0]." / ".$tab_result[$i][1]."</option>";
            }   
        }
        echo "</select></label><br>";
        connect_db("localhost","root","root","concession_klein_florian");
        db_request("select * from achat where id_personne=".$update[1]." and id_vehicule=".$update[2]);
        echo "
            <label>Date : <input type='date' name='date' value='".$tab_result[0][2]."'/></label><br>
            <label>Prix : <input type='text' name='prix' value='".$tab_result[0][3]."'/></label><br><br>
            <input type='hidden' name='old_id_personne' value='".$update[1]."'/>
            <input type='hidden' name='old_id_vehicule' value='".$update[2]."'/><br>
            <button type='submit' name='type' value='achat'>Modifier</button>
            
        </form>";
    }
    echo "<form action='TD2.php'><input type='submit' value='Annuler' /></form>";
?>