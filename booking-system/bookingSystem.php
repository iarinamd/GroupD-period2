<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>bookingSystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <!-- Header -->
        <h1>Book a talent</h1>
        <div id="container">
            <form name="booking" action="bookingSystem.php" method="POST" id="form">
                <div class="row1">
                    <div class="talent">
                        <select name="type" id="type">
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
                        <select name="type" id="type">
                            <option diable selected>Category</option>
                            <option>Category1</option>
                            <option>Category2</option>
                            <option>Category3</option>
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
                    <textarea placeholder="Description"></textarea>
                </div>
                <div class="uploadFile">
                    <label for="uploadFile">Upload files(optional)</label>
                    <input type="file" name="uploadedFile" id="uploadedFile">
                </div>
            </form>
            <!-- Footer -->
        </div>

    </body>
</html>
