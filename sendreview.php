<?php
session_start();
$username = $_SESSION['visited_talent'];
$new_heading = $_POST['review_heading'];
$new_review = $_POST['review'];
$sql= new mysqli("mysql","root","qwerty","e3t_database"); // Connection to db
$result = mysqli_query($sql,"SELECT * FROM `talents` WHERE `fName` = '$username'"); // Here we select user's raw in db
while($row = mysqli_fetch_array($result)) {
    $user_id = $row['id'];
    $description = $row['descriptions'];
}
$insert = "INSERT INTO `reviews` (`review_id`, `id`, `heading`, `review`)
           VALUES (NULL, '$user_id', '$new_heading', '$new_review');";
$insert_query = mysqli_query($sql,$insert);
$sql->close();

echo '<script type="text/javascript">location.href = "li-profile-visitor.php";</script>';
?>