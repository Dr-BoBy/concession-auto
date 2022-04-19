<?php
    //on inclut la verification de session
    include "check_login.php";
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Concession automobile</title>
        <meta charset="utf-8">
        <!--//AJAX pour les boutons.-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.button').click(function(){
                    var clickBtnValue = $(this).val();
                    var ajaxurl = 'show_data.php',
                    data =  {'action': clickBtnValue};
                    $.post(ajaxurl, data, function (response) {
                        // Response div goes here.
                    });
                });
            });
        </script>
    </head>
    <body>
        <!--bouton pour obtenir les listes des différentes tables (Fait en AJAX)-->
        <form action="show_data.php" method="post">
            <input type="submit" class="button" name="mod" value="Client"/>
            <input type="submit" class="button" name="mod" value="Achat"/>
            <input type="submit" class="button" name="mod" value="Véhicule"/>
        </form>
        <form action='form_add_data.php'>
            <input type='submit' value='Ajouter des données' />
        </form>
        <form action='logout.php'>
            <input type='submit' value='Se déconnecter' />
        </form>
    </body>
</html>
