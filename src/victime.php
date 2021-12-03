<?php
    $vict = array();
    if($_GET){
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);

        if($id > 0){
            // Connection PDO
            $dbh = new PDO('mysql:host=mysql-generationterrible.alwaysdata.net;dbname=generationterrible_ndi', '251169_gt', 'NuitDeLInfo', array(
                PDO::ATTR_PERSISTENT => true
            ));

            $sql = $dbh->prepare("SELECT * FROM VICTIME WHERE Id_User=".$id);
            $sql->execute();
            
            $vict = $sql->fetch(PDO::FETCH_ASSOC);
            
            if (!$vict)
                header("Location:..");

            $sqlIncident = $dbh->prepare("SELECT Id_Incident FROM DEGAT WHERE Id_Vict=".$id);
            $sqlIncident->execute();
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
    <title>Victime</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">Home</a></h1>
        </nav>
    </header>

    <div class="card">
        <div class="content">
            <p> <? echo $vict['Prenom_Vict']; ?> <? echo $vict['Nom_Vict']; ?>, de sexe <?php if($vict['Sexe_Vict'] == 'H') { echo 'Homme'; } else { echo 'Femme'; }?> résidant à <? echo $vict['Ville_Vict']; ?> né le <?php echo $vict['Date_Naissance_Vict']; ?> est une des victimes des naufrages en mer.</p>
        </div>
        <hr>
        <div class="badge">
<?php
        $rows = $sqlIncident->fetchAll(PDO::FETCH_ASSOC);
            echo "</p><p>Cette victime est concernée par les naufrages suivants : ";
            foreach($rows as $row){
                $sql = $dbh->prepare("SELECT Date_Incident, Localisation_Incident FROM INCIDENT WHERE Id_Incident=".$row["Id_Incident"]);
                $sql->execute();
                
                $res = $sql->fetch(PDO::FETCH_ASSOC);
                $sql->closeCursor();

                echo " <a href='http://generationterrible.alwaysdata.net/incident.php?id=" . $row["Id_Incident"] . "'>" . $res["Date_Incident"] . " " . $res["Localisation_Incident"] . "</a> ";
            }
            $sqlIncident->closeCursor();
?>
        </div>
    </div>

    <p style="text-align: center">
        <?php if($id > 1){ ?>
            <a href="victime.php?id=<?php echo ($id-1); ?>">Précédent</a>
        <?php } ?>
        <a href="victime.php?id=<?php echo ($id+1); ?>">Suivant</a>
    </p>

    <footer>
        <p>Crèpe.</p>
    </footer>
</body>

<script>
     let home = document.querySelector("header");
    home.addEventListener("click", () => {
        location = ".";
    });
</script>
</html>