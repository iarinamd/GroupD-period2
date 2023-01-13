<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql= new mysqli("mysql","root","qwerty","project_2"); // Connection to db
    $result = mysqli_query($sql,"SELECT * FROM `talents` WHERE `email` = '$username'"); // Here we select user's raw in db
    while($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $user_id = $row['id'];
        $description = $row['descriptions'];
        $avatar = $row['avatar'];
        $photo1 = $row['photo1'];
        $photo2 = $row['photo2'];
        $photo3 = $row['photo3'];
    }
    $eventquery = mysqli_query($sql,"SELECT * FROM `events` WHERE `id` = '$user_id' ORDER BY `start_time` ASC LIMIT 3"); // Here we select all user's events
    $i = -1;
    while($roww = mysqli_fetch_array($eventquery))
    {
        $i++;

        $event_name[$i]['event_name']=$roww['name'];
        $event_date[$i]['event_date']=$roww['start_time'];

    }
    //Here we claim comments left on this profile (last 2)
    $reviewquery = mysqli_query($sql,"SELECT * FROM `reviews` WHERE `id` = '$user_id' ORDER BY `review_id` DESC LIMIT 3");
    $b = -1;
    while($rowww = mysqli_fetch_array($reviewquery))
    {
        $b++;

        $review_heading[$b]['review_heading']=$rowww['heading'];
        $review[$b]['review']=$rowww['review'];

    }

}
else{
    echo '<script type="text/javascript">location.href = "login.php";</script>'; // If user is not logged in
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="css/li-profile-inactive.css">
    <link rel="stylesheet" type="text/css" href="css/header1.css">
    <link rel="stylesheet" type="text/css" href="css/footer1.css">
</head>
<body>
<?php include_once "header.php" ?>
<div id="maincontainer">

  <h1 class="inactive">Profile is currently inactive</h1>
<div id="darken">
    <div id="top">
      <div class="top1">
        <h1><?php echo $name."'s"; ?> Profile</h1>
      </div>

      <div class="top2">
        <button><a>Edit Profile</a></button>
      </div>

    </div>

    <div id="about">
      <div class="about1">
        <img src="<?php echo $avatar;?>">
      </div>

      <div class="about2">
        <div class="about2_1">
          <h2>About <?php echo $name;?></h2>
        </div>

        <div class="about2_2">
          <p><?php echo $description;?></p>
        </div>

      </div>

    </div>

    <div id="pictures">
      <img src="<?php echo $photo1;?>">
      <img src="<?php echo $photo2;?>">
      <img src="<?php echo $photo3;?>">
    </div>

    <div id="upperfooter">

      <div id="events">
        <div class="eventsh1">
          <h1>UPCOMING EVENTS</h1>
        </div>

          <?php
          for($c=0;$c<=$i;$c++){
              echo"
                    <div class = 'eventbox'>
                        <div class='eventheader'>
                            <p>" . $event_name[$c]['event_name'] ."</p>
                            <h2>" . $event_date[$c]['event_date'] . "</h2>
                        </div>
                        <div class='buttondiv'>
                            <button><a>More Info</a></button>
                        </div>
                    </div>
                        ";

          }
          ?>


      </div>

      <div id="reviews">
        <div class="reviewboxinner">
          <div class="reviewsheader">
            <h1>REVIEWS</h1>
          </div>

            <?php

            for($a=0; $a<=$b;$a++){
                echo"<div class='reviewbox'>
                            <div class='reviewtext'>
                                <h1>".$review_heading[$a]['review_heading']."</h1>
                                <p>".$review[$a]['review']."</p>
                            </div>
                         </div>";
            }

            ?>

          <div class="reviewsheader">
            <h1>LEAVE A REVIEW</h1>
          </div>

          <div class="createreview">

          </div>
        </div>

      </div>

    </div>
  </div>

</div>
<?php include_once "footer.php" ?>



</body>
</html>