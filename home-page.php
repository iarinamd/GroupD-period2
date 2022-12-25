<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/home-page-style.css";
    </head>

    <body>

        <header>
            <div id ="headerImage">
                <a href="#">
                    <img class="logoImg" src="image/E3T_LOGO.png" alt="E3T logo">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">BROWSE TALENTS</a></li>
                    <li><a href="#">EVENTS</a></li>
                    <li><a href="#">LOGIN</a></li>
                </ul>
            </nav>
        </header>

        <?php

            try{
                $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty")
            }catch (Exception $ex){
                echo $ex;
            }//end try-catch

            if($dbHandler){

                

            }//end if

        ?>

        <div id="container">
            <main>

                <div id="backgroundImage">

                    <?php
                        echo "<img src='" .$mainEventImage. "' alt='Main Event Image'";
                    ?>

                    <div id="mainTitle">
                        <h3>HOT EVENT</h3>
                        <h1><?php echo $mainEvent;?>Annual Emmen Music Festival 2023</h1>
                    </div>

                    <div id="mainSubtitle">
                        <h4><b>May 20th, 2023</b></h4>
                        <p><?php echo $mainEventLocation;?>Radhuisplein 7811 DC, Emmen</p>
                    </div>

                    <div id="featuredArtists">
                        <h2>Featured Artists</h2>
                        <h3><?php echo $mainEventArtistList;?>Artist1, Artist2, Artist3</h3>
                    </div>

                    <a href="<?php echo $mainEventLink;?>" id="mainLink"><h3>FIND OUT MORE</h3></a>

                </div>

            </main>

            <aside>
                <h3>UPCOMING EVENTS</h3>

                <div class="event">
                    <div class="asideText">
                        <?php echo "<p>$event1Date Date</p>"; ?>
                        <?php echo "<h3>$event1 Event1</h3>"; ?>
                    </div>
                    <a href="<?php echo $event1PageLink;?>" class="asideLink">More Info</a>
                </div>

                <div class="event">
                    <div class="asideText">
                        <?php echo "<p>$event2Date Date</p>"; ?>
                        <?php echo "<h3>$event2 Event2</h3>"; ?>
                    </div>
                    <a href="<?php echo $event2PageLink;?>" class="asideLink">More Info</a>
                </div>

                <div class="event">
                    <div class="asideText">
                        <?php echo "<p>$event3Date Date</p>"; ?>
                        <?php echo "<h3>$event3 Event3</h3>"; ?>
                    </div>
                    <a href="<?php echo $event3PageLink;?>" class="asideLink">More Info</a>
                </div>

                <p></p>
            </aside>
        </div>

        <footer>
            <div class="contactInformations">
                <h3> CONTACT</h3>
                <span>+31 123456789 contact@e3t.com </span>
                <span>+31 987654321 1111AA, Emmen</span>
            </div>
            <div class="openHours">
                <h3>OPENING HOURS</h3>
                <span>Monday - Saturday: 9:30 - 18:00</span>
                <span>Sunday: Closed</span>
            </div>
            <div class="iconImg">
                <a href="https://nl-nl.facebook.com/">
                    <img class="facebookImg" src="image/facebook_logo.png" alt="facebook logo">
                </a>
                <a href="https://www.instagram.com/">
                    <img class="instagramImg" src="image/instagram_logo.png" alt="instagram logo">
                </a>
                <a href="https://www.tiktok.com/login">
                    <img class="tiktokImg" src="image/tiktok_logo.png" alt="tiktok logo">
                </a>
            </div>
        </footer>

    </body>
</html>
