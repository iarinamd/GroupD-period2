<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>bookingSystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bookingSystem.css">
    </head>

    <body>
    <?php
    //Header

    ob_start();
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    try{
        $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
    }catch (Exception $ex){
        print $ex;
    }
    try {
        $sql = $dbHandler->prepare("SELECT * FROM 'booking'");
        $sql ->execute();
    } catch (Exception $ex){
        print $ex;
    }
    try{
        $sql ->bindParam("id", $id, PDO::PARAM_INT);
        $sql ->execute();
    }catch(Exception $ex){
        print $ex;
    }

        $sql -> bindColumn("talent", $talent);
        $sql -> bindColumn("date", $time);
        $sql -> bindColumn("time", $time);
        $sql -> bindColumn("category", $category);
        $sql -> bindColumn("zipCode", $zipCode);
        $sql -> bindColumn("description", $description);
        $sql -> bindColumn("uploadedFile", $uploadedFile);

        $result = $sql->fetch();
        $dbHandler=NULL;
    //Form validation
        $err = [];
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $currentTalent = filter_input(INPUT_POST, "talent", FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST,"category", FILTER_SANITIZE_SPECIAL_CHARS);
            $currentDate = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
            $currentTime = filter_input(INPUT_POST, "time", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty ($currentTalent)){
                $err[]= "Please select a talent";
            }
            if(empty($category)){
                $err[]= "Please select a category";
            }
            if(empty($currentDate)){
                $err[]= "Please select a date";
            }
            if(empty($currentTime)){
                $err[]= "Please enter a time";
            }
            if(empty($address)){
                $err[]= "Please enter an address";
            }
            if(str_word_count($address) <3){
                $err[]= "Please enter a valid address";
            }
            if(empty($zipCode)){
                $err[]= "Please enter a zip code";
            }
            if(empty($description)){
                $err[]= "Please enter a description";
            }
            if(str_word_count($description) < 5){
                $err[]= "The description should contain at least 5 words";
            }
            if(count($err)>0){
                echo"<ul>";
                foreach ($err as $error){
                    echo"<li>$error</li>";
                }
                echo"</ul>";
            }
            if(count($err) == 0){
                echo "Booking complete with the following data:" . "<br>";
                echo"Talent: ". $currentTalent . "<br>";
                echo "Date: ". $currentDate ."<br>";
                echo "Time: ". $currentTime . "<br>";
                echo "Category: ". $category . "<br>";
                echo "Address: ". $address . "<br>";
                echo "Zip code: ". $zipCode . "<br>";
            }
            if(!$currentTalent && !$currentDate && !$currentTime &&!$category && !$address && !$zipCode){
                $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
                $sql= $dbHandler->prepare("INSERT INTO 'booking'(`id`, `talent`, `date`, `time`, `category`, `address`, `zip`, `description`, `uploadedFile`)
                    VALUES(NULL, ':talent', ':date', ':time', ':category', ':address', ':zip',':description',':uploadedFIle');");
                $sql->bindParam("id", $id, PDO::PARAM_INT);
                $sql->bindParam("talent", $talent, PDO::PARAM_INT);
                $sql->bindParam("date", $date, PDO::PARAM_STR);
                $sql->bindParam("time", $time, PDO::PARAM_STR);
                $sql->bindParam("category", $category, PDO::PARAM_STR);
                $sql->bindParam("address", $address, PDO::PARAM_STR);
                $sql->bindParam("zip", $zipCode, PDO::PARAM_STR);

                $sql->execute();

                $dbHandler = null;
                header("Location:bookingSystem.php");
            }

        }
        else{
            //Form
            echo'<h1>Book a talent</h1>
        <div id="container">
            <form name="booking" action="bookingSystem.php" enctype="multipart/form-data" method="POST" id="form">
                <div class="row1">
                    <div class="talent">
                        <label for="talent"></label>
                        <select name="talent" id="talent">
                            <option disabled selected>Select a talent</option>
                            <option>Talent1</option>
                            <option>Talent2</option>
                            <option>Talent3</option>
                        </select>
                    </div>
                    <div class="date">
                        <label for="date"></label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div class="time">
                        <label for="time"></label>
                        <input type="text" name="time" id="time" placeholder="Time">
                    </div>
                </div>

                <div class="row2">
                    <div class="category">
                        <label for="category"></label>
                        <select name="category" id="category">
                            <option disabled selected>Category</option>
                            <option>Music</option>
                            <option>Parties</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="address">
                        <label for="address"></label>
                        <input type="text" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="zipCode">
                        <label for="zipCode"></label>
                        <input type="text" name="zipCode" id="zipCode" placeholder="Zip Code">
                    </div>
                </div>
                <div class="description">
                    <label for="description"></label>
                    <textarea name="description" placeholder="Description"></textarea>
                </div>
                <div dropzone="copy">
                    <label for="files" class="dropZone">
                        <input type="file" name="uploadFile" id="uploadFile" accept="*" required>
                    </label>
                </div>
                <div class="submitButton">
                    <button type="submit" value="submit">Submit</button>
                </div>
            </form>';
        }
        //Footer
    ?>
    </body>
</html>
