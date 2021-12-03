<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Easter Egg</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">Home</a></h1>
        </nav>
    </header>

    <div class="card" style="text-align: center">
        <h1>EASTER EGG !</h1>
        <a href="https://www.mcdonalds.fr/produits/menus"><img src="https://zupimages.net/up/21/48/cjuh.jpg"></a>
    </div>

    <footer>
        <p>Kebab.</p>
    </footer>
</body>

<script>
     let home = document.querySelector("header");
    home.addEventListener("click", () => {
        location = ".";
    });
</script>
</html>