<?php
    include "connection.php";
    
    $error = $_POST['Error'];
    $page = $_POST['CurrPage'];
    $data = $_POST['Data'];
    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    
    $to = "support@ieatlas.co.uk";
    $subject = "Error Occurred";
         
    $message = "Student ID: " . $studentID . "; Statement ID: " . $statementID . "; Version ID: " . $versionID . "; Current Page: " . $page . "; Error: " . $error . "; Data: " . $data;
         
    // $header = "From:support@ieatlas.co.uk \r\n";
    // $header .= "MIME-Version: 1.0\r\n";
    // $header .= "Content-type: text/html\r\n";
    
    $headers = "From: support@ieatlas.co.uk\r\n";
    $headers .= "Reply-To: support@ieatlas.co.uk\r\n";
    $headers .= "Return-Path: support@ieatlas.co.uk\r\n";
    // $headers .= "CC: sombodyelse@example.com\r\n";
    // $headers .= "BCC: hidden@example.com\r\n";
         
    $retval = mail ($to,$subject,$message,$headers);
         
    if( $retval == true ) {
        $message = "The Error has Been Flagged!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else {
        $message = "Could Not Send Message";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="error.css">
    <link rel="icon" href="MenuLogoAtlas.png" >
    <title>Error Page</title>
  </head>
  <body>

    <div id="welcome_to_atlas" style="margin: auto; text-align: center; font-size: 60px; margin-top: 50px">
        <img src="AtlasError.png" style="margin: auto;">
        <p style="margin-left: 100px; margin-right: 100px; font-size: 20px;">Unfortunately, there has been an error in your previous request. Error message:</p>
        <p id="error"></p>
        <br>
        <p style="margin-left: 100px; margin-right: 100px; font-size: 20px;">We recomment you do not close this window! Please email <a href="mailto:support@ieatlas.co.uk">support@ieatlas.co.uk</a> and ask for you plan of action.</p>
    </div>
    
    <script>
        var error = <?php echo json_encode($error); ?>;
        document.getElementById("error").innerHTML = error;
        
    </script>

  </body>
</html>
