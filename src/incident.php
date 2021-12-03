<?php
    $incident = array();
    if($_GET){
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);

        if($id > 0){
            // Connection PDO
            $dbh = new PDO('mysql:host=mysql-generationterrible.alwaysdata.net;dbname=generationterrible_ndi', '251169_gt', 'NuitDeLInfo', array(
                PDO::ATTR_PERSISTENT => true
            ));

            $sql = $dbh->prepare("SELECT * FROM INCIDENT WHERE id_incident=".$id);
            $sql->execute();
            
            $incident = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();

            if (!$incident)
                header("Location:..");

            //get bateau
            $sql = $dbh->prepare("SELECT Id_Bateau FROM NAVIGUATION WHERE Id_incident=".$id);
            $sql->execute();
            
            $res = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            $idBateau = $res["Id_Bateau"];

            $sql = $dbh->prepare("SELECT Nom_Bateau FROM BATEAU_SECOURU WHERE Id_Bateau=".$idBateau);
            $sql->execute();
            
            $res = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            $nomBateau = $res["Nom_Bateau"];

            //get victimes
            $sqlVictime = $dbh->prepare("SELECT Id_Vict FROM DEGAT WHERE Id_incident=".$id);
            $sqlVictime->execute();
            
           //get sauveteurs
            $sqlSauveteurs = $dbh->prepare("SELECT Id_Sauv FROM INTERVENTION WHERE Id_Incident=".$id);
            $sqlSauveteurs->execute();
            
            //get pseudonyme
            $sql = $dbh->prepare("SELECT Pseudo_User FROM UTILISATEUR WHERE Id_User=".$incident["Id_User"]);
            $sql->execute();
            
            $res = $sql->fetch(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            $pseudonyme = $res["Pseudo_User"];
            
        } else {
            echo 'pas de incident';
        }
    } else {
        echo 'pas de incident';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Incident</title>
</head>
<body>
    <header>
        <nav>
            <h1>
                <a href="index.php">Home</a>
            </h1>
        </nav>
    </header>
    <div class="card">
        <div class="content">
            <h1>Naufrage du bateau <?=$nomBateau?></h1>
        </div>
        <hr>
        <div class="badge">
            <p>Date incident : <span class="badge-span"><?= $incident["Date_Incident"]?></span>
             Lieu : <span class="badge-span"><?=$incident["Localisation_Incident"]?></span> 
             Utilisateur : <span class="badge-span"><?=$pseudonyme?></span></p>
             <p>
<?php
            $rows = $sqlVictime->fetchAll(PDO::FETCH_ASSOC);
            echo "Les victimes sont : ";
            foreach($rows as $row){
                $sql = $dbh->prepare("SELECT Nom_Vict, Prenom_Vict FROM VICTIME WHERE Id_Vict=".$row["Id_Vict"]);
                $sql->execute();
                
                $res = $sql->fetch(PDO::FETCH_ASSOC);
                $sql->closeCursor();

                echo " <a href='http://generationterrible.alwaysdata.net/victime.php?id=" . $row["Id_Vict"] . "'>" . $res["Prenom_Vict"] . " " . $res["Nom_Vict"] . "</a> ";
            }
            $sqlVictime->closeCursor();

            $rows = $sqlSauveteurs->fetchAll(PDO::FETCH_ASSOC);
            echo "</p><p>Les sauveteurs sont : ";
            foreach($rows as $row){
                $sql = $dbh->prepare("SELECT Nom_Sauv, Prenom_Sauv FROM SAUVETEUR WHERE Id_Sauv=".$row["Id_Sauv"]);
                $sql->execute();
                
                $res = $sql->fetch(PDO::FETCH_ASSOC);
                $sql->closeCursor();

                echo " <a href='http://generationterrible.alwaysdata.net/sauveteurs.php?id=" . $row["Id_Sauv"] . "'>" . $res["Prenom_Sauv"] . " " . $res["Nom_Sauv"] . "</a> ";
            }
            $sqlVictime->closeCursor();
?>
        </p>
        </div>
    </div>

    <p style="text-align: center">
        <?php if($id > 1){ ?>
            <a href="incident.php?id=<?= $id-1 ?>">Précédent</a>
        <?php } ?>
        <a href="incident.php?id=<?= $id+1 ?>">Suivant</a>
    </p>
    
    <footer>
        <p>Frites<a href="easteregg.php" style="color: #d34343; text-decoration: none;">.</a></p>
    </footer>
</body>

<script>
     let home = document.querySelector("header");
    home.addEventListener("click", () => {
        location = ".";
    });
</script>
</html>