<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>bookingSystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <!-- Header -->
    <?php
        $err = [];
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $dropDown = filter_input(INPUT_POST, "dropDown");
            $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
            $time = filter_input(INPUT_POST, "text", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty ($dropDown)){
                $err[]= "Please select an option";
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
            if(strlen($address) <5){
                $err[]= "Please enter a valid address";
            }
            if(empty($zipCode)){
                $err[]= "Please enter a zip code";
            }
            if(empty($description)){
                $err[]= "Please enter a description";
            }
            if(strlen($description) < 5){
                $err[]= "The description should contain at least 5 words";
            }
        }
    ?>
        <h1>Book a talent</h1>
        <div id="container">
            <form name="booking" action="bookingSystem.php" enctype="multipart/form-data" method="POST" id="form">
                <div class="row1">
                    <div class="talent">
                        <select name="dropDown" id="dropDown">
                            <option disabled selected>Select a talent</option>
                            <option>Talent1</option>
                            <option>Talent2</option>
                            <option>Talent3</option>
                        </select>
                    </div>
                    <div class="date">
                        <input type="date" name="date" id="date">
                    </div>
                    <div class="time">
                        <input type="text" name="time" id="time" placeholder="Time">
                    </div>
                </div>

                <div class="row2">
                    <div class="category">
                        <select name="dropDown" id="dropDown">
                            <option diable selected>Category</option>
                            <option>Music</option>
                            <option>Parties</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="address">
                        <input type="text" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="zipCode">
                        <input type="text" name="zipCode" id="zipCode" placeholder="Zip Code">
                    </div>
                </div>
                <div class="description">
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
            </form>
            <!-- Footer -->
        </div>

    </body>
</html>
