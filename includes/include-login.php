<?php

session_start();

if(isset($_POST['submit'])){

    include 'include-database.php';

    $uid = mysqli_real_escape_string($connection, $_POST['userid']);

    $pwd = mysqli_real_escape_string($connection, $_POST['password']);

    if(empty($uid) || empty($pwd)){
        
        header("Location: ../pages/index.php?login=empty");

        exit();

    }
    else{

        $sqlSelect = "SELECT * FROM usercredentials WHERE user_userid='$uid'";

        $result = mysqli_query($connection, $sqlSelect);

        $check = mysqli_num_rows($result);

        if($check < 1){
            
            header("Location: ../pages/register.php?login=error");

            exit();
        }
        else{
              
            if($row = mysqli_fetch_assoc($result)){
                
                $passwordhash = password_verify($pwd, $row['user_password']);

                if($passwordhash == false){
            
                    header("Location: ../pages/register.php?login=error");

                    exit();
                    
                }
                elseif($passwordhash == true){

                    //login

                    $_SESSION['session_id'] = $row['user_id'];

                    $_SESSION['session_first'] = $row['user_firstname'];

                    $_SESSION['session_last'] = $row['user_lastname'];

                    $_SESSION['session_email'] = $row['user_email'];

                    $_SESSION['session_userid'] = $row['user_userid'];

                    header("Location: ../pages/register.php?login=success");

                    exit();

                }
                

            }

        }
    }
    
}
else{
    
    header("Location: ../pages/index.php?login=error");

    exit();

}

?>