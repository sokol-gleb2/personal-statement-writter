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
    $final = $versionID;
    
    
    $sql0 = "SELECT * FROM Statement_tbl WHERE StatementID='$statementID' AND VersionID='$final';";
    $q1 = "";
    $q2 = "";
    $q3 = "";
    $q4 = "";
    $q5 = "";
    $q6 = "";
    
    if($result = mysqli_query($conn, $sql0)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $GLOBALS["q1"] = $row['StatementQ1'];
                $GLOBALS["q2"] = $row['StatementQ2'];
                $GLOBALS["q3"] = $row['StatementQ3'];
                $GLOBALS["q4"] = $row['StatementQ4'];
                $GLOBALS["q5"] = $row['StatementQ5'];
                $GLOBALS["q6"] = $row['StatementQ6'];
                        
            }
            
        }
    }
            

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Preview</title>

    <link rel="stylesheet" href="creating_ps_page_preview.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    
    
    

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

    <!-- Questions/Preview Banner -->
    
    <div class="outer">
      <button class="banner" style="height: 60px" onclick="goToQuestions()">Questions</button>
      <button class="banner">PREVIEW</button>
      <button class="banner" style="height: 60px" onclick="save()">FINAL</button>
    </div>
    
    <br>
    <br>
    

    
    <div id="container" class="container">
      <div style="text-align: center">
        <h1 style="color: #A31621">Looks too big and scary?</h1>
      </div>
      <div style="padding: 20px">
        <h2>That's alright. You can edit your personal statement by paragraph.</h2>
        <h2> Just click the "Questions" button at the top:</h2>
        <img src="parEditImg.png">
        <br>
        <h2>When done, make sure to either click the "FINAL" button at the top or "FINAL AND SUBMIT" at the bottom :)</h2>
      </div>
      <div style="text-align: center; margin-top: 20px; margin-bottom: 10px">
        <button type="button" class="btn_cancel" onclick="closePopUp()">Close</button>
      </div>
    </div>
    
    <div id="container2" class="container closed">
        <h1 style="color: #A31621; margin-left: 5px">Paragraph Questions:</h1>
      <p style="margin-left: 30px; font-size: 18px; margin-top: 30px; font-family: Ariel;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>1st Paragraph:</b></i> What event triggered your passion for your subject?
 
      </p>
      <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; font-family: Ariel;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>2nd Paragraph:</b></i> How do your combination of A level subjects and skills demonstrate
that you would make a good student for your chosen subject?

      </p>
      <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; font-family: Ariel;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>3rd Paragraph:</b></i> What particular areas of your subject (i.e. concepts and theories) do you find most interesting and why?

      </p>
      <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; font-family: Ariel;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>4th Paragraph:</b></i> How have you developed these areas of interest beyond work set in class? Include school trips/personal projects, work experience and subject-related extra-curricular activities.

      </p>
      <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; font-family: Ariel;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>5th Paragraph:</b></i> Extra-curricular activities, achievements and honours NOT related to your subject (this should form a short penultimate paragraph)

      </p>
      <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; font-family: Ariel;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i style="color: #A31621"><b style="color: #A31621">6th Paragraph:</b></i> Summarise why you want to study your subject and what you wish to get out of studying your subject. Try to relate this paragraph back to your 1st paragraph.

      </p>
      <div style="text-align: center; margin-top: 20px; margin-bottom: 10px">
        <button type="button" class="btn_cancel" onclick="closePopUp()">Close</button>
      </div>
    </div>
    

    <div id="parEdit">
      <button id="parEditButton" onclick="questionsPopUp()">Paragraph questions</button>
    </div>

    
    <div style="width: 100%; text-align: center">
        <textarea id="data_goes_here" oninput="characterCount()" style="line-height: 120%; font-family: Helvetica Neue Roman; font-size: 17px; width: 98%; height: 600px; padding: 10px" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="totalCount">0</span>
        </p>
    </div>

    
    <!------------------------------>

    <br>
    <br>
    <br>
    <div class="wrapper" style="margin: auto;">
      <button class="saveButton" id="saveButton" onclick="save()"><span>FINAL AND SUBMIT</span></button>
    </div>
    
    <form id="parSave" action="edit_by_par.php" method="POST">
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
    
    
    <form id="backToQs" action="save.php" method="POST">
        <input type='hidden' id='backStudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='backStatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='backVersionIDField' name="VersionID"/>
        <input type='hidden' id='backq1Field' name="q1" value='1'/>
        <input type='hidden' id='backq2Field' name="q2" value='1'/>
        <input type='hidden' id='backq3Field' name="q3" value='1'/>
        <input type='hidden' id='backq4Field' name="q4" value='1'/>
        <input type='hidden' id='backq5Field' name="q5" value='1'/>
        <input type='hidden' id='backq6Field' name="q6" value='1'/>
        <input type='hidden' id='nextQ' name="NextQ" value='1'/>
        <input type='hidden' id='currentQ' name="CurrentQ" value='preview'/>
        <input type='hidden' id='newVersion' name="NewVersion" value='true'/>
        <button type='submit' id="backhiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    
    <form id="faqPage" action="FAQs" method="POST">
        <input type='hidden' id='faqStudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='faqStatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='faqVersionIDField' name="VersionID" value='0'/>
        <input type='hidden' id='faqCurrentQ' name="NextQ" value='preview'/>
        <button type='submit' id="faqHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="whyAtlas" action="whyAtlas" method="POST">
        <input type='hidden' id='whyAtlasStudentID' name="StudentID" value='0'/>
        <input type='hidden' id='whyAtlasStatementID' name="StatementID" value='0'/>
        <input type='hidden' id='whyAtlasVersionID' name="VersionID" value='0'/>
        <input type='hidden' id='whyAtlasCurrPage' name="CurrPage" value='preview'/>
        <button type='submit' id="whyAtlasSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <div style="text-align: center; margin-top: 30px">
        2022 © Insight Education Ltd | All Rights Reserved | Company Registration Number: 8934853
    </div>
    

    
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
    <script>
    
    function questionsPopUp(){
        document.getElementById("container2").classList.remove("closed");
    }
    
    function characterCount(){
      var words = document.getElementById("data_goes_here").value;
      var count = 0;
      var split = words.split('');
      
      for (var i = 0; i < split.length; i++) {
          if (split[i] != "") {
              count += 1;
          }
      }
      
      // Display it as output
      document.getElementById("totalCount").innerHTML = count;
      
    }
    
    
        function closePopUp(){
          document.getElementById("container").classList.add("closed");
          document.getElementById("container2").classList.add("closed");
        }
        
        
        var par1 = <?php echo json_encode($q1); ?>;
        var par2 = <?php echo json_encode($q2); ?>;
        var par3 = <?php echo json_encode($q3); ?>;
        var par4 = <?php echo json_encode($q4); ?>;
        var par5 = <?php echo json_encode($q5); ?>;
        var par6 = <?php echo json_encode($q6); ?>;
        var preview = par1 + "\n" + "\n" + par2 + "\n" + "\n" + par3 + "\n" + "\n" + par4 + "\n" + "\n" + par5 + "\n" + "\n" + par6;
        document.getElementById("data_goes_here").value = preview;
        
        
        
        var words = preview;
        if (words.length != 0){
            var count = 0;
            var split = words.split('');
          
            for (var i = 0; i < split.length; i++) {
                if (split[i] != "") {
                    count += 1;
                }
            }
          
            // Display it as output
            document.getElementById("totalCount").innerHTML = count;    
        }else{
            document.getElementById("totalCount").innerHTML = '0';
        }
        


        function save(){
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var q1 = paragraphs[0];
            var q2 = paragraphs[1];
            var q3 = paragraphs[2];
            var q4 = paragraphs[3];
            var q5 = paragraphs[4];
            // var par6 = paragraphs[5:(paragraphs.length-1)];
            var q6 = ""
            for (let i = 5; i < paragraphs.length; i++){
                par6 += paragraphs[i]+"\n";
            }
            
            if ((q1 === par1) && (q2 === par2) && (q3 === par3) && (q4 === par4) && (q5 === par5) && (q6 === par6)){
                document.getElementById("newVersion").value = "false";
            }
            
            document.getElementById("nextQ").value = "final";
            
            document.getElementById("backq1Field").value = q1;
            document.getElementById("backq2Field").value = q2;
            document.getElementById("backq3Field").value = q3;
            document.getElementById("backq4Field").value = q4;
            document.getElementById("backq5Field").value = q5;
            document.getElementById("backq6Field").value = q6;
            document.getElementById("backStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("backStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("backVersionIDField").value = '<?= $final ?>';
            document.getElementById("backhiddenSubmitButton").click();
          
        }

        

        function goToQuestions(){
            
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var q1 = paragraphs[0];
            var q2 = paragraphs[1];
            var q3 = paragraphs[2];
            var q4 = paragraphs[3];
            var q5 = paragraphs[4];
            // var par6 = paragraphs[5:(paragraphs.length-1)];
            var q6 = "";
            for (let i = 5; i < paragraphs.length; i++){
                par6 += paragraphs[i]+"\n";
            }
            
            if ((q1 === par1) && (q2 === par2) && (q3 === par3) && (q4 === par4) && (q5 === par5) && (q6 === par6)){
                document.getElementById("newVersion").value = "false";
            }
            
            document.getElementById("nextQ").value = "1";
            
            document.getElementById("backq1Field").value = q1;
            document.getElementById("backq2Field").value = q2;
            document.getElementById("backq3Field").value = q3;
            document.getElementById("backq4Field").value = q4;
            document.getElementById("backq5Field").value = q5;
            document.getElementById("backq6Field").value = q6;
            document.getElementById("backStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("backStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("backVersionIDField").value = '<?= $final ?>';
            document.getElementById("backhiddenSubmitButton").click();
            
            
        }

        function goToFinal(){
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var q1 = paragraphs[0];
            var q2 = paragraphs[1];
            var q3 = paragraphs[2];
            var q4 = paragraphs[3];
            var q5 = paragraphs[4];
            // var par6 = paragraphs[5:(paragraphs.length-1)];
            var q6 = ""
            for (let i = 5; i < paragraphs.length; i++){
                par6 += paragraphs[i]+"\n";
            }
            
            if ((q1 === par1) && (q2 === par2) && (q3 === par3) && (q4 === par4) && (q5 === par5) && (q6 === par6)){
                document.getElementById("newVersion").value = "false";
            }
            
            document.getElementById("nextQ").value = "final";
            
            document.getElementById("backq1Field").value = q1;
            document.getElementById("backq2Field").value = q2;
            document.getElementById("backq3Field").value = q3;
            document.getElementById("backq4Field").value = q4;
            document.getElementById("backq5Field").value = q5;
            document.getElementById("backq6Field").value = q6;
            document.getElementById("backStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("backStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("backVersionIDField").value = '<?= $final ?>';
            document.getElementById("backhiddenSubmitButton").click();
        }
        
        function save_button(){
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var q1 = paragraphs[0];
            var q2 = paragraphs[1];
            var q3 = paragraphs[2];
            var q4 = paragraphs[3];
            var q5 = paragraphs[4];
            // var par6 = paragraphs[5:(paragraphs.length-1)];
            var q6 = ""
            for (let i = 5; i < paragraphs.length; i++){
                q6 += paragraphs[i]+"\n";
            }
            
            if ((q1 === par1) && (q2 === par2) && (q3 === par3) && (q4 === par4) && (q5 === par5) && (q6 === par6)){
                document.getElementById("newVersion").value = "false";
            }
            
            document.getElementById("nextQ").value = "preview";
            
            document.getElementById("backq1Field").value = q1;
            document.getElementById("backq2Field").value = q2;
            document.getElementById("backq3Field").value = q3;
            document.getElementById("backq4Field").value = q4;
            document.getElementById("backq5Field").value = q5;
            document.getElementById("backq6Field").value = q6;
            document.getElementById("backStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("backStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("backVersionIDField").value = '<?= $final ?>';
            document.getElementById("backhiddenSubmitButton").click();
        }
        
        function home_button() {
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var q1 = paragraphs[0];
            var q2 = paragraphs[1];
            var q3 = paragraphs[2];
            var q4 = paragraphs[3];
            var q5 = paragraphs[4];
            // var par6 = paragraphs[5:(paragraphs.length-1)];
            var q6 = ""
            for (let i = 5; i < paragraphs.length; i++){
                q6 += paragraphs[i]+"\n";
            }
            
            if ((q1 === par1) && (q2 === par2) && (q3 === par3) && (q4 === par4) && (q5 === par5) && (q6 === par6)){
                document.getElementById("newVersion").value = "false";
            }
            
            document.getElementById("nextQ").value = "home";
            
            document.getElementById("backq1Field").value = q1;
            document.getElementById("backq2Field").value = q2;
            document.getElementById("backq3Field").value = q3;
            document.getElementById("backq4Field").value = q4;
            document.getElementById("backq5Field").value = q5;
            document.getElementById("backq6Field").value = q6;
            document.getElementById("backStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("backStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("backVersionIDField").value = '<?= $final ?>';
            document.getElementById("backhiddenSubmitButton").click();
        }

        function faq_button(){
            document.getElementById("faqStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("faqStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("faqVersionIDField").value = '<?= $final ?>';
            document.getElementById("faqHiddenSubmitButton").click();
        }
        
        
        function whyAtlas(){
            document.getElementById("whyAtlasStudentID").value = '<?= $studentID ?>';
            document.getElementById("whyAtlasStatementID").value = '<?= $statementID ?>';
            document.getElementById("whyAtlasVersionID").value = '<?= $final ?>';
            document.getElementById("whyAtlasSubmitButton").click();
        }



    </script>






  </body>
</html>
