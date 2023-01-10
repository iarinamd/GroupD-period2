<?php
    ob_start();
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
try {
    $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");

}catch (Exception $ex){
    print $ex;
}
try {
    $sql = $dbHandler->prepare("SELECT * FROM talents WHERE id=:id");
}catch (Exception $ex){
    print $ex;
}
try {
    $sql->bindParam("id",$id,PDO::PARAM_INT);
    $sql->execute();
}catch (Exception $ex){
    print $ex;
}

    $sql->bindColumn("fName",$fName);
    $sql->bindColumn("lName",$lName);
    $sql->bindColumn("specialty1",$specialty1);
    $sql->bindColumn("specialty2",$specialty2);
    $sql->bindColumn("specialty3",$specialty3);
    $sql->bindColumn("email",$email);
    $sql->bindColumn("phoneNr",$phoneNr);
    $sql->bindColumn("bday",$bday);
    $sql->bindColumn("description",$description);
    $sql->bindColumn("uploadedFile",$uploadedFile);

    $result = $sql->fetch();
    $dbHandler=NULL;

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $fName = filter_input(INPUT_POST, "fName");
        $lName = filter_input(INPUT_POST, "lName");
        $specialty1 = filter_input(INPUT_POST, "specialty1");
        $specialty2 = filter_input(INPUT_POST, "specialty2");
        $specialty3 = filter_input(INPUT_POST, "specialty3");
        $email = filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL);
        $phoneNr = filter_input(INPUT_POST, "phoneNr");
        $bday = filter_input(INPUT_POST, "bday");
        $description = filter_input(INPUT_POST, "description");

        if(empty($fName)){
            echo "Please enter your first name";
        } elseif (empty($lName)){
            echo "Please enter your last name";
        } elseif (empty($specialty1)){
            echo "Please select a specialty";
        } elseif (empty($specialty2)){
            echo "Please select a specialty";
        }elseif (empty($specialty3)){
            echo "Please select a specialty";
        } elseif (empty($email)){
            echo "Please enter an E-Mail address";
        } elseif (empty($phoneNr)){
            echo "Please enter a phone number";
        } elseif (empty($bday)){
            echo "Please enter your date of birth";
        } else{
            echo "Your profile has been saved with the following data:" . "<br>";
            echo "First Name: ". $fName ."<br>";
            echo "Last Name: ". $lName ."<br>";
            echo "Specialty 1: ". $specialty1 ."<br>";
            echo "Specialty 2: ". $specialty2 ."<br>";
            echo "Specialty 3: ". $specialty3 ."<br>";
            echo "E-Mail: ". $email ."<br>";
            echo "Phone Number: ". $phoneNr ."<br>";
            echo "Date of Birth: ". $bday ."<br>";
        }
        if (!$fName && !$lName && !$specialty1 && !$specialty2 && !$specialty3 && !$email && !$phoneNr && !$bday){
        $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");

            $sql= $dbHandler->prepare("INSERT INTO talents(`id`,`fName`,`lName`,`specialty1`,`specialty2`,
                                                    `specialty3`,`email`,`phoneNr`,`bday`,`description`,`uploadedFile`)
                                                    VALUES(NULL,':fName',':lName',':specialty1',':specialty2',':specialty3',
                                                           ':email',':phoneNr',':bday',':description',':uploadedFile');");
            $sql->bindParam("id",$id,PDO::PARAM_INT);
            $sql->bindParam("fName",$fName,PDO::PARAM_STR);
            $sql->bindParam("lName",$lName,PDO::PARAM_STR);
            $sql->bindParam("specialty1",$specialty1,PDO::PARAM_STR);
            $sql->bindParam("specialty2",$specialty2,PDO::PARAM_STR);
            $sql->bindParam("specialty3",$specialty3,PDO::PARAM_STR);
            $sql->bindParam("email",$email,PDO::PARAM_STR);
            $sql->bindParam("phoneNr",$phoneNr,PDO::PARAM_INT);
            $sql->bindParam("bday",$bday,PDO::PARAM_STR);

            $sql->execute();
            $result=$sql->execute();
            var_dump($result);
            //$dbHandler = NULL;
            header("Location:newClient.php");

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
                            <p></p>
                            <label for="specialty1">Specialty 1</label>
                            <select name="specialty1" autocomplete="off">
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
                            <label for="specialty2">Specialty 2</label>
                            <select name="specialty2" autocomplete="off">
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
                            <label for="specialty3">Specialty 3</label>
                            <select name="specialty3" autocomplete="off">
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
                            <p></p>
                            <label for="bday">Date of Birth</label>
                            <input type="date" name="bday" id="bday" placeholder="Day of Birth">
                        </div>
                        <textarea placeholder="Write your description here" name="description"></textarea>
                        <div id="fileUpload">
                            <input type="file" name="uploadedFile" id="uploadedFile">
                            <p></p>
                        </div>
                        <input type="submit" value="Add User">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
