<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/addedClientStyle.css">
            <link rel="stylesheet" href="css/header.css">
            <link rel="stylesheet" href="css/footer.css">
            <title>Profile added to Database</title>
        </head>
        <body>
            <header>
                <?php
                    include 'header.php'
                ?>
            </header>
                <div id="mainContainer">
                    <?php
                    //FILE VALIDATION

                        $fileSize = (7*1024*1024);

                        if ($_FILES["photo1"]["error"] == 0) {
                            if (strlen($_FILES["photo1"]["name"]) < 50 && preg_match('/[A-Z]/', $_FILES["photo1"]["name"])) {
                                if ($_FILES["photo1"]["size"] < $fileSize) {
                                    $acceptedTypes = ["image/png", "image/jpeg", "image/jpg"];
                                    $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["photo1"]["tmp_name"]);

                                    echo "<h1> Your profile has been saved with the following data: </h1>" . "<br>";
                                    if (in_array($uploadedFileType, $acceptedTypes)) {
                                        if (!file_exists("img/uploadFile/" . $_FILES["photo1"]["name"])) {
                                            if(move_uploaded_file($_FILES["photo1"]["tmp_name"], "uploadFile/". $_FILES["photo1"]["name"])) {
                                                $photo1 = "img/uploadFile/". $_FILES["photo1"]["name"];

                                                echo "<b> You have uploaded: " . $photo1 . "</b> <br>";
                                                echo '<img src="'.$photo1.'" width="300px" height="auto"> <br>';
                                               // echo "Upload: ". $_FILES["uploadedFile"]["name"] ."<br>";
                                               // echo "Type: ". $_FILES["uploadedFile"]["type"] ."<br>";
                                               // echo "Size: ". ($_FILES["uploadedFile"]["size"] / 1024) ." Kb<br>";
                                               // echo "Stored temporarily in: ". $_FILES["uploadedFile"]["tmp_name"] ."<br>";
                                               // echo "Stored permanently in: " . "upload/". $_FILES["uploadedFile"]["name"];
                                            } else {
                                                echo "Something went wrong while uploading";
                                            }
                                        } else {
                                            echo $_FILES["photo1"]["name"] . " already exists";
                                        }
                                    } else {
                                        echo "Invalid file type (" . $_FILES["photo1"]["type"] . ")";
                                    }
                                } else {
                                    echo "Invalid file size (" . $_FILES["photo1"]["size"] . ")";
                                }
                            } else {
                                echo "Name must contain an uppercase and must not exceed 50 chars";
                            }
                        } else {
                            echo "Error: ". $_FILES["photo1"]["error"] ."<br>";
                        }

                        if ($_SERVER["REQUEST_METHOD"]=="POST"){
                            $fName = filter_input(INPUT_POST, "fName");
                            $lName = filter_input(INPUT_POST, "lName");
                            $specialty_1 = filter_input(INPUT_POST, "specialty_1");
                            $specialty_2 = filter_input(INPUT_POST, "specialty_2");
                            $specialty_3 = filter_input(INPUT_POST, "specialty_3");
                            $email = filter_input(INPUT_POST, "email",FILTER_VALIDATE_EMAIL);
                            $phoneNr = filter_input(INPUT_POST, "phoneNr");
                            $bday = filter_input(INPUT_POST, "bday");
                            $descriptions = filter_input(INPUT_POST, "descriptions");

                            if(empty($fName)){
                                echo "Please enter your first name";
                            } elseif (empty($lName)){
                                echo "Please enter your last name";
                            } elseif (empty($specialty_1)){
                                echo "Please select a specialty";
                            } elseif (empty($specialty_2)){
                                echo "Please select a specialty";
                            }elseif (empty($specialty_3)){
                                echo "Please select a specialty";
                            } elseif (empty($email)){
                                echo "Please enter an E-Mail address";
                            } elseif (empty($phoneNr)){
                                echo "Please enter a phone number";
                            } elseif (empty($bday)){
                                echo "Please enter your date of birth";
                            } else{

                                echo "<table>";
                                echo "<th>First Name:</th> ". "<td>" . $fName . "</td>";
                                echo "<tr><th>Last Name:</th> ". "<td>" . $lName . "</td></tr>";
                                echo "<tr><th>Specialty 1:</th> ". "<td>" . $specialty_1 . "</td></tr>";
                                echo "<tr><th>Specialty 2:</th> ". "<td>" . $specialty_2 . "</td></tr>";
                                echo "<tr><th>Specialty 3:</th> ". "<td>" . $specialty_3 . "</td></tr>";
                                echo "<tr><th>E-Mail:</th> ". "<td>" . $email . "</td></tr>";
                                echo "<tr><th>Phone Number:</th> ". "<td>" . $phoneNr . "</td></tr>";
                                echo "<tr><th>Date of birth:</th> ". "<td>" . $bday . "</td></tr>";
                                echo "</table><br>";

                            }
                            if ($fName && $lName && $specialty_1 && $specialty_2 && $specialty_3 && $email && $phoneNr && $bday){
                                $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
                                try {
                                    $sql= $dbHandler->prepare("INSERT INTO talents(`id`,`active`,`email`,`fName`,`lName`,`descriptions`,`specialty_1`,`specialty_2`,
                                                                            `specialty_3`,`phoneNr`,`bday`,`avatar`,`descriptions`,`photo1`)
                                                                            VALUES( NOT NULL,NULL,:email,:fName,:lName,:descriptions,:specialty_1,:specialty_2,:specialty_3,
                                                                                   :phoneNr,:bday,:avatar,:photo1,:photo1,:photo1);");
                                    $sql->bindParam("active",$active,PDO::PARAM_INT);
                                    $sql->bindParam("fName",$fName,PDO::PARAM_STR);
                                    $sql->bindParam("lName",$lName,PDO::PARAM_STR);
                                    $sql->bindParam("specialty_1",$specialty_1,PDO::PARAM_STR);
                                    $sql->bindParam("specialty_2",$specialty_2,PDO::PARAM_STR);
                                    $sql->bindParam("specialty_3",$specialty_3,PDO::PARAM_STR);
                                    $sql->bindParam("email",$email,PDO::PARAM_STR);
                                    $sql->bindParam("phoneNr",$phoneNr,PDO::PARAM_STR);
                                    $sql->bindParam("bday",$bday,PDO::PARAM_STR);
                                    $sql->bindParam("descriptions",$descriptions,PDO::PARAM_STR);
                                    $sql->bindParam("photo1",$photo1,PDO::PARAM_STR);
                                    $sql->bindParam("avatar",$avatar,PDO::PARAM_STR);

                                    $sql->execute();
                                }catch (Exception $ex){
                                    print $ex;
                                }


                                //$dbHandler = NULL;
                               echo "<button><a href='newClient.php'> Add another client </a></button>";

                            }else{
                                echo "something";
                            }

                        }
                    ?>
                </div>
            </div>
        <footer>
            <?php
                include 'footer.php';
            ?>
        </footer>
        </body>
    </html>
