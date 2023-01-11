<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Upload files</title>
        <meta charset="UTF-8">
    </head>

    <body>
    <?php
    $target_dir= "uploads/";
    $target_file= $target_dir . basename($_FILES["files"]["name"]);

    $filesize= 3*1024*1024;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $errors = array();
            $flag = 0;

            $acceptedFileTypes = ["image/png", "image/jpeg", "image/jpg"];
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($fileInfo, $_FILES["files"["tmp_name"]]);

            if(!in_array($mimeType, $acceptedFileTypes)){
                array_push($errors, "Invalid file type");
                $flag = 1;
            }

            if(file_exists("uploadedFiles/".$_FILES["files"]["name"])){
                array_push($errors, "Duplicate file found, no upload available");
                $flag = 1;
            }

            if($flag == 0){
                move_uploaded_file($_FILES["files"]["name"], $target_file);
            }
            else{
                foreach($errors as $error){
                    echo $error;
                }
            }
        }
    ?>
    </body>
</html>
