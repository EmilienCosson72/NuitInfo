<?php
    $bateau = array();
    if($_GET){
        $id = htmlspecialchars($_GET['id'], ENT_QUOTES);

        if($id > 0){
            // Connection PDO
            $dbh = new PDO('mysql:host=mysql-generationterrible.alwaysdata.net;dbname=generationterrible_ndi', '251169_gt', 'NuitDeLInfo', array(
                PDO::ATTR_PERSISTENT => true
            ));

            $sql = $dbh->prepare("SELECT * FROM BATEAU_SAUVETEUR WHERE ID_Bateau=".$id);
            $sql->execute();
            
            $bateau = $sql->fetch(PDO::FETCH_ASSOC);

            if (!$bateau)
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
    <title>Bâteau</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">Home</a></h1>
        </nav>
    </header>
    <div class="card">
        <div class="image">
            <img src="<? echo $bateau['URL_Bateau']; ?>">
        </div>
        <div class="content">
            <h1><? echo $bateau['Nom_Bateau']; ?></h1>
            <p><? echo $bateau['Desc_Bateau']; ?></p>
        </div>
        <hr>
        <div class="badge">
            <p>Dimension : <span class="badge-span"><? echo $bateau['Dimension_Bateau']; ?></span></p>
        </div>
    </div>

    <p style="text-align: center">
        <?php if($id > 1){ ?>
            <a href="bateau.php?id=<?php echo ($id-1); ?>">Précédent</a>
        <?php } ?>
        <a href="bateau.php?id=<?php echo ($id+1); ?>">Suivant</a>
    </p>

    <footer>
        <p>Chips.</p>
    </footer>
</body>

<script>
     let home = document.querySelector("header");
    home.addEventListener("click", () => {
        location = ".";
    });
</script>
</html>