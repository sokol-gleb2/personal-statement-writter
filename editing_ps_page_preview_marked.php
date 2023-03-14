<?php

    include "connection.php";
    
    session_start();
 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: log_in_page.php");
        exit;
    }
    
    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];

    $sql = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statementID . " AND VersionID='$versionID';";
    
    $statementQ1 = "-";
    $statementQ2 = "-";
    $statementQ3 = "-";
    $statementQ4 = "-";
    $statementQ5 = "-";
    $statementQ6 = "-";
    $notesQ1 = "-";
    $notesQ2 = "-";
    $notesQ3 = "-";
    $notesQ4 = "-";
    $notesQ5 = "-";
    $notesQ6 = "-";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_array($result)){
                $GLOBALS["statementQ1"] = $row['StatementQ1'];
                $GLOBALS["statementQ2"] = $row['StatementQ2'];
                $GLOBALS["statementQ3"] = $row['StatementQ3'];
                $GLOBALS["statementQ4"] = $row['StatementQ4'];
                $GLOBALS["statementQ5"] = $row['StatementQ5'];
                $GLOBALS["statementQ6"] = $row['StatementQ6'];
                
                $GLOBALS["notesQ1"] = $row['TutorNotesQ1'];
                $GLOBALS["notesQ2"] = $row['TutorNotesQ2'];
                $GLOBALS["notesQ3"] = $row['TutorNotesQ3'];
                $GLOBALS["notesQ4"] = $row['TutorNotesQ4'];
                $GLOBALS["notesQ5"] = $row['TutorNotesQ5'];
                $GLOBALS["notesQ6"] = $row['TutorNotesQ6'];
                
            }
        }else{
            echo "No records matching your query were found.";
        }
    }else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="editing_ps_page_preview_marked.css">
    <meta charset="utf-8">
    <title>Edit by Paragraph</title>

    <div id="header" >
        
        <div>
            <img id="menuLogo" onclick="home_button()" src="MenuLogoAtlas.png" align="left" onclick="goToHome()">
        </div><!--
        --><div class="header">
          <button class="home_button" onclick="home_button()" style="font-size: 17px; color: #a31621"><b>HOME</b></button>
          <button class="home_button" onclick="whyAtlas()" style="font-size: 17px; color: #a31621"><b>WHY ATLAS</b></button>
          <button class="home_button" onclick="faq_button()" style="font-size: 17px; color: #a31621"><b>FAQs</b></button>
          <button class="home_button" onclick="save_button()" style="font-size: 17px; color: #a31621"><b>SAVE</b></button>
          <button class="home_button" onclick="exit_button()" style="font-size: 17px; color: #a31621"><b>EXIT</b></button>
        </div>



    </div>
    <br>
    <br>
  </head>
  <body>

    





    <!-- QUESTIONS -->

    <div style="padding-top: 20px; padding-right: 10px;">

      <div class="qs" id="q1" style="display:inline-block; width: 70%; padding-left: 5px; padding-right: 5px">
        <h3>What did you enjoy doing as a child that showed your early aptitude for your chosen university subject?</h3>
        <textarea id="q1Text" name="paragraph_text" oninput="wordCount()"  rows="15" class="textBox" value="-" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q1count">0</span>
        </p>
      </div><!--
      --><div class="tutorNotes" style="display:inline-block; width: 25%; padding-left: 5px; padding-right: 5px; margin-left: 5px;">
          <h1 style="color: #a31621">Tutor Notes:</h1>
          <textarea id="q1Notes" rows="20" style="width: 100%; height: 100%; resize: none;" placeholder="Enter you comments here..." readonly></textarea>
      </div>
      <br>
      
      <!-- <br> -->

      <div class="qs" id="q2" style="display:inline-block; width: 70%; padding-left: 5px; padding-right: 5px">
        <h3>What is your earliest memory of an event or situation that showed interest in your subject.
          (It could be conversations with parents or insights into their jobs and interests etc, some event that struck you as powerful or things you watched or read that sparked your curiosity).</h3>
        <textarea id="q2Text" name="paragraph_text" oninput="wordCount()"  rows="15" class="textBox" value="-" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q2count">0</span>
        </p>
      </div><!--
      --><div class="tutorNotes" style="display:inline-block; width: 25%; padding-left: 5px; padding-right: 5px; margin-left: 5px;">
          <textarea id="q2Notes" rows="23" style="width: 100%; height: 100%; resize: none;" placeholder="Enter you comments here..." readonly></textarea>
      </div>
      <br>



      <div class="qs" id="q3" style="display:inline-block; width: 70%; padding-left: 5px; padding-right: 5px">
        <h3>In science – did you find something – a fossil or a saw a fascinating bird or a skeleton;
          in maths, did you have to calculate something and found you were good at it; in humanities, did you read or observe something that showed you have an early inclination or ability to analyse ideas or stories or arguments?</h3>
        <textarea id="q3Text" name="paragraph_text" oninput="wordCount()"  rows="15" class="textBox" value="-" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q3count">0</span>
        </p>
      </div><!--
      --><div class="tutorNotes" style="display:inline-block; width: 25%; padding-left: 5px; padding-right: 5px; margin-left: 5px;">
          <textarea id="q3Notes" rows="23" style="width: 100%; height: 100%; resize: none;" placeholder="Enter you comments here..." readonly></textarea>
      </div>
      <br>



      <div class="qs" id="q4" style="display:inline-block; width: 70%; padding-left: 5px; padding-right: 5px">
        <h3>If it was a gradual realisation, what circumstances led you become interested in your subject?</h3>
        <textarea id="q4Text" name="paragraph_text" oninput="wordCount()"  rows="15" class="textBox" value="-" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q4count">0</span>
        </p>
      </div><!--
      --><div class="tutorNotes" style="display:inline-block; width: 25%; padding-left: 5px; padding-right: 5px; margin-left: 5px;">
          <textarea id="q4Notes" rows="20" style="width: 100%; height: 100%; resize: none;" placeholder="Enter you comments here..." readonly></textarea>
      </div>
      <br>



      <div class="qs" id="q5" style="display:inline-block; width: 70%; padding-left: 5px; padding-right: 5px">
        <h3>Is there a big idea that sparked your interest and how did it come about?</h3>
        <textarea id="q5Text" name="paragraph_text" oninput="wordCount()"  rows="15" class="textBox" value="-" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q5count">0</span>
        </p>
      </div><!--
      --><div class="tutorNotes" style="display:inline-block; width: 25%; padding-left: 5px; padding-right: 5px; margin-left: 5px;">
          <textarea id="q5Notes" rows="20" style="width: 100%; height: 100%; resize: none;" placeholder="Enter you comments here..." readonly></textarea>
      </div>
      <br>



      <div class="qs" id="q6" style="display:inline-block; width: 70%; padding-left: 5px; padding-right: 5px">
        <h3>6. Summarise why you want to study your subject and what you wish to get out of studying your subject. Try to relate this paragraph back to your 1st paragraph.</h3>
        <textarea id="q6Text" name="paragraph_text" oninput="wordCount()"  rows="15" class="textBox" value="-" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q6count">0</span>
        </p>
      </div><!--
      --><div class="tutorNotes" style="display:inline-block; width: 25%; padding-left: 5px; padding-right: 5px; margin-left: 5px;">
          <textarea id="q6Notes" rows="21" style="width: 100%; height: 100%; resize: none;" placeholder="Enter you comments here..." readonly></textarea>
      </div>


    </div>
    
    
    <form id="scoreSubmit" action="savedNewVersion.php" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='q1Field' name="q1" value='1'/>
        <input type='hidden' id='q2Field' name="q2" value='1'/>
        <input type='hidden' id='q3Field' name="q3" value='1'/>
        <input type='hidden' id='q4Field' name="q4" value='1'/>
        <input type='hidden' id='q5Field' name="q5" value='1'/>
        <input type='hidden' id='q6Field' name="q6" value='1'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    

    <br>
    <br>
    <br>
    <div class="wrapper" style="margin: auto;">
      <button class="saveButton" id="saveButton" onclick="save()"><span>SAVE</span></button>
    </div>


    <script>

        var studentPar1 = <?php echo json_encode($statementQ1); ?>;
        var studentPar2 = <?php echo json_encode($statementQ2); ?>;
        var studentPar3 = <?php echo json_encode($statementQ3); ?>;
        var studentPar4 = <?php echo json_encode($statementQ4); ?>;
        var studentPar5 = <?php echo json_encode($statementQ5); ?>;
        var studentPar6 = <?php echo json_encode($statementQ6); ?>;
        
        
        document.getElementById('q1Text').value = studentPar1;
        document.getElementById('q2Text').value = studentPar2;
        document.getElementById('q3Text').value = studentPar3;
        document.getElementById('q4Text').value = studentPar4;
        document.getElementById('q5Text').value = studentPar5;
        document.getElementById('q6Text').value = studentPar6;
        
        
        var notesPar1 = <?php echo json_encode($notesQ1); ?>;
        var notesPar2 = <?php echo json_encode($notesQ2); ?>;
        var notesPar3 = <?php echo json_encode($notesQ3); ?>;
        var notesPar4 = <?php echo json_encode($notesQ4); ?>;
        var notesPar5 = <?php echo json_encode($notesQ5); ?>;
        var notesPar6 = <?php echo json_encode($notesQ6); ?>;
        
        
        document.getElementById('q1Notes').value = notesPar1;
        document.getElementById('q2Notes').value = notesPar2;
        document.getElementById('q3Notes').value = notesPar3;
        document.getElementById('q4Notes').value = notesPar4;
        document.getElementById('q5Notes').value = notesPar5;
        document.getElementById('q6Notes').value = notesPar6;
        

      


      var words = document.getElementById("q1Text").value.length;
      var words2 = document.getElementById("q2Text").value.length;
      var words3 = document.getElementById("q3Text").value.length;
      var words4 = document.getElementById("q4Text").value.length;
      var words5 = document.getElementById("q5Text").value.length;
      var words6 = document.getElementById("q6Text").value.length;


      


      // Display it as output
      document.getElementById("q1count").innerHTML = words;
      document.getElementById("q2count").innerHTML = words2;
      document.getElementById("q3count").innerHTML = words3;
      document.getElementById("q4count").innerHTML = words4;
      document.getElementById("q5count").innerHTML = words5;
      document.getElementById("q6count").innerHTML = words6;



    function save(){
        
        
      var q1 = document.getElementById("q1Text").value;
      var q2 = document.getElementById("q2Text").value;
      var q3 = document.getElementById("q3Text").value;
      var q4 = document.getElementById("q4Text").value;
      var q5 = document.getElementById("q5Text").value;
      var q6 = document.getElementById("q6Text").value;
      
      document.getElementById("q1Field").value = q1;
      document.getElementById("q2Field").value = q2;
      document.getElementById("q3Field").value = q3;
      document.getElementById("q4Field").value = q4;
      document.getElementById("q5Field").value = q5;
      document.getElementById("q6Field").value = q6;
      
      document.getElementById("StudentIDField").value = '<?= $studentID ?>';
      document.getElementById("StatementIDField").value = '<?= $statementID ?>';
      
      document.getElementById("hiddenSubmitButton").click();

      
      
      //location.href = "creating_ps_page_final.html";

      

    }


    function goToQuestion2(){
      save();
      location.href = "creating_ps_page_q2.html";
    }

    function goToQuestion3(){
      save();
      location.href = "creating_ps_page_q3.html";
    }

    function goToQuestion4(){
      save();
      location.href = "creating_ps_page_q4.html";
    }

    function goToQuestion5(){
      save();
      location.href = "creating_ps_page_q5.html";
    }

    function goToQuestion6(){
      save();
      location.href = "creating_ps_page_q6.html";
    }


    function goToPreview(){
      // save();
      location.href = "creating_ps_page_preview.html";
    }


    </script>

  </body>
</html>
