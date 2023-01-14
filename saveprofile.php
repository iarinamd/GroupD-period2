<?php
session_start();
$username = $_SESSION['username'];
$new_description = $_POST['edited_description'];
$sql= new mysqli("localhost","phpmyadmin","!User_12","e3t_database",3306); // Connection to db
$sql -> set_charset("utf8mb4");
$result = mysqli_query($sql,"SELECT * FROM `talents` WHERE `email` = '$username'"); // Here we select user's raw in db
while($row = mysqli_fetch_array($result)) {
    $user_id = $row['id'];
    $description = $row['descriptions'];
}
$insert = "UPDATE `talents` 
           SET descriptions='$new_description'
           WHERE `id` = '$user_id';";
$insert_query = mysqli_query($sql,$insert);
$sql->close();

echo '<script type="text/javascript">location.href = "li-profile.php";</script>';
?>