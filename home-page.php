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
                $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
            }catch (Exception $ex){
                echo $ex;
                echo "Something went wrong with the database connection";
            }//end try-catch

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
                    $mainEventLink = "";

                    //splitting the date into date and time for easier reading
                    $mainEventDate = "Date: " .substr($mainEventDateTime, 0, 10);
                    $mainEventTime = "Time: " .substr($mainEventDateTime, -8);

                    //getting the artist list from the main event
                    $artistQry = $dbHandler -> prepare("SELECT * FROM `talents`");
                    $artistQry -> execute();
                    $artistQry->bindColumn("name", $artistName, PDO::PARAM_STR);

                    $mainEventArtistList = []; //init empty array
                    while($result = $artistQry->fetch(PDO::FETCH_ASSOC)){
                        $mainEventArtistList[] = $artistName; //add artist names to array
                    }//end while
                    $mainEventArtistList = implode(", ", $mainEventArtistList); //display the artist names

                    $artists = $artistQry -> fetch(PDO::FETCH_ASSOC);

                    //data for events in the aside
                    $recentQry = $dbHandler -> prepare("SELECT * FROM `events` ORDER BY `start_time` ASC LIMIT 3");
                    $recentQry -> execute();

                    $recentEvents = $recentQry->fetchAll(PDO::FETCH_ASSOC);

                    $event1 = $recentEvents[0]["name"];
                    $event1Date = $recentEvents[0]["start_time"];
                    $event1PageLink = "";

                    $event2 = $recentEvents[1]["name"];
                    $event2Date = $recentEvents[1]["start_time"];
                    $event2PageLink = "";

                    $event3 = $recentEvents[2]["name"];
                    $event3Date = $recentEvents[2]["start_time"];
                    $event3PageLink = "";

                }catch(Exception $ex){
                    echo $ex;
                    echo "Something went wrong loading events";
                }//end try-catch

            }//end if

        ?>

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

                <div class="event">
                    <div class="asideText">
                        <p><?php echo $event1Date; ?>Date</p>
                        <h3><?php echo $event1; ?>Event</h3>
                    </div>
                    <a href="<?php echo $event1PageLink;?>" class="asideLink">More Info</a>
                </div>

                <div class="event">
                    <div class="asideText">
                        <p><?php echo $event2Date; ?>Date</p>
                        <h3><?php echo $event2; ?>Event</h3>
                    </div>
                    <a href="<?php echo $event2PageLink;?>" class="asideLink">More Info</a>
                </div>

                <div class="event">
                    <div class="asideText">
                        <p><?php echo $event3Date; ?>Date</p>
                        <h3><?php echo $event3; ?>Event</h3>
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
