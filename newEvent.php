<?php
    ob_start();
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
try {
    $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");

}catch (Exception $ex){
    print $ex;
}
try {
    $sql = $dbHandler->prepare("SELECT * FROM events WHERE id=:id");
}catch (Exception $ex){
    print $ex;
}
try {
    $sql->bindParam("id",$id,PDO::PARAM_INT);
    $sql->execute();
}catch (Exception $ex){
    print $ex;
}

    $sql->bindColumn("eventName",$eventName);
    $sql->bindColumn("date",$date);
    $sql->bindColumn("time",$time);
    $sql->bindColumn("capacity",$capacity);
    $sql->bindColumn("category",$category);
    $sql->bindColumn("address",$address);
    $sql->bindColumn("zip",$zip);
    $sql->bindColumn("description",$description);
    $sql->bindColumn("uploadedFile",$uploadedFile);

    $result = $sql->fetch();
    $dbHandler=NULL;

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
            echo "Event Name: ". $eventName ."<br>";
            echo "Date: ". $date ."<br>";
            echo "Time: ". $time ."<br>";
            echo "Capacity: ". $capacity ."<br>";
            echo "Category: ". $category ."<br>";
            echo "Address: ". $address ."<br>";
            echo "ZIP Code: ". $zip ."<br>";
        }
        if (!$eventName && !$date && !$time && !$capacity && !$category && !$address && !$zip){
        $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");

            $sql= $dbHandler->prepare("INSERT INTO events(`id`,`eventName`,`date`,`time`,`capacity`,
                                                    `category`,`address`,`zip`,`description`,`uploadedFile`)
                                                    VALUES(NULL,':eventName',':date',':time',':capacity',':category',
                                                         ':address',':zip',':description',':uploadedFile');");
            $sql->bindParam("id",$id,PDO::PARAM_INT);
            $sql->bindParam("eventName",$eventName,PDO::PARAM_STR);
            $sql->bindParam("date",$date,PDO::PARAM_STR);
            $sql->bindParam("time",$time,PDO::PARAM_STR);
            $sql->bindParam("capacity",$capacity,PDO::PARAM_INT);
            $sql->bindParam("category",$category,PDO::PARAM_STR);
            $sql->bindParam("address",$address,PDO::PARAM_STR);
            $sql->bindParam("zip",$zip,PDO::PARAM_STR);

            $sql->execute();
            $result=$sql->execute();
            var_dump($result);
            //$dbHandler = NULL;
            header("Location:newEvent.php");

        }else{
            echo "something";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/newEventStyle.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <title>Create a new Event!</title>
    </head>
    <body>
    <header>
        <?php
            include 'header.php';

        ?>
    </header>
        <div id="container">
            <div id="mainContainer">
                <h1>Create a new event</h1>
                <div id="form">
                    <form action="processedNewEventForm.php" method="POST" enctype="multipart/form-data">
                        <div id="firstRowInput">
                            <input type="text" name="eventName" id="eventName" placeholder="Event Name">
                            <p></p>
                        </div>
                        <div id="secondRowInput">
                            <label for="date">Date of event</label>
                            <input type="date" name="date" id="date">
                            <label for="date">Time of event</label>
                            <input type="time" name="start_time" id="time">
                            <input type="number" name="capacity" id="capacity" placeholder="Capacity">
                            <label for="category">Category</label>
                            <select name="category" autocomplete="off">
                                <optgroup label="Music">
                                    <option value="Concerts">Concerts</option>
                                    <option value="Festivals">Festivals</option>
                                    <option value="Live">Live</option>
                                    <option value="Bands">Bands</option>
                                    <option value="DJs">DJs</option>
                                </optgroup>
                                <optgroup label="Parties">
                                    <option value="Weddings">Weddings</option>
                                    <option value="Birthdays">Birthdays</option>
                                    <option value="Graduation">Graduation</option>
                                </optgroup>
                                <optgroup label="Other">
                                    <option value="Other">Other</option>
                                </optgroup>
                            </select>
                        </div>
                        <div id="thirdRowInput">
                            <input type="text" name="address" id="address" placeholder="Address">
                            <input type="text" name="zip" id="zip" placeholder="ZIP Code">
                            <p></p>
                        </div>


                        <textarea placeholder="Write your description here" name="description"></textarea>
                        <div id="fileUpload">
                            <input type="file" name="photos" id="uploadedFile">
                            <p></p>
                        </div>
                        <input type="submit" value="Add Event">
                    </form>
                </div>
            </div>
        </div>
    <footer>
        <?php
            include 'footer.php';
        ?>
    </footer>
    </body>
</html>
