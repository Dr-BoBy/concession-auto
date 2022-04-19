<?php
    //fonction connexion à la base de donnée
    function connect_db ($host,$login,$password,$base){   
        global $cnx;
        $cnx=mysqli_connect($host,$login,$password);
        if ($cnx){
            if (@mysqli_select_db($cnx,$base)) return $cnx;
            else {
                @mysqli_close($cnx);
                die("Unabled to select database!");
            }
        }
        else die ("Failed to connect");
    }
    //fonction requete avec retour des donnée dans un tableau global
    function db_request($request){
        global $cnx;
        $db_result=mysqli_query($cnx,$request);
        global $tab_result;
        $tab_result=[];
        while ($reg=@mysqli_fetch_array($db_result)){
            array_push($tab_result,$reg);
        }
        mysqli_close($cnx);
    }

    //fonction requete sans retour de donnée
    function db_query($request){
        global $cnx;
        global $db_result;
        $db_result=mysqli_query($cnx,$request);
        mysqli_close($cnx);
    }
?>