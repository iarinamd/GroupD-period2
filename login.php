<?php
session_start(); //
//Processing Page for logging in
if ($_SERVER['REQUEST_METHOD'] == 'POST') // related to form, verify if the method is POST
{
    //Here we are getting the input information from the forms.
    $memberUsername = $_POST["userInput"];
    $memberPassword = $_POST["passwordInput"]; // this is how you take the value from an input text box.

    //Here we are trying to connect to the database.
    if ($conn = mysqli_connect('localhost','root',''))
    {
        mysqli_select_db($conn, 'e3t_database');

        //this is prepare statement for security
        $sql = "SELECT `username`, `password`, `usertype` FROM `login` WHERE `username`= ?";
        if ($stmt = mysqli_prepare($conn, $sql))
        {
            mysqli_stmt_bind_param($stmt, 's', $memberUsername);

            //Here we are executing the statement(the "$sql")
            if (mysqli_stmt_execute($stmt))
            {

            }
            else
            {
                echo "Error. Failed to check staff ID. Try again later";
            }
        }
        else
        {
            echo "Preparation error. Try again later";
        }

        //Bind results
        mysqli_stmt_bind_result($stmt, $userName, $password, $userType);
        mysqli_stmt_store_result($stmt); // verify if the values from data base are stored in values from above
        if (mysqli_stmt_num_rows($stmt) > 0) // We are checking if the database in empty or not
        {
            mysqli_stmt_fetch($stmt);
            if ($memberUsername == $userName AND $memberPassword== $password  )
            { // We are checkin the username and the password of a user.
                switch ($userType)
                {
                    case "admin":
                        $_SESSION['username'] = $memberUsername;
                        echo '<script type="text/javascript">location.href = "#";</script>';
                        break;
                    case "user":
                        $_SESSION['username'] = $memberUsername;
                        echo '<script type="text/javascript">location.href = "#";</script>';
                    break;
                    case "talent":
                        $_SESSION['username'] = $memberUsername;
                        echo '<script type="text/javascript">location.href = "#";</script>';
                    break;
                    default:
                        echo "<script type='text/javascript'>alert('Something went wrong.Please try again!');</script>";
                        echo '<script type="text/javascript">location.href = "login2.php";</script>';
                }
            }
            else
            {
                //This is happening if the username and password do not match
                session_destroy();
                echo "<script type='text/javascript'>alert('Incorrect username or password.Please try again');</script>";
                echo '<script type="text/javascript">location.href = "login2.php";</script>';
            }
        }
        else
        {
            //This is happening when the database is empty.
            session_destroy();
            echo "<script type='text/javascript'>alert('The username can not be found.Please try again!');</script>";
            echo '<script type="text/javascript">location.href = "login2.php";</script>';
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('The connection can not be establish.Please try again later!');</script>";
        echo '<script type="text/javascript">location.href = "login2.php";</script>';
    }
}
?>