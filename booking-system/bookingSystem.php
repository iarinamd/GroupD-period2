<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>bookingSystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <h1>Book a talent</h1>
        <form name="booking" action="bookingSystem.php" method="POST">
            <div>
                <label for="talent">Select a talent</label>
                <select name="type" id="type">
                    <option>Talent1</option>
                    <option>Talent2</option>
                    <option>Talent3</option>
                </select>
            </div>
            <div>
                <label for="date">Date</label>
                <input type="date" name="date" id="date">
            </div>
            <div>
                <label for="time">Time</label>
                <input type="text" name="time" id="time">
            </div>
            <div>
                <label for="category">Category</label>
                <select name="type" id="type">
                    <option>Category1</option>
                    <option>Category2</option>
                    <option>Category3</option>
                </select>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address">
            </div>
            <div>
                <label for="zipCode">Zip Code</label>
                <input type="text" name="zipCode" id="zipCode">
            </div>
            <div>
                <label for="description">Description</label>
                <texrtarea name="description"></texrtarea>
            </div>
            <div>
                <label for="uploadFile">Upload files(optional)</label>
                <input type="file" name="uploadedFile" id="uploadedFile">
            </div>
        </form>
    </body>
</html>
