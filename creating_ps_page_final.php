<?php

    include "connection.php";
    
    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    
    

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <link rel="stylesheet" href="creating_ps_page_final.css">
    </head>
    
    <body>
        
        
        <div class="qs" id="q1" style="">
            <h3><i>Please include any comments you would like you tutor to see</i></h3>
            <textarea id="commentsToTutor" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" placeholder="Comments here..."></textarea>
            <br>
        </div>
        
        <form id="parSave" action="finalSubmit.php" method="POST">
            <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
            <input type='hidden' id='StatementIDField' name="StatementID" value='1'/>
            <input type='hidden' id='VersionIDField' name="VersionID"/>
            <input type='hidden' id='commentsField' name="comments" value='1'/>
            <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
        </form>
        
        <br>
        <br>
        <br>
        <div class="wrapper" style="margin: auto;">
          <button class="saveButton" id="saveButton" onclick="submit()"><span>SUBMIT</span></button>
        </div>
        
        
        
        <script>
        
            function submit(){
                var comments = document.getElementById("commentsToTutor").value;
                
                var studentID = '<?= $studentID ?>';
                var statementID = '<?= $statementID ?>';
                var versionID = '<?= $versionID ?>';
                
                document.getElementById("StudentIDField").value = studentID;
                document.getElementById("StatementIDField").value = statementID;
                document.getElementById("VersionIDField").value = versionID;
                document.getElementById("commentsField").value = comments;
                document.getElementById("hiddenSubmitButton").click();
                
            }
        
        
        </script>
        
        
        
    </body>

    
    
</html>


