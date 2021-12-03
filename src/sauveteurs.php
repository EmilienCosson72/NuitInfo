<?php
    $Sauv = array();
    if($_GET){
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);

        if($id > 0){
            // Connection PDO
            $dbh = new PDO('mysql:host=mysql-generationterrible.alwaysdata.net;dbname=generationterrible_ndi', '251169_gt', 'NuitDeLInfo', array(
                PDO::ATTR_PERSISTENT => true
            ));

            $sql = $dbh->prepare("SELECT * FROM SAUVETEUR WHERE Id_Sauv=".$id);
            $sql->execute();
            
            $Sauv = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            if (!$Sauv)
                header("Location:..");

            $sqlIncidents = $dbh->prepare("SELECT Id_Incident FROM INTERVENTION WHERE Id_Sauv=".$id);
            $sqlIncidents->execute();
            
            
        } else {
            echo 'pas de bateau';
        }
    } else {
        echo 'pas de bateau';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Sauveteurs</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">Home</a></h1>
        </nav>
    </header>

    <div class="card">
        <div class="content">
            <p> <? echo $Sauv['Prenom_Sauv']; ?> <? echo $Sauv['Nom_Sauv']; ?>, de sexe <?php if($Sauv['Sexe_Sauv'] == 'H') { echo 'Homme'; } else { echo 'Femme'; }?> résidant à <? echo $Sauv['Ville_Sauv']; ?> né le <?php echo $Sauv['Date_Naissance_Sauv']; ?> est un(e) sauveteur en mer.</p>
        </div>
        <hr>
        <div class="badge">
        <?php

        $rows = $sqlIncidents->fetchAll(PDO::FETCH_ASSOC);
        echo "Ce sauveteur est intervenu dans les secours suivants : ";
        foreach($rows as $row){
            $sql = $dbh->prepare("SELECT Date_Incident, Localisation_Incident FROM INCIDENT WHERE Id_Incident=".$row["Id_Incident"]);
            $sql->execute();
            
            $res = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            echo " <a href='http://generationterrible.alwaysdata.net/incident.php?id=" . $row["Id_Incident"] . "'>" . $res["Date_Incident"] . " " . $res["Localisation_Incident"] . "</a> ";
        }
        $sqlIncidents->closeCursor();
        ?>
        </div>
    </div>

    <p style="text-align: center">
        <?php if($id > 1){ ?>
            <a href="sauveteurs.php?id=<?php echo ($id-1); ?>">Précédent</a>
        <?php } ?>
        <a href="sauveteurs.php?id=<?php echo ($id+1); ?>">Suivant</a>
    </p>

   

    <footer>
        <p>Velouté.</p>
    </footer>
</body>

<script>
     let home = document.querySelector("header");
    home.addEventListener("click", () => {
        location = ".";
    });
</script>
</html>