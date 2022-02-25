<?php
    $profil = array();
    if($_GET){
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);

        if($id > 0){
            // Connection PDO
            $dbh = new PDO('mysql:host=mysql-generationterrible.alwaysdata.net;dbname=generationterrible_ndi', '251169_gt', '${{ secrets.SuperSecret }}', array(
                PDO::ATTR_PERSISTENT => true
            ));

            $sql = $dbh->prepare("SELECT * FROM UTILISATEUR WHERE Id_User=".$id);
            $sql->execute();
            
            $profil = $sql->fetch(PDO::FETCH_ASSOC);

            if (!$profil)
                header("Location:..");
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
    <title>Profil</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">Home</a></h1>
        </nav>
    </header>

    <div class="card">
        <div class="content">
            <p><? echo $profil['Email_User']; ?> : <? echo $profil['Pseudo_User']; ?> - <? echo $profil['Nom_Role']; ?></p>
        </div>
    </div>

    <p style="text-align: center">
        <?php if($id > 1){ ?>
            <a href="profil.php?id=<?php echo ($id-1); ?>">Précédent</a>
        <?php } ?>
        <a href="profil.php?id=<?php echo ($id+1); ?>">Suivant</a>
    </p>

    <footer>
        <p>Gaufre.</p>
    </footer>
</body>

<script>
     let home = document.querySelector("header");
    home.addEventListener("click", () => {
        location = ".";
    });
</script>
</html>
