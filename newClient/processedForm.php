<?php
    $fNameErr = $lNameErr = $specialtyErr = $emailErr = $phoneNrErr = $zipErr = $uploadedFileErr = " ";
    $fName = $lName = $specialty = $email = $phoneNr = $zip = $uploadedFile = " ";

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["fName"])){
            $fNameErr= "Please enter a valid name";
        } else{
            $fName= test_input($_POST["fName"]);
            if (preg_match("/^[a-zA-Z-' ]*$/",$fName)){
                $fNameErr="Only letters and white spaces allowed";
            }
        }
        if (empty($_POST["lName"])){
            $lNameErr= "Please enter a valid name";
        } else{
            $lName= test_input($_POST["lName"]);
            if (preg_match("/^[a-zA-Z-' ]*$/",$lName)){
                $lNameErr="Only letters and white spaces allowed";
            }
        } if (empty($_POST["specialty"])){
            $specialtyErr = "Please select a specialty.";
        } else{
            echo "Specialty selected";
        }
        if (empty($_POST["email"])){
            $emailErr= "Valid E-Mail.";
        } else{
            $email= test_input($_POST["email"]);
        } if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr = "The E-Mail address is not a correct format";
        }
    }
?>