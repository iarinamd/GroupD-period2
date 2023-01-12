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
        $sql = $dbHandler->prepare("SELECT * FROM booking");
        $sql ->execute();
    } catch (Exception $ex){
        print $ex;
    }

    //Form validation
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $err = [];
            $talent = filter_input(INPUT_POST, "talent", FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST,"category", FILTER_SANITIZE_SPECIAL_CHARS);
            $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
            $time = filter_input(INPUT_POST, "time", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty ($talent)){
                $err[]= "Please select a talent";
            } //end if
            if(empty($category)){
                $err[]= "Please select a category";
            }//end if
            if(empty($date)){
                $err[]= "Please select a date";
            }//end if
            if(empty($time)){
                $err[]= "Please enter a time";
            }//end if
            if(empty($address)){
                $err[]= "Please enter an address";
            }//end if
            if(str_word_count($address) <3){
                $err[]= "Please enter a valid address";
            }//end if
            if(empty($zipCode)){
                $err[]= "Please enter a zip code";
            }//end if
            if(empty($description)){
                $err[]= "Please enter a description";
            }//end if
            if(str_word_count($description) < 5){
                $err[]= "The description should contain at least 5 words";
            }//end if

            if(count($err)>0){
                echo"<ul>";
                foreach ($err as $error){
                    echo"<li>$error</li>";
                } //end foreach
                echo"</ul>";
            } //end if
            if(count($err) == 0){
                echo "Booking complete with the following data:" . "<br>";
                echo"Talent: ". $talent . "<br>";
                echo "Date: ". $date ."<br>";
                echo "Time: ". $time . "<br>";
                echo "Category: ". $category . "<br>";
                echo "Address: ". $address . "<br>";
                echo "Zip code: ". $zipCode . "<br>";
            } //end if

                //File validation
                $fileSize = (7 * 1024 * 1024);
                if ($_FILES["uploadedFile"]["error"] == 0) {
                    if (strlen($_FILES["uploadedFile"]["name"]) < 50) {
                        if ($_FILES["uploadedFile"]["size"] < $fileSize) {
                            $acceptedTypes = ["image/png", "image/jpg", "image/jpeg"];
                            $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["uploadedFile"]["tmp_name"]);

                            if (in_array($uploadedFileType, $acceptedTypes)) {
                                if (!file_exists("uploads/" . $_FILES["uploadedFile"]["name"])) {
                                    if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], "uploads/" . $_FILES["uploadedFile"]["name"])) {
                                        if (count($err)==0){
                                            $uploadedFile = "uploads/" . $_FILES["uploadedFile"]["name"];

                                            echo "File uploaded";
                                        }else{
                                            echo "xxx";
                                        } //end else

                                    } else {
                                        echo "Something went wrong";
                                    } //end else
                                } else {
                                    echo $_FILES["uploadedFile"]["name"] . " already exists";
                                } // end else
                            } else {
                                echo "Invalid file type";
                            } //end else
                        } else {
                            echo "Invalid file size (" . $_FILES["uploadedFile"]["size"] . ")";
                        } //end else
                    } else {
                        echo "Invalid file name";
                    } //end else
                } //end if

                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
                    $sql= $dbHandler->prepare("INSERT INTO booking(id, talent, date, time, category, address, zip_code, description, uploaded_files)
                        VALUES(NULL, :talent, :date, :time, :category, :address, :zip_code,:description,:uploaded_files);");
                    $sql->bindParam(":talent", $talent, PDO::PARAM_INT);
                    $sql->bindParam(":date", $date, PDO::PARAM_STR);
                    $sql->bindParam(":time", $time, PDO::PARAM_STR);
                    $sql->bindParam(":category", $category, PDO::PARAM_STR);
                    $sql->bindParam(":address", $address, PDO::PARAM_STR);
                    $sql->bindParam(":zip_code", $zipCode, PDO::PARAM_STR);
                    $sql->bindParam(":description", $description, PDO::PARAM_STR);
                    $sql->bindParam(":uploaded_files", $uploadedFile, PDO::PARAM_STR);

                    $sql->execute();

                    $dbHandler = null;
                } //end if

        } //end if
        else{
            //Form
            echo'<h1>Book a talent</h1>
        <div id="container">
            <form name="booking" action="bookingSystem.php" enctype="multipart/form-data" method="POST" id="form">
            <!-- Row 1 -->
                <div class="row1">
                    <div class="talent">
                        <label for="talent"></label>
                        <select name="talent" id="talent">
                            <option disabled selected>Select a talent</option>
                            <option> Talent1</option>
                            <option><Talent2></option>
                            <option>Talent3</option>
                        </select>
                    </div>
                    <div class="date">
                        <label for="date"></label>
                        <input type="text" name="date" id="date" placeholder="Date">
                    </div>
                    <div class="time">
                        <label for="time"></label>
                        <input type="text" name="time" id="time" placeholder="Time">
                    </div>
                </div>
                <!-- row 2 -->
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
                        <input type="file" name="uploadedFile" id="uploadedFile" accept="*" required>
                    </label>
                </div>
                <!-- Submit button -->
                <div class="submitButton">
                    <button type="submit" value="submit">Submit</button>
                </div>
            </form>';
        } //end else
        //Footer
    ?>
    </body>
</html>
