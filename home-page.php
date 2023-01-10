<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/home-page-style.css">
    </head>

    <body>

        <?php

            //create connection with database
            try{
                $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
            }catch (Exception $ex){
                echo $ex;
                echo "Something went wrong with the database connection";
            }//end try-catch

            //if database connection established, continue
            if($dbHandler){

                try{
                    //data for HOT EVENT
                    $mainEventQry = $dbHandler -> prepare("SELECT * FROM `events` WHERE `hot` = 1 ORDER BY `start_time` ASC LIMIT 1");
                    $mainEventQry -> execute();

                    $mainEventInfo = $mainEventQry->fetchAll(PDO::FETCH_ASSOC);
                    $mainEvent = $mainEventInfo[0]["name"];
                    $mainEventDateTime = $mainEventInfo[0]["start_time"];
                    $mainEventLocation = $mainEventInfo[0]["location"];
                    $mainEventImage = $mainEventInfo[0]["photos"];
                    $mainEventLink = "indexEv1.php?id=" .$mainEventInfo[0]["id"];

                    //splitting the date into date and time for easier reading
                    $mainEventDate = "Date: " .substr($mainEventDateTime, 0, 10);
                    $mainEventTime = "Time: " .substr($mainEventDateTime, -8);

                    //getting the artist list from the main event
                    $artistQry = $dbHandler -> prepare("SELECT * FROM `talents` LIMIT 3");
                    $artistQry -> execute();
                    $artistQry->bindColumn("name", $artistName, PDO::PARAM_STR);

                    $mainEventArtistList = []; //init empty array
                    while($result = $artistQry->fetch(PDO::FETCH_ASSOC)){
                        $mainEventArtistList[] = $artistName; //add artist names to array
                    }//end while
                    $mainEventArtistList = implode(", ", $mainEventArtistList); //display the artist names

                    //data for events in the aside
                    $recentQry = $dbHandler -> prepare("SELECT * FROM `events` WHERE `hot` != 1 ORDER BY `start_time` ASC LIMIT 3");
                    $recentQry -> execute();
                    $recentQry -> bindColumn("name", $eventName);
                    $recentQry -> bindColumn("start_time", $eventDate);
                    $recentQry -> bindColumn("id", $eventID);

                }catch(Exception $ex){
                    echo $ex;
                    echo "Something went wrong loading events";
                }//end try-catch

            }//end if

        ?>

        <header>
            <img src="img/e3tLogo.png" alt="E3T_logo">
            <nav>
                <ul>
                    <li><a href="#">BROWSE TALENTS</a></li>
                    <li><a href="#">EVENTS</a></li>
                    <li><a href="#">LOGIN</a></li>
                </ul>
            </nav>
        </header>

        <div id="container">
            <main>

                <div id="mainTitle">
                    <h3>HOT EVENT</h3>
                    <h1><?php echo $mainEvent;?></h1>
                </div>

                <div id="mainSubtitle">
                    <h4><b><?php echo $mainEventDate;?></b></h4>
                    <h4><b><?php echo $mainEventTime;?></b></h4>
                    <p><?php echo $mainEventLocation;?></p>
                </div>

                <div id="featuredArtists">
                    <h2>Featured Artists</h2>
                    <h3><?php echo $mainEventArtistList;?></h3>
                </div>

                <a href="<?php echo $mainEventLink;?>" id="mainLink"><h3>FIND OUT MORE</h3></a>

            </main>

            <aside>
                <h3>UPCOMING EVENTS</h3>

                <?php
                    //dynamic generation of aside events
                    while($recentEvents = $recentQry->fetch(PDO::FETCH_ASSOC)){

                        $eventDate = substr($eventDate, 0, 10);
                        $eventPageLink = "indexEv1.php?id=" .$eventID;

                        echo "
                        <div class='event'>
                            <div class='asideText'>
                                <p>" .$eventDate. "</p>
                                <h3>" .$eventName. "</h3>
                            </div>
                            <a href=' .$eventPageLink. ' class='asideLink'>More Info</a>
                        </div>
                        ";
                    }//end while
                ?>

                <p></p>
            </aside>
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
                <img src="img/facebookLogo.png" alt="Facebook logo" class="footerLogos">
                <img src="img/instagramLogo.png" alt="Instagram logo" class="footerLogos">
                <img src="img/tiktokLogo.png" alt="tiktok logo" class="footerLogos">
            </div>
        </footer>

    </body>
</html>
