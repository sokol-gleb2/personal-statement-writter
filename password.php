<?php

    include "connection.php";
    $sql_get = "SELECT * FROM `Student_tbl`";
    $result = mysqli_query($conn, $sql_get);
    $passwords = [];
    $ids = [];
    while($row = mysqli_fetch_array($result)){
        array_push($passwords, $row['StudentPassword']);
        array_push($ids, $row['StudentID']);
    }
    $sql_check = "SELECT * FROM Student_tbl WHERE StudentID=1 AND StudentPassword=PASSWORD('gleb1');";
    $result = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result) == 1){
        echo "success";    
    }else {
        echo "failure";
    }
    // $sql_get2 = "SELECT * FROM `Student_tbl`";
    // $result2 = mysqli_query($conn, $sql_get2);
    // while($row = mysqli_fetch_array($result2)){
    //     echo $row['StudentID'] . "                " . $row['StudentPassword'] . "<br>";
    // }
    

    // $hash = password_hash("hello123!", PASSWORD_DEFAULT);
    // if(password_verify("hello123!", $hash)){
    //     echo "password valid";
    // }else {
    //     echo "sucka";
    // }

?>