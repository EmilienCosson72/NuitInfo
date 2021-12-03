<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">Home</a></h1>
        </nav>
    </header>

    <div class="card home">
        <div class="content">
            <div class="bateau">
                <img src="https://media.iletaitunehistoire.com//images/biblidpoe_007i01.png" alt="">
                <p>Bâteaux</p>
            </div>
            <div class="victime">
                <img src="https://media.istockphoto.com/vectors/hand-holding-placard-with-help-text-vector-person-asking-vector-id613244854?b=1&k=20&m=613244854&s=170667a&w=0&h=gx5winRL8yJZn93kepsJtdxYw-hgwoNGcO-eu17HE8o=" alt="">
                <p>Victimes</p>
            </div>
            <div class="sauveteurs">
                <img src="https://ig.lvdn.rosselcdn.net//i/0/0.02555/1x0.9489/d-20150428-38YYX8.jpg?auth=a88fe" alt="">
                <p>Sauveteurs</p>
            </div>
            <div class="incident">
                <img src="https://lemarin.ouest-france.fr/sites/default/files/styles/full/public/2019/07/04/capture_ecran_cnn.jpg?itok=vvuB08Qd" alt="">
                <p>Incidents</p>
            </div>
            <div class="profil">
                <img src="https://cdn.pixabay.com/photo/2017/06/13/12/54/profile-2398783_1280.png" alt="">
                <p>Profils</p>
            </div>
        </div>
    </div>

    <footer>
        <p>Soupe.</p>
    </footer>
</body>
<script>
    let bateau = document.querySelector(".bateau");
    bateau.addEventListener("click", () => {
        location = "bateau.php?id=1";
    });
    
    let profil = document.querySelector(".profil");
    profil.addEventListener("click", () => {
        location = "profil.php?id=1";
    });

    let victime = document.querySelector(".victime");
    victime.addEventListener("click", () => {
        location = "victime.php?id=1";
    });

    let sauveteurs = document.querySelector(".sauveteurs");
    sauveteurs.addEventListener("click", () => {
        location = "sauveteurs.php?id=1";
    });

    let incident = document.querySelector(".incident");
    incident.addEventListener("click", () => {
        location = "incident.php?id=1";
    });

    let home = document.querySelector("header nav");
    home.addEventListener("click", () => {
        location = ".";
    });

</script>
</html>