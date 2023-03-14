<?php

    include "connection.php";
    
    $student = $_POST['Student'];
    $subjectPOST = $_POST['Subject'];
    $body = $_POST['Body'];
    $emails = [];
    $sql = "SELECT * FROM Student_tbl;";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($emails, $row['StudentEmail']);
        }
    }
    
    if ($student === 0) {
        $to = implode(", ", $emails);
    }else {
        $email = $emails[$student-1];
        $to = $email;
    }
    
    $subject = $subjectPOST;
    $message = $body;
    $headers = "From: support@ieatlas.co.uk\r\n";
    $headers .= "Reply-To: support@ieatlas.co.uk\r\n";
    $headers .= "Return-Path: support@ieatlas.co.uk\r\n";
    $retval = mail ($to,$subject,$message,$headers);


    if( $retval == true ) {
        $message = "Email Sent!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location = 'home_page_tutor';</script>";
    }else {
        $message = "Could Not Send Email!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // echo "<script type='text/javascript'>window.location = 'email';</script>";
    }
    
?>