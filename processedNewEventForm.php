<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/addedEventStyle.css">
            <link rel="stylesheet" href="css/header.css">
            <link rel="stylesheet" href="css/footer.css">
            <title>Event added to Database</title>
        </head>
        <body>
        <header>
            <?php

                include 'header.php';
            ?>
        </header>
            <div id="container">
                <div id="mainContainer">
                    <?php
                    //FILE VALIDATION

                        $fileSize = (7*1024*1024);

                        if ($_FILES["photos"]["error"] == 0) {
                            if (strlen($_FILES["photos"]["name"]) < 50 && preg_match('/[A-Z]/', $_FILES["photos"]["name"])) {
                                if ($_FILES["photos"]["size"] < $fileSize) {
                                    $acceptedTypes = ["image/png", "image/jpeg", "image/jpg"];
                                    $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["photos"]["tmp_name"]);

                                    echo "<h1> Your event has been saved with the following data: </h1>" . "<br>";
                                    if (in_array($uploadedFileType, $acceptedTypes)) {
                                        if (!file_exists("uploadFile/" . $_FILES["photos"]["name"])) {
                                            if(move_uploaded_file($_FILES["photos"]["tmp_name"], "uploadFile/". $_FILES["photos"]["name"])) {
                                                $photos = "uploadFile/". $_FILES["photos"]["name"];

                                                echo "<b> You have uploaded: " . $photos . "</b> <br>";
                                                echo '<img src="'.$photos.'" width="300px" height="auto"> <br>';
                                               // echo "Upload: ". $_FILES["uploadedFile"]["name"] ."<br>";
                                               // echo "Type: ". $_FILES["uploadedFile"]["type"] ."<br>";
                                               // echo "Size: ". ($_FILES["uploadedFile"]["size"] / 1024) ." Kb<br>";
                                               // echo "Stored temporarily in: ". $_FILES["uploadedFile"]["tmp_name"] ."<br>";
                                               // echo "Stored permanently in: " . "upload/". $_FILES["uploadedFile"]["name"];
                                            } else {
                                                echo "Something went wrong while uploading";
                                            }
                                        } else {
                                            echo $_FILES["photos"]["name"] . " already exists";
                                        }
                                    } else {
                                        echo "Invalid file type (" . $_FILES["photos"]["type"] . ")";
                                    }
                                } else {
                                    echo "Invalid file size (" . $_FILES["photos"]["size"] . ")";
                                }
                            } else {
                                echo "Name must contain an uppercase and must not exceed 50 chars";
                            }
                        } else {
                            echo "Error: ". $_FILES["photos"]["error"] ."<br>";
                        }

                        if ($_SERVER["REQUEST_METHOD"]=="POST"){
                            $name = filter_input(INPUT_POST, "name");
                            $date = filter_input(INPUT_POST, "date");
                            $start_time = filter_input(INPUT_POST, "start_time");
                            $capacity = filter_input(INPUT_POST, "capacity");
                            $category = filter_input(INPUT_POST, "category");
                            $location = filter_input(INPUT_POST, "location");
                            $zip = filter_input(INPUT_POST, "zip");
                            $descriptions = filter_input(INPUT_POST, "descriptions");

                            if(empty($name)){
                                echo "Please enter the event name";
                            } elseif (empty($date)){
                                echo "Please enter a date";
                            } elseif (empty($start_time)){
                                echo "Please enter a time";
                            } elseif (empty($capacity)){
                                echo "Please enter a capacity";
                            }elseif (empty($category)){
                                echo "Please select a category";
                            } elseif (empty($location)){
                                echo "Please enter an address";
                            } elseif (empty($zip)){
                                echo "Please enter a ZIP code";
                            } else{
                                echo "Your event has been saved with the following data:" . "<br>";
                                echo "<table>";
                                echo "<th>Event Name:</th> ". "<td>" . $name . "</td>";
                                echo "<tr><th>Date:</th> ". "<td>" . $date . "</td></tr>";
                                echo "<tr><th>Time:</th> ". "<td>" . $start_time . "</td></tr>";
                                echo "<tr><th>Capacity:</th> ". "<td>" . $capacity . "</td></tr>";
                                echo "<tr><th>Category:</th> ". "<td>" . $category . "</td></tr>";
                                echo "<tr><th>Address:</th> ". "<td>" . $location . "</td></tr>";
                                echo "<tr><th>ZIP Code:</th> ". "<td>" . $zip . "</td></tr>";
                                echo "</table><br>";

                            }
                            if ($name && $date && $start_time && $capacity && $category && $location && $zip){

                                try {
                                    $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
                                    $sql= $dbHandler->prepare("INSERT INTO events(`id`,`name`,`date`,`start_time`,`capacity`,`category`,`photos`,`location`,`zip`,`descriptions`,`hot`)
                                    VALUES(NULL,:name,:date,:start_time,:capacity,:category,:photos,:location,:zip,:descriptions,0);");
                                    $sql->bindParam("name",$name,PDO::PARAM_STR);
                                    $sql->bindParam("date",$date,PDO::PARAM_STR);
                                    $sql->bindParam("start_time",$start_time,PDO::PARAM_STR);
                                    $sql->bindParam("capacity",$capacity,PDO::PARAM_INT);
                                    $sql->bindParam("category",$category,PDO::PARAM_STR);
                                    $sql->bindParam("photos",$photos,PDO::PARAM_STR);
                                    $sql->bindParam("location",$location,PDO::PARAM_STR);
                                    $sql->bindParam("zip",$zip,PDO::PARAM_STR);
                                    $sql->bindParam("descriptions",$descriptions,PDO::PARAM_STR);
                                    $sql->bindParam("hot",$hot,PDO::PARAM_BOOL);


                                    $sql->execute();
                                }catch (Exception $ex){
                                    print $ex;
                                }


                                //$dbHandler = NULL;
                               echo "<button><a href='newEvent.php'> Add another event </a></button>";

                            }else{
                                echo "something";
                            }

                        }
                    ?>
                </div>
            </div>
        <footer>
            <?php
                include 'footer.php';
            ?>
        </footer>
        </body>
    </html>
