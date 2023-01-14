<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Linking CSS and meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/browseCategories.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Browse Categories</title>
</head>
<body>
<header>
    <?php
        include 'header.php';
    ?>
</header>


<div class="mainContainer">

    <!-- Start of talent categories section
         "cat" = "categories"-->
    <main>
        <div class="catContainer">
            <div class="musicCat">
                <!-- will add links later-->
                <h1 class="concerts"><a href="eventPage.php">Concerts</a></h1>
            </div>
            <div class="partiesCat">
                <h1 class="parties"><a href="eventPage.php">Parties</a></h1>
            </div>
            <div class="othersCat">
                <h1 class="others"><a href="eventPage.php">Others</a></h1>
            </div>

        </div>

    </main>
    <?php
        include 'footer.php';
    ?>
</div>
</body>
</html>
