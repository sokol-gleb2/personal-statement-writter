<?php

    include "connection.php";
    
    $TutorID = $_POST['TutorID'];
    
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    $par1 = $_POST['q1'];
    $par2 = $_POST['q2'];
    $par3 = $_POST['q3'];
    $par4 = $_POST['q4'];
    $par5 = $_POST['q5'];
    $par6 = $_POST['q6'];
    
    // $sql = "UPDATE Statement_tbl SET StatementStatus='marked', TutorNotesQ1='$par1', TutorNotesQ2='$par2', TutorNotesQ3='$par3', TutorNotesQ4='$par4', TutorNotesQ5='$par5', TutorNotesQ6='$par6'  WHERE StatementID=" . $statementID . " AND VersionID='$versionID';";
    $sql = "UPDATE `Statement_tbl` SET `TutorNotesQ1`='$par1',`TutorNotesQ2`='$par2',`TutorNotesQ3`='$par3',`TutorNotesQ4`='$par4',`TutorNotesQ5`='$par5',`TutorNotesQ6`='$par6', `StatementStatus`='marked',`LastSaved`=now() WHERE `StatementID`='$statementID' AND `VersionID`='$versionID';";
    // $error = "";
    // if ($result = mysqli_query($conn, $sql)){
    //     echo "success";
    // }else {
    //     echo "failure";
    // }
    
    // mysqli_query($conn, $sql);
    if ($conn->query($sql) === TRUE) {
        
    } else {
      echo "Error updating record: " . $conn->error;
    }

    
    
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    


  </head>


  <body>

    
    
    <form id="goToHomePage" action="home_page_tutor.php" method="POST">
        <input type='hidden' id='TutorIDField' name="TutorID" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    



    <script>
        var tutorID = '<?= $TutorID ?>';
        document.getElementById("TutorIDField").value = tutorID;
        document.getElementById("hiddenSubmitButton").click();
        
        

        
        
    </script>

  </body>
</html>


