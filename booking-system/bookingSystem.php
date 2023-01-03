<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>bookingSystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <?php
    //Header
        $err = [];
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $talent = filter_input(INPUT_POST, "talent", FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST,"category", FILTER_SANITIZE_SPECIAL_CHARS);
            $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
            $time = filter_input(INPUT_POST, "time", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty ($talent)){
                $err[]= "Please select a talent";
            }
            if(empty($category)){
                $err[]= "Please select a category";
            }
            if(empty($date)){
                $err[]= "Please select a date";
            }
            if(empty($time)){
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
                echo "Booking complete";
            }
        }
        else{
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
