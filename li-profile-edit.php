<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql= new mysqli("mysql","root","qwerty","e3t_database"); // Connection to db
    $result = mysqli_query($sql,"SELECT * FROM `talents` WHERE `email` = '$username'"); // Here we select user's raw in db
    while($row = mysqli_fetch_array($result)) {
        $name = $row['fName'];
        $lname = $row['lName'];
        $user_id = $row['id'];
        $description = $row['descriptions'];
        $avatar = $row['avatar'];
        $photo1 = $row['photo1'];
        $photo2 = $row['photo2'];
        $photo3 = $row['photo3'];
    }
    $eventquery = mysqli_query($sql,"SELECT * FROM `events` ORDER BY `start_time` ASC LIMIT 3"); // Here we select all user's events
    $i = -1;
    while($roww = mysqli_fetch_array($eventquery))
    {
        $i++;

        $event_name[$i]['event_name']=$roww['name'];
        $event_date[$i]['event_date']=$roww['start_time'];

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
  <link rel="stylesheet" type="text/css" href="css/li-profile-edit.css">
    <link rel="stylesheet" type="text/css" href="css/header1.css">
    <link rel="stylesheet" type="text/css" href="css/footer1.css">
</head>
<body>
<?php include_once "header.php" ?>
<div id="maincontainer">

  <div id="top">
    <div class="top1">
      <h1><?php echo $lname." ".$name."'s"; ?> Profile</h1>
    </div>

    <div class="top2">
        <button type="submit" form="descriptionedit"><a>Save Profile</a></button>
    </div>

  </div>

  <div id="about">
    <div class="about1">
      <img src="<?php echo $avatar;?>">
    </div>

    <div class="about2">
      <div class="abouttext">
        <div class="about2_1">
          <h2>About <?php echo $name; ?></h2>
        </div>

        <div class="about2_2">

                <form id="descriptionedit" action="saveprofile.php" method="post" class="form" >
                    <textarea name="edited_description" cols="30" rows="10" class="textarea"
                    placeholder="Please write something about you"><?php echo $description;?></textarea>
                </form>

        </div>
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
        for($b=0;$b<=$i;$b++){
            echo"
                    <div class = 'eventbox'>
                        <div class='eventheader'>
                            <p>" . $event_name[$b]['event_name'] ."</p>
                            <h2>" . $event_date[$b]['event_date'] . "</h2>
                        </div>
                        <div class='buttondiv'>
                            <button><a href='index.php'>More Info</a></button>
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

        <div class="reviewbox">
          <div class="reviewtext">
            <h1>Very talented</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
          </div>
        </div>

        <div class="reviewbox">
          <div class="reviewtext">
            <h1>Very talented</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in
              voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </p>
          </div>

        </div>
        <div class="reviewsheader">
          <h1>LEAVE A REVIEW</h1>
        </div>

        <div class="createreview">

        </div>
      </div>

    </div>

  </div>


</div>
<?php include_once "footer.php" ?>

<?php mysqli_close($sql); ?>



</body>
</html>