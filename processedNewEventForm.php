<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/addedEventStyle.css">
            <title>Event added to Database</title>
        </head>
        <body>
            <div id="container">
                <div id="header">
                    <!-- PASTE IARINA'S HEADER HERE!-->
                    <h1>Header Placeholder</h1>
                </div>
                <div id="mainContainer">
                    <?php
                    //FILE VALIDATION

                        $fileSize = (7*1024*1024);

                        if ($_FILES["uploadedFile"]["error"] == 0) {
                            if (strlen($_FILES["uploadedFile"]["name"]) < 50 && preg_match('/[A-Z]/', $_FILES["uploadedFile"]["name"])) {
                                if ($_FILES["uploadedFile"]["size"] < $fileSize) {
                                    $acceptedTypes = ["image/png", "image/jpeg", "image/jpg"];
                                    $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["uploadedFile"]["tmp_name"]);

                                    echo "<h1> Your event has been saved with the following data: </h1>" . "<br>";
                                    if (in_array($uploadedFileType, $acceptedTypes)) {
                                        if (!file_exists("uploadFile/" . $_FILES["uploadedFile"]["name"])) {
                                            if(move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], "uploadFile/". $_FILES["uploadedFile"]["name"])) {
                                                $uploadedFile = "uploadFile/". $_FILES["uploadedFile"]["name"];

                                                echo "<b> You have uploaded: " . $uploadedFile . "</b> <br>";
                                                echo '<img src="'.$uploadedFile.'" width="300px" height="auto"> <br>';
                                               // echo "Upload: ". $_FILES["uploadedFile"]["name"] ."<br>";
                                               // echo "Type: ". $_FILES["uploadedFile"]["type"] ."<br>";
                                               // echo "Size: ". ($_FILES["uploadedFile"]["size"] / 1024) ." Kb<br>";
                                               // echo "Stored temporarily in: ". $_FILES["uploadedFile"]["tmp_name"] ."<br>";
                                               // echo "Stored permanently in: " . "upload/". $_FILES["uploadedFile"]["name"];
                                            } else {
                                                echo "Something went wrong while uploading";
                                            }
                                        } else {
                                            echo $_FILES["uploadedFile"]["name"] . " already exists";
                                        }
                                    } else {
                                        echo "Invalid file type (" . $_FILES["uploadedFile"]["type"] . ")";
                                    }
                                } else {
                                    echo "Invalid file size (" . $_FILES["uploadedFile"]["size"] . ")";
                                }
                            } else {
                                echo "Name must contain an uppercase and must not exceed 50 chars";
                            }
                        } else {
                            echo "Error: ". $_FILES["uploadedFile"]["error"] ."<br>";
                        }

                        if ($_SERVER["REQUEST_METHOD"]=="POST"){
                            $eventName = filter_input(INPUT_POST, "eventName");
                            $date = filter_input(INPUT_POST, "date");
                            $time = filter_input(INPUT_POST, "time");
                            $capacity = filter_input(INPUT_POST, "capacity");
                            $category = filter_input(INPUT_POST, "category");
                            $address = filter_input(INPUT_POST, "address");
                            $zip = filter_input(INPUT_POST, "zip");
                            $description = filter_input(INPUT_POST, "description");

                            if(empty($eventName)){
                                echo "Please enter the event name";
                            } elseif (empty($date)){
                                echo "Please enter a date";
                            } elseif (empty($time)){
                                echo "Please enter a time";
                            } elseif (empty($capacity)){
                                echo "Please enter a capacity";
                            }elseif (empty($category)){
                                echo "Please select a category";
                            } elseif (empty($address)){
                                echo "Please enter an address";
                            } elseif (empty($zip)){
                                echo "Please enter a ZIP code";
                            } else{
                                echo "Your event has been saved with the following data:" . "<br>";
                                echo "<table>";
                                echo "<th>Event Name:</th> ". "<td>" . $eventName . "</td>";
                                echo "<tr><th>Date:</th> ". "<td>" . $date . "</td></tr>";
                                echo "<tr><th>Time:</th> ". "<td>" . $time . "</td></tr>";
                                echo "<tr><th>Capacity:</th> ". "<td>" . $capacity . "</td></tr>";
                                echo "<tr><th>Category:</th> ". "<td>" . $category . "</td></tr>";
                                echo "<tr><th>Address:</th> ". "<td>" . $address . "</td></tr>";
                                echo "<tr><th>ZIP Code:</th> ". "<td>" . $zip . "</td></tr>";
                                echo "</table><br>";

                            }
                            if ($eventName && $date && $time && $capacity && $category && $address && $zip){

                                try {
                                    $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
                                    $sql= $dbHandler->prepare("INSERT INTO events(`id`,`eventName`,`date`,`time`,`capacity`,`category`,`address`,`zip`,`description`,`uploadedFile`)
                                    VALUES(NULL,:eventName,:date,:time,:capacity,:category,:address,:zip,:description,:uploadedFile);");
                                    $sql->bindParam("eventName",$eventName,PDO::PARAM_STR);
                                    $sql->bindParam("date",$date,PDO::PARAM_STR);
                                    $sql->bindParam("time",$time,PDO::PARAM_STR);
                                    $sql->bindParam("capacity",$capacity,PDO::PARAM_INT);
                                    $sql->bindParam("category",$category,PDO::PARAM_STR);
                                    $sql->bindParam("address",$address,PDO::PARAM_STR);
                                    $sql->bindParam("zip",$zip,PDO::PARAM_STR);
                                    $sql->bindParam("description",$description,PDO::PARAM_STR);
                                    $sql->bindParam("uploadedFile",$uploadedFile,PDO::PARAM_STR);

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
        </body>
    </html>
