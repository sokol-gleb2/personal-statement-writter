<?php

    include "connection.php";
    
    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    $newVersion = $_POST['NewVersion'];
    $nextQ = $_POST['NextQ'];
    $currentQ = $_POST['CurrentQ'];
    $isError = false;
    $error = "";
    $data = [];
    
    
    // $date = date('Y-m-d');
    $date = new DateTime();
    $lastSaved;
    
    $q1 = "";
    $q2 = "";
    $q3 = "";
    $q4 = "";
    $q5 = "";
    $q6 = "";
    
    
    $sql0 = "SELECT * FROM Statement_tbl WHERE StatementID='$statementID' AND VersionID='$versionID';";
    if($result = mysqli_query($conn, $sql0)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $GLOBALS["lastSaved"] = $row['LastSaved'];
                $GLOBALS["q1"] = $row['StatementQ1'];
                $GLOBALS["q2"] = $row['StatementQ2'];
                $GLOBALS["q3"] = $row['StatementQ3'];
                $GLOBALS["q4"] = $row['StatementQ4'];
                $GLOBALS["q5"] = $row['StatementQ5'];
                $GLOBALS["q6"] = $row['StatementQ6'];
                
                        
            }
            
        }
    }else {
        $isError = true;
        $error = error;
        array_push($data, $sql0);
    }
    $dateLastSaved = new DateTime($lastSaved);
    // $dateSaved = strtotime($lastSaved);
    // $dateLastSaved = date('Y-m-d', $dateSaved);
    
    
    $numberOfVersions = [];
    $sql2 = "SELECT * FROM Statement_tbl WHERE StatementID='$statementID';";
    if($result = mysqli_query($conn, $sql2)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                array_push($GLOBALS["numberOfVersions"], $row["VersionID"]);
                        
            }
            
        }
    }else {
        $isError = true;
        $error = error;
        array_push($data, $sql0);
    }
    $finalVersion = end($numberOfVersions);
    
    
    $statement = "StatementQ" . $currentQ;

    $par1 = $_POST['q1'];
    $par2 = $_POST['q2'];
    $par3 = $_POST['q3'];
    $par4 = $_POST['q4'];
    $par5 = $_POST['q5'];
    $par6 = $_POST['q6'];
    
    $par = "";
    
    
    if ($currentQ == 1){
        $par = $par1;
    }elseif ($currentQ == 2){
        $par = $par2;
    }elseif ($currentQ == 3){
        $par = $par3;
    }elseif ($currentQ == 4){
        $par = $par4;
    }elseif ($currentQ == 5){
        $par = $par5;
    }elseif ($currentQ == 6){
        $par = $par6;
    }
    //date_diff($date, $dateLastSaved)->format("%R%a") < -1
    $newVersionID = 0;
    if (($newVersion === "true") && ($dateLastSaved->diff($date)->format("%d") > 1)){
        $newVersionID = intval($finalVersion) + 1;
        $sql = "";
        $errorPar = "";
        
        if ($currentQ == 1){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID', '$par', '$q2', '$q3', '$q4', '$q5', '$q6', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 1: " . $par;
        }elseif ($currentQ == 2){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID','$q1', '$par', '$q3', '$q4', '$q5', '$q6', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 2: " . $par;
        }elseif ($currentQ == 3){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID','$q1', '$q2', '$par', '$q4', '$q5', '$q6', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 3: " . $par;
        }elseif ($currentQ == 4){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID','$q1', '$q2', '$q3', '$par', '$q5', '$q6', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 4: " . $par;
        }elseif ($currentQ == 5){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID','$q1', '$q2', '$q3', '$q4', '$par', '$q6', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 5: " . $par;
        }elseif ($currentQ == 6){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID','$q1', '$q2', '$q3', '$q4', '$q5', '$par', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 6: " . $par;
        }elseif ($currentQ == "preview"){
            $sql = "INSERT INTO `Statement_tbl`(`StatementID`, `VersionID`, `StatementQ1`, `StatementQ2`, `StatementQ3`, `StatementQ4`, `StatementQ5`, `StatementQ6`, `TutorNotesQ1`, `TutorNotesQ2`, `TutorNotesQ3`, `TutorNotesQ4`, `TutorNotesQ5`, `TutorNotesQ6`, `StudentComments`, `StatementStatus`, `LastSaved`) VALUES ('$statementID','$newVersionID','$par1', '$par2', '$par3', '$par4', '$par5', '$par6', '', '', '', '', '', '', '', 'ongoing',now())";
            $errorPar = "Par 1: " . $par1 . "; Par 2: " . $par2 . "; Par 3: " . $par3 . "; Par 4: " . $par4 . "; Par 5: " . $par5 . "; Par 6: " . $par6 . ";";
        }
        
        //need to create a new version and copy all the old answers over to the new version
        
    
        if (!mysqli_query($conn, $sql)){
            $isError = true;
            $error = error;
            array_push($data, $sql);
            array_push($data, $errorPar);
        }
        
        
        
    }else{
        
        if ($currentQ == "preview"){
            // echo $q1;
            $sql = "UPDATE `Statement_tbl` SET `StatementQ1`='$par1', `StatementQ2`='$par2', `StatementQ3`='$par3', `StatementQ4`='$par4', `StatementQ5`='$par5', `StatementQ6`='$par6', `LastSaved`=now() WHERE StatementID='$statementID' AND VersionID='$versionID';";
        }else{
            $sql = "UPDATE `Statement_tbl` SET $statement='$par', `LastSaved`=now() WHERE StatementID='$statementID' AND VersionID='$versionID';";
        }
        
        if (!mysqli_query($conn, $sql)){
            $isError = true;
            $error = error;
            array_push($data, $sql);
            array_push($data, $errorPar);
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    


  </head>


  <body>

    
    
    <form id="goToFirstPage" action="creating_ps_page_q2" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='0'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='VersionIDField' name="VersionID" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="goToError" action="error" method="POST">
        <input type='hidden' id='errorStudentIDField' name="StudentID" value='0'/>
        <input type='hidden' id='errorStatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='errorVersionIDField' name="VersionID" value='0'/>
        <input type='hidden' id='errorDataField' name="Data" value='0'/>
        <input type='hidden' id='errorCurrPageField' name="CurrPage" value='0'/>
        <input type='hidden' id='errorErrorField' name="Error" value='0'/>
        <button type='submit' id="errorHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    



    <script>
        var studentID = <?php echo json_encode($studentID); ?>;
        var statementID = <?php echo json_encode($statementID); ?>;
        var versionID = <?php echo json_encode($versionID); ?>;
        var newVersionID = <?php echo json_encode($newVersionID); ?>;
        var currQ = <?php echo json_encode($currentQ); ?>;
        var nextQ = <?php echo json_encode($nextQ); ?>;
        var isError = <?php echo json_encode($isError); ?>;
        if (isError === true) {
            var error = <?php echo json_encode($error); ?>;
            var data = <?php echo json_encode($data); ?>;
            document.getElementById("errorStudentIDField").value = studentID;
            document.getElementById("errorStatementIDField").value = statementID;
            document.getElementById("errorVersionIDField").value = versionID;
            document.getElementById("errorDataIDField").value = dataID;
            document.getElementById("errorCurrPageField").value = currQ;
            document.getElementById("errorErrorField").value = error;
            document.getElementById("errorHiddenSubmitButton").click();
        }else {
            var action = "home_page";
            if (nextQ == 'preview'){
                action = "creating_ps_page_preview";
            }else if (nextQ == 'home'){
                action = "home_page_student";
            }
            
            else if (nextQ == '1'){
                action = "creating_ps_page";
            }else if (nextQ == 'final'){
                action = "creating_ps_page_final";
            }else {
                action = "creating_ps_page_q"+nextQ;
            }
            
            document.getElementById("goToFirstPage").action = action;
            document.getElementById("StudentIDField").value = studentID;
            document.getElementById("StatementIDField").value = statementID;
            if (newVersionID == '0'){
                document.getElementById("VersionIDField").value = versionID;    
            }else{
                document.getElementById("VersionIDField").value = newVersionID;    
            }
            document.getElementById("hiddenSubmitButton").click();    
        }
        
        
        

        
        
    </script>

  </body>
</html>