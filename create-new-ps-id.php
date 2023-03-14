<?php

    include "connection.php";
    
    $studentID = $_POST['StudentID'];
    
    $sql = "SELECT * FROM Statement_tbl";
    $statementIDs = [];
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                array_push($GLOBALS["statementIDs"], $row['StatementID']);
            }
        } 
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
    $lastStatementID = $statementIDs[sizeof($statementIDs)-1];
    $statementID = $lastStatementID + 1;
    
    
    $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','0','', '', '', '', '', '', '', '', '', '', '', '', '', 'ongoing',now())";
    
    if (!mysqli_query($conn, $sql)){
        echo "fail";
    }
    
    
    $sql2 = "INSERT INTO `Main_tbl`(`StudentID`, `TutorID`, `StatementID`) VALUES ('$studentID','00','$statementID')";
    mysqli_query($conn, $sql2);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    


  </head>


  <body>

    
    
    <form id="goToFirstPage" action="creating_ps_page" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='0'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='VersionIDField' name="VersionID" value='0'/>
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




