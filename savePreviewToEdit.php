<?php

    include "connection.php";
    
    $statementID = $_POST['StatementID'];
    $studentID = $_POST['StudentID'];
    $par1 = $_POST['q1'];
    $par2 = $_POST['q2'];
    $par3 = $_POST['q3'];
    $par4 = $_POST['q4'];
    $par5 = $_POST['q5'];
    $par6 = $_POST['q6'];
    
    $sql = "UPDATE Statement_tbl SET StatementQ1='$par1', StatementQ2='$par2', StatementQ3='$par3', StatementQ4='$par4', StatementQ5='$par5', StatementQ6='$par6', LastSaved=now(), StatementStatus='ongoing' WHERE StatementID=" . $statementID . ";";
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

    
    
    <form id="goToStatement" action="editing_ps_page_preview.php" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementIDLoc" value='-'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    



    <script>
        var studentID = '<?= $studentID ?>';
        var statementID = '<?= $statementID ?>';
        
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("hiddenSubmitButton").click();
        

        
        
    </script>

  </body>
</html>




