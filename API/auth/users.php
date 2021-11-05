<?php include("../../database/db.php"); ?>
<?php


    $username;
    $md5password = md5($password);

    $query = sprintf("SELECT * FROM users WHERE username = '$username' AND password = '$md5password'");
    $result = mysqli_query($connection, $query);

    if($result){

    }else{
        
    }

?>