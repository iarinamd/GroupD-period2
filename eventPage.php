<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrick</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<?php include_once "header.php" ?>
    <div id="container">
        <div class="left_side">
            <h1>Event Name</h1>
            <h5>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsum Lorem ipsum</h5>
            <div class="images">
                <div>
                    <img class="gps_image" src="img/placeShape.png">
                    <?php echo"Location"; ?>
                </div>
                <div>
                    <img class="time_img" src="img/timeShape.png">
                    <?php echo"Time"; ?>
                </div>
                <div>
                    <img class="person_img" src="img/capacityShape.png">
                    <?php echo"300"; ?>
                </div>
            </div>
            <div class="button">
                <form method="" action="bookingSystem.php">
                    <button class="book_button" value="submit" type="submit">Book</button>
                </form>
            </div>
        </div>
        <div class="right_side">
            <img class="right_image" src="img/festivals/party1.jpg">
        </div>
    </div>
<?php include_once "footer.php" ?>
</body>
</html>
