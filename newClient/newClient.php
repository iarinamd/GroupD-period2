<?php
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <title>Create a new Client!</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <!-- PASTE IARINA'S HEADER HERE!-->
            </div>
            <div id="mainContainer">
                <h1>Create a new user</h1>
                <div id="form">
                    <form action="processedForm.php" method="POST">
                        <div id="formLabel">
                            <label for="fName" id="fName">First Name</label>
                            <label for="lName" id="lName">Last Name</label>
                            <label for="specialty" id="specialty">Specialty</label>
                        </div>
                        <input type="Text" name="fName">
                        <input type="Text" name="lName">
                        <select name="specialty" autocomplete="off">
                            <optgroup label="Music">
                                <option value="Musician">Musician</option>
                                <option value="DJs">DJs</option>
                                <option value="Band">Band</option>
                            </optgroup>
                            <optgroup label="Party">
                                <option value="Coordinators">Coordinators</option>
                                <option value="Caterers">Caterers</option>
                            </optgroup>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
