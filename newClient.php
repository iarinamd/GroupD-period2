<?php
 session_start();
    ob_start();
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
try {
    $dbHandler = new PDO("mysql:host=localhost;port=3306;dbname=e3t_database;charset=utf8mb4", "phpmyadmin", "!User_12");

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
    $sql->bindColumn("speciality_1",$speciality_1);
    $sql->bindColumn("speciality_2",$speciality_2);
    $sql->bindColumn("speciality_3",$speciality_3);
    $sql->bindColumn("email",$email);
    $sql->bindColumn("phoneNr",$phoneNr);
    $sql->bindColumn("bday",$bday);
    $sql->bindColumn("descriptions",$descriptions);
    $sql->bindColumn("avatar",$photo1);
    $sql->bindColumn("photo1",$photo1);
    $sql->bindColumn("photo2",$photo1);
    $sql->bindColumn("photo3",$photo1);

    $result = $sql->fetch();
    $dbHandler=NULL;

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $fName = filter_input(INPUT_POST, "fName");
        $lName = filter_input(INPUT_POST, "lName");
        $speciality_1 = filter_input(INPUT_POST, "speciality_1");
        $speciality_2 = filter_input(INPUT_POST, "speciality_2");
        $speciality_3 = filter_input(INPUT_POST, "speciality_3");
        $email = filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL);
        $phoneNr = filter_input(INPUT_POST, "phoneNr");
        $bday = filter_input(INPUT_POST, "bday");
        $descriptions = filter_input(INPUT_POST, "descriptions");

        if(empty($fName)){
            echo "Please enter your first name";
        } elseif (empty($lName)){
            echo "Please enter your last name";
        } elseif (empty($speciality_1)){
            echo "Please select a specialty";
        } elseif (empty($speciality_2)){
            echo "Please select a specialty";
        }elseif (empty($speciality_3)){
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
            echo "Specialty 1: ". $speciality_1 ."<br>";
            echo "Specialty 2: ". $speciality_2 ."<br>";
            echo "Specialty 3: ". $speciality_3 ."<br>";
            echo "E-Mail: ". $email ."<br>";
            echo "Phone Number: ". $phoneNr ."<br>";
            echo "Date of Birth: ". $bday ."<br>";
        }
        if (!$fName && !$lName && !$speciality_1 && !$speciality_2 && !$speciality_3 && !$email && !$phoneNr && !$bday){
        $dbHandler = new PDO("mysql:host=localhost;port=3306;dbname=e3t_database;charset=utf8mb4", "phpmyadmin", "!User_12");

            $sql= $dbHandler->prepare("INSERT INTO talents(`id`,`active`,`email`,`fName`,`lName`,`descriptions`,`speciality_1`,`speciality_2`,
                                                    `speciality_3`,`phoneNr`,`bday`,`avatar`, `photo1`, `photo2`,`photo3`)
                                                    VALUES(NULL,1,:email,:fName,:lName,:descriptions,:speciality_1,:speciality_2,
                                                    :speciality_3,:phoneNr,:bday,:photo1, :photo1, :photo1,:photo1);");
            $sql->bindParam("id",$id,PDO::PARAM_INT);
            $sql->bindParam("fName",$fName,PDO::PARAM_STR);
            $sql->bindParam("lName",$lName,PDO::PARAM_STR);
            $sql->bindParam("descriptions",$descriptions,PDO::PARAM_STR);
            $sql->bindParam("specialty_1",$speciality_1,PDO::PARAM_STR);
            $sql->bindParam("specialty_2",$speciality_2,PDO::PARAM_STR);
            $sql->bindParam("specialty_3",$speciality_3,PDO::PARAM_STR);
            $sql->bindParam("email",$email,PDO::PARAM_STR);
            $sql->bindParam("phoneNr",$phoneNr,PDO::PARAM_INT);
            $sql->bindParam("bday",$bday,PDO::PARAM_STR);
            $sql->bindParam("avatar",$photo1,PDO::PARAM_STR);
            $sql->bindParam("photo1",$photo1,PDO::PARAM_STR);
            $sql->bindParam("photo2",$photo1,PDO::PARAM_STR);
            $sql->bindParam("photo3",$photo1,PDO::PARAM_STR);

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
        <link rel="stylesheet" href="css/newClientStyle.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <title>Create a new Client!</title>
    </head>
    <body>
    <header>
        <?php
            include 'header.php';

        ?>
    </header>
        <div id="container">
            <div id="mainContainer">
                <h1>Create a new user</h1>
                <div id="form">
                    <form action="processedForm.php" method="POST" enctype="multipart/form-data">
                        <div id="firstRowInput">
                            <input type="text" name="fName" id="fName" placeholder="First Name">
                            <input type="text" name="lName" id="lName" placeholder="Last Name">
                            <p></p>
                            <label for="speciality_1">Specialty 1</label>
                            <select name="speciality_1" autocomplete="off">
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
                            <label for="speciality_2">Specialty 2</label>
                            <select name="speciality_2" autocomplete="off">
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
                            <label for="speciality_3">Specialty 3</label>
                            <select name="speciality_3" autocomplete="off">
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
                        <textarea placeholder="Write your description here" name="descriptions"></textarea>
                        <div id="fileUpload">
                            <input type="file" name="photo1" id="photo1">
                            <p></p>
                        </div>
                        <input type="submit" value="Add User">
                    </form>
                </div>
            </div>
        </div>
    <footer>
        <?php
            include 'footer.php'
        ?>
    </footer>
    </body>
</html>
