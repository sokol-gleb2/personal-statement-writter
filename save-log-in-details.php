<?php

    include "connection.php";
    
    $name = $_POST['StudentName'];
    $email = $_POST['StudentEmail'];
    $username = $_POST['StudentUsername'];
    $password= $_POST['StudentPassword'];
    
    $sql = "INSERT INTO `Student_tbl`(`StudentName`, `StudentEmail`, `StudentUsername`, `StudentPassword`) 
    VALUES ('$name','$email','$username','$password');";
    // if (!mysqli_query($conn, $sql)){
    //     echo "failure";    
    // }
    mysqli_query($conn, $sql);

    header("Location: log_in_page.php?save=success");
?>