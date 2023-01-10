<?php
//FILE VALIDATION

$fileSize = (7*1024*1024);

if ($_FILES["uploadedFile"]["error"] == 0) {
    if (strlen($_FILES["uploadedFile"]["name"]) < 50 && preg_match('/[A-Z]/', $_FILES["uploadedFile"]["name"])) {
        if ($_FILES["uploadedFile"]["size"] < $fileSize) {
            $acceptedTypes = ["image/png", "image/jpeg", "image/jpg"];
            $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["uploadedFile"]["tmp_name"]);

            if (in_array($uploadedFileType, $acceptedTypes)) {
                if (!file_exists("uploadFile/" . $_FILES["uploadedFile"]["name"])) {
                    if(move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], "uploadFile/". $_FILES["uploadedFile"]["name"])) {
                        $uploadedFile = "uploadFile/". $_FILES["uploadedFile"]["name"];
                        echo '<img src="'.$uploadedFile.'">';
                        echo $uploadedFile;
                        echo "Upload: ". $_FILES["uploadedFile"]["name"] ."<br>";
                        echo "Type: ". $_FILES["uploadedFile"]["type"] ."<br>";
                        echo "Size: ". ($_FILES["uploadedFile"]["size"] / 1024) ." Kb<br>";
                        echo "Stored temporarily in: ". $_FILES["uploadedFile"]["tmp_name"] ."<br>";
                        echo "Stored permanently in: " . "upload/". $_FILES["uploadedFile"]["name"];
                    } else {
                        echo "Something went wrong while uploading";
                    }
                } else {
                    echo $_FILES["uploadedFile"]["name"] . " already exists";
                }
            } else {
                echo "Invalid file type (" . $_FILES["uploadedFile"]["type"] . ")";
            }
        } else {
            echo "Invalid file size (" . $_FILES["uploadedFile"]["size"] . ")";
        }
    } else {
        echo "Name must contain an uppercase and must not exceed 50 chars";
    }
} else {
    echo "Error: ". $_FILES["uploadedFile"]["error"] ."<br>";
}

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
    if ($fName && $lName && $specialty1 && $specialty2 && $specialty3 && $email && $phoneNr && $bday){
        $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
        try {
            $sql= $dbHandler->prepare("INSERT INTO talents(`id`,`fName`,`lName`,`specialty1`,`specialty2`,
                                                    `specialty3`,`email`,`phoneNr`,`bday`,`description`,`uploadedFile`)
                                                    VALUES( NOT NULL,:fName,:lName,:specialty1,:specialty2,:specialty3,
                                                           :email,:phoneNr,:bday,:description,:uploadedFile);");
            $sql->bindParam("fName",$fName,PDO::PARAM_STR);
            $sql->bindParam("lName",$lName,PDO::PARAM_STR);
            $sql->bindParam("specialty1",$specialty1,PDO::PARAM_STR);
            $sql->bindParam("specialty2",$specialty2,PDO::PARAM_STR);
            $sql->bindParam("specialty3",$specialty3,PDO::PARAM_STR);
            $sql->bindParam("email",$email,PDO::PARAM_STR);
            $sql->bindParam("phoneNr",$phoneNr,PDO::PARAM_STR);
            $sql->bindParam("bday",$bday,PDO::PARAM_STR);
            $sql->bindParam("description",$description,PDO::PARAM_STR);
            $sql->bindParam("uploadedFile",$uploadedFile,PDO::PARAM_STR);

            $sql->execute();
        }catch (Exception $ex){
            print $ex;
        }


        //$dbHandler = NULL;
       echo "<a href='newClient.php'> Add another client </a>";

    }else{
        echo "something";
    }

}
?>