<?php

    include "connection.php";
    
    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    $comments = $_POST['comments'];
    
    $sql = "UPDATE Statement_tbl SET StudentComments='$comments', StatementStatus='submitted' WHERE StatementID=" . $statementID . " AND VersionID='$versionID';";
    
    // if (!mysqli_query($conn, $sql)){
    //     echo "failure";    
    // }
    mysqli_query($conn, $sql);
    
    
?>
   <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    


  </head>


  <body>

    
    
    <form id="goToHome" action="home_page_student.php" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    



    <script>
        var studentID = '<?= $studentID ?>';
        
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("hiddenSubmitButton").click();
        

        
        
    </script>

  </body>
</html>