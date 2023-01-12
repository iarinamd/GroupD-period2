<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "css/styleEv1.css" type = "text/css" rel = "stylesheet">
    <title>Event</title>
</head>
<body>
    <?php
        try{
            $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
        }
        catch(Exception $ex){
            echo $ex;
        }
        if(isset($_GET['id'])){
            $ev_id = $_GET['id'];
        }
        else{
            echo"<h1>Something went wrong, please go back</h1>";
            exit();
        }
        try{
            $stmt = $dbHandler -> prepare("SELECT * FROM events WHERE id=:id");
            $stmt -> bindParam(":id", $ev_id, PDO::PARAM_INT);
            $stmt -> execute();

            $event = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $ex){
            echo $ex;
        }
    ?>
    <div id = "gridContainer">
        <header>
            <img src="img/e3tLogo.png" alt="E3T_logo">
            <nav>
                <ul>
                    <li><a href="#">BROWSE TALENTS</a></li>
                    <li><a href="#">EVENTS</a></li>
                    <?php
                        if(isset($_SESSION['login']) AND $_SESSION['login'] == 'loged'){
                            echo"<li><a href = '#'>PROFILE</a></li>";
                        }
                        else{
                            echo"<li><a href = '#'>LOGIN</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>
        <div id = "mainBody">
            <div id = "eventInf">
                <?php
                echo"<h1>".$event['name']."</h1>";
                echo"<p>".$event['descriptions']."</p>";
                ?>
                <div id="shapes">
                    <div class="shapesTextBox">
                        <img src="img/placeShape.png" alt="Place icon" class="shapes">
                        <?php echo"<p class='anchor'>".$event['location']."</p>"?>
                    </div>
                    <div class="shapesTextBox">
                        <img src="img/timeShape.png" alt="Time icon" class="shapes">
                        <?php echo"<p class='anchor'>".$event['start_time']."</p>"?>
                    </div>
                    <div class="shapesTextBox">
                        <img src="img/capacityShape.png" alt="Capacity icon" class="shapes">
                        <?php echo"<p class='anchor'>".$event['capacity']."</p>"?>
                    </div>
                </div>
                <button onclick="location.href='#'" id="button">BOOK</button>
            </div>
            <img src=<?php echo $event["photos"]?> alt="PlaceHolder" id = "eventPicture">
        </div>
        <footer>
            <div>
                <h2>CONTACT</h2>
                <p>+31 123456789</p>
                <p>+31 987654321</p>
            </div>
            <div>
                <p>contact@e3t.com</p>
                <p>111AA, Emmen</p>
            </div>
            <div>
                <h2>OPENING HOURS</h2>
                <p>Monday-Saturday: 9:30-18:00</p>
                <p>Sunday: Closed</p>
            </div>
            <div>
                <a href="https://nl-nl.facebook.com/"><img src="img/facebookLogo.png" alt="Facebook logo" class="footerLogos"></a>
                <a href="https://www.instagram.com/"><img src="img/instagramLogo.png" alt="Instagram logo" class="footerLogos"></a>
                <a href="https://www.tiktok.com/login"><img src="img/tiktokLogo.png" alt="tiktok logo" class="footerLogos"></a>
            </div>
        </footer>
    </div>
</body>
</html>