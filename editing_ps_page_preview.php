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
    $statementIDLoc = $_POST['StatementIDLoc'];

    $sql = "SELECT * FROM Main_tbl WHERE StudentID=" . $studentID . ";";
    $statements = [];
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                array_push($GLOBALS["statements"], $row['StatementID']);
                        
            }
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
    
    if ($statementID == 0){
        $statementID = $statements[$statementIDLoc];    
    }
    
    
    
    $sql = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statementID . ";";
    $statementQ1 = "-";
    $statementQ2 = "-";
    $statementQ3 = "-";
    $statementQ4 = "-";
    $statementQ5 = "-";
    $statementQ6 = "-";
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_array($result)){
                $GLOBALS["statementQ1"] = $row['StatementQ1'];
                $GLOBALS["statementQ2"] = $row['StatementQ2'];
                $GLOBALS["statementQ3"] = $row['StatementQ3'];
                $GLOBALS["statementQ4"] = $row['StatementQ4'];
                $GLOBALS["statementQ5"] = $row['StatementQ5'];
                $GLOBALS["statementQ6"] = $row['StatementQ6'];
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
    <meta charset="utf-8">

    <link rel="stylesheet" href="editing_ps_page_preview.css">
    <meta charset="utf-8">
    <title>Editing Personal Statement</title>

    <div id="header" >


        <div class="header">
          <button class="home_button" onclick="home_button()" style="font-size: 17px; color: #a31621"><b>HOME</b></button>
        </div><!--
        --><div class="header">
          <button class="help_button" onclick="help_button()" style="font-size: 17px; color: #a31621"><b>HELP</b></button>
        </div><!--
        --><div class="header">
          <button class="home_button" onclick="save_button()" style="font-size: 17px; color: #a31621"><b>SAVE</b></button>
        </div><!--
        --><div class="header">
          <button class="home_button" onclick="exit_button()" style="font-size: 17px; color: #a31621"><b>EXIT</b></button>
        </div>



    </div>

    <br>
    <br>
  </head>





  <body>

    

    
    <div id="container">
      <div style="text-align: center">
        <h1 style="color: #A31621">Looks too big and scary?</h1>
      </div>
      <div style="padding: 20px">
        <h2>That's alright. You can edit your personal statement by paragraph.</h2>
        <h2> Just click the "Edit By Paragraph" button at the top:</h2>
        <img src="parEditImg.png">
        <br>
        <h2>When done, make sure to click the "FINAL" button at the bottom :)</h2>
      </div>
      <div style="text-align: center; margin-top: 20px; margin-bottom: 10px">
        <button type="button" class="btn_cancel" onclick="closePopUp()">Close</button>
      </div>
    </div>
    

    <div id="parEdit">
      <button id="parEditButton" onclick="goToParEdit()">Edit By Paragraph</button>
    </div>

    
    <div style="width: 100%; text-align: center">
        <textarea id="data_goes_here" style="line-height: 120%; font-family: Arial; font-size: 16px; width: 98%; height: 600px; padding: 10px" ></textarea>
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
    
     <form id="finalSave" action="finalSave.php" method="POST">
        <input type='hidden' id='finalStudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='finalStatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='finalq1Field' name="q1" value='1'/>
        <input type='hidden' id='finalq2Field' name="q2" value='1'/>
        <input type='hidden' id='finalq3Field' name="q3" value='1'/>
        <input type='hidden' id='finalq4Field' name="q4" value='1'/>
        <input type='hidden' id='finalq5Field' name="q5" value='1'/>
        <input type='hidden' id='finalq6Field' name="q6" value='1'/>
        <button type='submit' id="finalHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    
    
    
    <div style="text-align: center; margin-top: 30px">
        2022 © Insight Education Ltd | All Rights Reserved | Company Registration Number: 8934853
    </div>
    

    
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
    <script>
    
        var par1 = <?php echo json_encode($statementQ1); ?>;
        var par2 = <?php echo json_encode($statementQ2); ?>;
        var par3 = <?php echo json_encode($statementQ3); ?>;
        var par4 = <?php echo json_encode($statementQ4); ?>;
        var par5 = <?php echo json_encode($statementQ5); ?>;
        var par6 = <?php echo json_encode($statementQ6); ?>;
        var preview = par1 + "\n" + "\n" + par2 + "\n" + "\n" + par3 + "\n" + "\n" + par4 + "\n" + "\n" + par5 + "\n" + "\n" + par6;
        document.getElementById("data_goes_here").value = preview;
    
    
        function closePopUp(){
          document.getElementById("container").style.visibility = "hidden";
        }
        
        
        


        function save(){
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var par1 = paragraphs[0];
            var par2 = paragraphs[1];
            var par3 = paragraphs[2];
            var par4 = paragraphs[3];
            var par5 = paragraphs[4];
            var par6 = ""
            for (let i = 5; i < paragraphs.length; i++){
                par6 += paragraphs[i]+"\n";
            }
            
            // NEED TO THINK ABOUT IF THEY HAVE LESS THAN 6 PARAGRAPHS
            
            document.getElementById("finalq1Field").value = par1;
            document.getElementById("finalq2Field").value = par2;
            document.getElementById("finalq3Field").value = par3;
            document.getElementById("finalq4Field").value = par4;
            document.getElementById("finalq5Field").value = par5;
            document.getElementById("finalq6Field").value = par6;
            document.getElementById("finalStudentIDField").value = '<?= $studentID ?>';
            document.getElementById("finalStatementIDField").value = '<?= $statementID ?>';
            document.getElementById("finalHiddenSubmitButton").click();
          
        }

        

        function goToQuestions(){
          location.href = "creating_ps_page.html";
        }

        function goToFinal(){
          save();
        }

        function goToParEdit(){
            var final = document.getElementById("data_goes_here").value;
            let paragraphs = final.split("\n\n");
            // alert(newstrings[1]);
            
            var par1 = paragraphs[0];
            var par2 = paragraphs[1];
            var par3 = paragraphs[2];
            var par4 = paragraphs[3];
            var par5 = paragraphs[4];
            // var par6 = paragraphs[5:(paragraphs.length-1)];
            var par6 = ""
            for (let i = 5; i < paragraphs.length; i++){
                par6 += paragraphs[i]+"\n";
            }
            
            document.getElementById("q1Field").value = par1;
            document.getElementById("q2Field").value = par2;
            document.getElementById("q3Field").value = par3;
            document.getElementById("q4Field").value = par4;
            document.getElementById("q5Field").value = par5;
            document.getElementById("q6Field").value = par6;
            document.getElementById("StudentIDField").value = '<?= $studentID ?>';
            document.getElementById("StatementIDField").value = '<?= $statementID ?>';
            document.getElementById("hiddenSubmitButton").click();
            
        }
        



    </script>






  </body>
</html>
