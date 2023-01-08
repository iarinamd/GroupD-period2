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
                <h1>Header Placeholder</h1>
            </div>
            <div id="mainContainer">
                <h1>Create a new user</h1>
                <div id="form">
                    <form action="processedForm.php" method="POST" enctype="multipart/form-data">
                        <div id="firstRowInput">
                            <input type="text" name="fName" id="fName" placeholder="First Name">
                            <input type="text" name="lName" id="lName" placeholder="Last Name">

                            <select name="specialty" autocomplete="off">
                                <optgroup label="Music">
                                    <option value="musician">Musician</option>
                                    <option value="djs">DJs</option>
                                    <option value="band">Band</option>
                                </optgroup>
                                <optgroup label="Party">
                                    <option value="coordinators">Coordinators</option>
                                    <option value="caterers">Caterers</option>
                                </optgroup>
                                <optgroup label="Other">
                                    <option value="other">Other</option>
                                </optgroup>
                            </select>
                            <p></p>
                        </div>
                        <div id="secondRowInput">
                            <input type="email" name="email" id="email" placeholder="E-Mail">
                            <input type="tel" name="phoneNr" id="phoneNr" placeholder="Phone Number">
                            <input type="text" name="zip" id="zip" placeholder="ZIP Code">
                        </div>
                        <textarea>Write your description here</textarea>
                        <div id="fileUpload">
                            <input type="file" name="uploadedFile" id="uploadedFile">
                            <p></p>
                        </div>
                        <input type="submit" value="Save Profile">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
