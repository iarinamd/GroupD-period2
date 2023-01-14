<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "css/styleEv1.css" type = "text/css" rel = "stylesheet">
    <link href = "css/header.css" type = "text/css" rel = "stylesheet">
    <link href = "css/footer.css" type = "text/css" rel = "stylesheet">
    <title>Event</title>
</head>
<body>
    <?php
    //connection to the database
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
            //failstop
            echo"<h1>Something went wrong, please go back</h1>";
            exit();
        }
        try{
            $stmt = $dbHandler -> prepare("SELECT * FROM events WHERE id=:id");
            $stmt -> bindParam(":id", $ev_id, PDO::PARAM_INT);
            $stmt -> execute();
            //fetching necesary information
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $ex){
            echo $ex;
        }
    ?>
    <?php include("header.php")?>
    <div id = "gridContainer">
        <!--inclusion of header-->
        <div id = "mainBody">
            <div id = "eventInf">
                <?php
                echo"<h1>".$event['name']."</h1>";
                echo"<p>".$event['descriptions']."</p>";
                //all of the information gained in fetch is displayd bellow
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
                <button onclick="location.href='bookingSystem.php'" id="button">BOOK</button>
            </div>
            <img src=<?php echo $event["photos"]?> alt="PlaceHolder" id = "eventPicture">
        </div>
        <!--inclusion of footer-->
        <?php include("footer.php");?>
    </div>
</body>
</html>