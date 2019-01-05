<?php

if(isset($_POST['submit'])){
    include_once 'include-database.php';

    $first = mysqli_real_escape_string($connection, $_POST['firstname']);

    $last = mysqli_real_escape_string($connection, $_POST['lastname']);
    
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    
    $userid = mysqli_real_escape_string($connection, $_POST['username']);
    
    $passwd = mysqli_real_escape_string($connection, $_POST['password']);

    //Checking for errors

    if(empty($first) || empty($last) || empty($email) || empty($userid) || empty($passwd)){
        header("Location: ../pages/register.php?signup=empty");
        exit();
    }
    else{

        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            
            header("Location: ../pages/register.php?signup=invalid");

            exit();

        }
        else{

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                header("Location: ../pages/register.php?signup=email");

                exit();

            }
            else{

                $sqlCheck = "SELECT * FROM usercredentials WHERE user_userid='$userid'";

                $result = mysqli_query($connection, $sql);

                $check = mysqli_num_rows($result);

                if($check > 0){

                    header("Location: ../pages/register.php?signup=usertaken");

                    exit();

                }
                else{

                    $passwdhash = password_hash($passwd, PASSWORD_DEFAULT);

                    $sqlInsert = "INSERT INTO usercredentials (user_firstname, user_lastname, 
                    user_email, user_userid, user_password) VALUES ('$first', '$last', '$email', 
                    '$userid', '$passwdhash');";

                    mysqli_query($connection, $sqlInsert);

                    header("Location: ../pages/register.php?signup=success");

                    exit();

                }
            }
        }
    }

} 
else{
    header("Location: ../pages/signup.php");
    exit();
}

?>