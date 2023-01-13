<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Linking CSS and meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/browseTalents.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Browse Talents</title>
</head>
<body>
<header>
    <img src="img/e3tLogo.png"
         alt="E3T_logo">
    <nav>
        <ul>
            <li><a href="browseTalents.php">BROWSE TALENTS</a></li>
            <li><a href="browseCategories.php">EVENTS</a></li>
            <?php
            if(isset($_SESSION['login']) AND $_SESSION['login'] == 'loged'){
                echo"<li><a href = 'li-profile.php'>PROFILE</a></li>";
            }
            else{
                echo"<li><a href = 'login2.php'>LOGIN</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>

<div class="mainContainer">
    <!-- Start of talent categories section
         "cat" = "categories"-->
    <main>
        <div class="catContainer">
            <div class="musicCat">
                <h1 class="concerts"><a href="#">Concerts</a></h1>
            </div>
            <div class="partiesCat">
                <h1 class="parties"><a href="#">Parties</a></h1>
            </div>
            <div class="othersCat">
                <h1 class="others"><a href="#">Others</a></h1>
            </div>

        </div>

    </main>
</div>
</body>
</html>