<?php
    //on affiche les données de la BDD dans un tableau dynamique
    include "check_login.php";
    $row_names=[["Client","ID","Nom","Prénom"],["Achat","ID Client","Nom","Prénom","ID véhicule","Immatriculation","Modèle","Date","Prix"],["Véhicules","ID","Immatriculation","Marque","Modèle","Puissance"]];

    function show_tab_result($titles,$tab){
        echo "<table>";
        echo "<tr >".$titles[0]."</tr>";
        echo "<tr>";
        for ($i=1; $i<count($titles); $i++){
            echo "<td style='text-align: center; padding: 15px'>".$titles[$i]."</td>";
        }
        echo "</tr>";
        for ($i=0; $i<(count($tab)); $i++){
            echo "<tr>";
            for ($j=0; $j<(count($tab[$i])/2); $j++){
                echo "<td style='text-align: center; padding: 15px'>".$tab[$i][$j]."</td>";
            }
            if ($titles[0]=="Client"){
                echo "<td>
                    <form action='details.php' method='post'>
                        <button type='submit' name='id' value='".$tab[$i][0]."'>Voir les achats</button>
                    </form>        
                </td>";
            }
            /////////////////MODIFY//////////////////////////////////////////////////////////////////////////
            echo "<td><form action='update_data.php' method='post'><button type='submit' name='update' value='";
            if ($titles[0]=="Client"){
                echo "client ".$tab[$i][0];
            }
            if ($titles[0]=="Véhicules"){
                echo "vehicule ".$tab[$i][0];
            }
            if ($titles[0]=="Achat"){
                echo "achat ".$tab[$i][0]." ".$tab[$i][3];
            }
            echo "'>Modifier</button></form></td>";
            /////////////////DELETE//////////////////////////////////////////////////////////////////////////
            echo "<td><form action='del_data.php' method='post'><button type='submit' name='del' value='";
            if ($titles[0]=="Client"){
                echo "client ".$tab[$i][0];
            }
            if ($titles[0]=="Véhicules"){
                echo "vehicule ".$tab[$i][0];
            }
            if ($titles[0]=="Achat"){
                echo "achat ".$tab[$i][0]." ".$tab[$i][3];
            }
            echo "'>Supprimer</button></form></td>";
            ////////////////////////////////////////////////////////////////////////////////////////////////
            
            echo "</tr>";
        }
        echo "<table>";
    }

    function show_data($type){
        connect_db("localhost","root","root","concession_klein_florian");
        if ($type==0){
            db_request("select * from personne");
        }
        if ($type==1){
            db_request("SELECT personne.id,nom,prenom,vehicule.id,immatriculation,modele,date,prix FROM achat,personne,vehicule WHERE achat.id_personne=personne.id and achat.id_vehicule=vehicule.id");
        }
        if ($type==2){
            db_request("select * from vehicule");
        }
    }

    function show($mod){
        show_data($mod);
        global $row_names;
        global $tab_result;
        show_tab_result($row_names[$mod],$tab_result);
    }


    echo "<form action='TD2.php'><input type='submit' value='Menu' /></form>";
    
    switch ($_POST['mod']) {
        case 'Client':
            show(0);
            break;
        case 'Achat':
            show(1);
            break;
        case 'Véhicule':
            show(2);
            break;
        }
?>