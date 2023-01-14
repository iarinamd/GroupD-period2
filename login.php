<?php
session_start(); //
//Processing Page for logging in
if ($_SERVER['REQUEST_METHOD'] == 'POST') // related to form, verify if the method is POST
{ $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
    $stmt = $dbHandler->prepare("SELECT * FROM login");
    $stmt->execute();

    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($result["username"] == $_POST["userInput"] AND password_verify($_POST["passwordInput"], $result["password"])){
            $_SESSION["login"] = "loged";
        }
    }
}
?>