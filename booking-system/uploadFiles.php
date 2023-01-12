<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Upload files</title>
        <meta charset="UTF-8">
    </head>

    <body>
    <?php
    $fileSize = (7*1024*1024);
    if ($_FILES["uploadedFile"]["error"] == 0) {
        if(strlen($_FILES["uploadedFile"]["name"] <50)){
            if ($_FILES["uploadedFile"]["size"] < $fileSize){
                $acceptedTypes = ["image/png", "image/jpg", "image/jpeg"];
                $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["uploadedFile"]["tmp_name"]);

                if(in_array($uploadedFileType, $acceptedTypes)){
                    if(!file_exists("uploads/".$_FILES["uploadedFile"]["name"])){
                        if(move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], "uploads/".$_FILES["uploadedFile"]["name"])){
                            $uploadedFile = "uploads/".$_FILES["uploadedFile"]["name"];

                            echo "File uploaded";
                        }else{
                            echo "Something went wrong";
                        }
                    }else{
                        echo $_FILES["uploadedFile"]["name"] ." already exists";
                    }
                }else{
                    echo "Invalid file type";
                }
            }else{
                echo "Invalid file size (" .$_FILES["uploadedFile"]["size"] .")";
            }
        }else{
            echo "Invalid file name";
        }
    }
    //Form validation
    $err = [];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $talent = filter_input(INPUT_POST, "talent", FILTER_SANITIZE_SPECIAL_CHARS);
        $category = filter_input(INPUT_POST,"category", FILTER_SANITIZE_SPECIAL_CHARS);
        $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
        $time = filter_input(INPUT_POST, "time", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        $uploadedFile = filter_input(INPUT_POST, "uploadedFile", FILTER_SANITIZE_SPECIAL_CHARS);

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
            echo "Booking complete with the following data:" . "<br>";
            echo"Talent: ". $talent . "<br>";
            echo "Date: ". $date ."<br>";
            echo "Time: ". $time . "<br>";
            echo "Category: ". $category . "<br>";
            echo "Address: ". $address . "<br>";
            echo "Zip code: ". $zipCode . "<br>";
        }
        if($talent && $date && $time && $category && $address && $zipCode){
            try{
                $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
                $sql= $dbHandler->prepare("INSERT INTO booking(id, talent_id, date, time, category, address, zip_code, description, uploaded_files)
                    VALUES(NULL, :talent_id, :date, :time, :category, :address, :zip_code,:description,:uploaded_files);");
                $sql->bindParam(":talent_id", $talent, PDO::PARAM_INT);
                $sql->bindParam(":date", $date, PDO::PARAM_STR);
                $sql->bindParam(":time", $time, PDO::PARAM_STR);
                $sql->bindParam(":category", $category, PDO::PARAM_STR);
                $sql->bindParam(":address", $address, PDO::PARAM_STR);
                $sql->bindParam(":zip_code", $zipCode, PDO::PARAM_STR);
                $sql->bindParam(":description", $description, PDO::PARAM_STR);
                $sql->bindParam(":uploaded_files", $uploadedFile, PDO::PARAM_STR);

                $sql->execute();

                $dbHandler = null;
            }catch (Exception $ex){
                print $ex;
            }

        }

    }

    ?>
    </body>
</html>
