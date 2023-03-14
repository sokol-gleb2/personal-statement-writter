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

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="edit_by_par.css">
    <meta charset="utf-8">
    <title>Edit by Paragraph</title>

    <div id="header" style="border: 2px solid black">


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

    <!-- POP UP 1-->
    <div class="form-popup" id="q1Info">

      <p>
        <u>Subquestions:</u>
        <br>
        <h3 style="color: black">What did you enjoy doing as a child that showed your early aptitude for your chosen university subject?</h3>

        <h3 style="color: black">What is your earliest memory of an event or situation that showed interest in your subject.
          (It could be conversations with parents or insights into their jobs and interests etc, some event that struck you as powerful or things you watched or read that sparked your curiosity).</h3>

        <h3 style="color: black">In science – did you find something – a fossil or a saw a fascinating bird or a skeleton;
          in maths, did you have to calculate something and found you were good at it; in humanities, did you read or observe something that showed you have an early inclination or ability to analyse ideas or stories or arguments?</h3>


        <h3 style="color: black">If it was a gradual realisation, what circumstances led you become interested in your subject?</h3>

        <h3 style="color: black">Is there a big idea that sparked your interest and how did it come about?</h3>
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>

    <!-- POP UP 2-->
    <div class="form-popup" id="q2Info" >

      <p>
        <u>Example answer (Law):</u>
        <br>
        In the UK and the US government decisions made centuries ago have moulded constitutional law, and the law’s role in protecting society is clear today. Seeing the clear global importance of law led me to consider its role in other areas, such as history. Whilst examining Castro, Hitler, and the Rwandan genocide in IB History I was struck by a correlation between a breakdown in the rule of law (RoL) and increased in human suffering, a pattern which continues in literature. Shakespeare’s Measure for Measure explores the necessity of fair and just laws to protect citizens from disproportionate punishment. Similarly, in The Handmaid’s Tale, Margaret Atwood’s stark depiction of an authoritarian regime, where women are virtually imprisoned, emphasises the importance of the RoL.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP 3-->
    <div class="form-popup" id="q3Info" >

      <p>
        <u>Example answer (Law):</u>
        <br>
        In the UK and the US government decisions made centuries ago have moulded constitutional law, and the law’s role in protecting society is clear today. Seeing the clear global importance of law led me to consider its role in other areas, such as history. Whilst examining Castro, Hitler, and the Rwandan genocide in IB History I was struck by a correlation between a breakdown in the rule of law (RoL) and increased in human suffering, a pattern which continues in literature. Shakespeare’s Measure for Measure explores the necessity of fair and just laws to protect citizens from disproportionate punishment. Similarly, in The Handmaid’s Tale, Margaret Atwood’s stark depiction of an authoritarian regime, where women are virtually imprisoned, emphasises the importance of the RoL.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP 4-->
    <div class="form-popup" id="q4Info" >

      <p>
        <u>Example answer (Law):</u>
        <br>
        In the UK and the US government decisions made centuries ago have moulded constitutional law, and the law’s role in protecting society is clear today. Seeing the clear global importance of law led me to consider its role in other areas, such as history. Whilst examining Castro, Hitler, and the Rwandan genocide in IB History I was struck by a correlation between a breakdown in the rule of law (RoL) and increased in human suffering, a pattern which continues in literature. Shakespeare’s Measure for Measure explores the necessity of fair and just laws to protect citizens from disproportionate punishment. Similarly, in The Handmaid’s Tale, Margaret Atwood’s stark depiction of an authoritarian regime, where women are virtually imprisoned, emphasises the importance of the RoL.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP 5-->
    <div class="form-popup" id="q5Info" >

      <p>
        <u>Example answer (Law):</u>
        <br>
        In the UK and the US government decisions made centuries ago have moulded constitutional law, and the law’s role in protecting society is clear today. Seeing the clear global importance of law led me to consider its role in other areas, such as history. Whilst examining Castro, Hitler, and the Rwandan genocide in IB History I was struck by a correlation between a breakdown in the rule of law (RoL) and increased in human suffering, a pattern which continues in literature. Shakespeare’s Measure for Measure explores the necessity of fair and just laws to protect citizens from disproportionate punishment. Similarly, in The Handmaid’s Tale, Margaret Atwood’s stark depiction of an authoritarian regime, where women are virtually imprisoned, emphasises the importance of the RoL.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP 6-->
    <div class="form-popup" id="q6Info" >

      <p>
        <u>Example answer (Law):</u>
        <br>
        In the UK and the US government decisions made centuries ago have moulded constitutional law, and the law’s role in protecting society is clear today. Seeing the clear global importance of law led me to consider its role in other areas, such as history. Whilst examining Castro, Hitler, and the Rwandan genocide in IB History I was struck by a correlation between a breakdown in the rule of law (RoL) and increased in human suffering, a pattern which continues in literature. Shakespeare’s Measure for Measure explores the necessity of fair and just laws to protect citizens from disproportionate punishment. Similarly, in The Handmaid’s Tale, Margaret Atwood’s stark depiction of an authoritarian regime, where women are virtually imprisoned, emphasises the importance of the RoL.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>





    <!-- QUESTIONS -->

    <div style="padding-top: 20px; padding-right: 10px;">

      <div class="qs" id="q1" style="background-color: #e1cecf; width: 99%; padding-left: 5px; padding-right: 5px">
          <img src="question_mark.png" onclick="q1QM()">
        <h3>What event triggered your passion for your subject?</h3>
        <textarea id="q1Text" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q1count">0</span>
        </p>
      </div>
      <br>
      <!-- <br> -->

      <div class="qs" id="q2" style="background-color: #e1cecf; width: 99%; padding-left: 5px; padding-right: 5px">
          <img src="question_mark.png" onclick="q2QM()">
        <h3>How do your combination of A level subjects and skills demonstrate that you would make a good student for your chosen subject?</h3>
        <textarea id="q2Text" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q2count">0</span>
        </p>
      </div>
      <br>



      <div class="qs" id="q3" style="background-color: #e1cecf; width: 99%; padding-left: 5px; padding-right: 5px">
          <img src="question_mark.png" onclick="q3QM()">
        <h3>What particular areas of your subject (i.e. concepts and theories) do you find most interesting and why?</h3>
        <textarea id="q3Text" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q3count">0</span>
        </p>
      </div>
      <br>



      <div class="qs" id="q4" style="background-color: #e1cecf; width: 99%; padding-left: 5px; padding-right: 5px">
          <img src="question_mark.png" onclick="q4QM()">
        <h3>How have you developed these areas of interest beyond work set in class? Include school trips/personal projects, work experience and subject-related extra-curricular activities.</h3>
        <textarea id="q4Text" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q4count">0</span>
        </p>
      </div>
      <br>



      <div class="qs" id="q5" style="background-color: #e1cecf; width: 99%; padding-left: 5px; padding-right: 5px">
          <img src="question_mark.png" onclick="q5QM()">
        <h3>Extra-curricular activities, achievements and honours NOT related to your subject (this should form a short penultimate paragraph)</h3>
        <textarea id="q5Text" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q5count">0</span>
        </p>
      </div>
      <br>



      <div class="qs" id="q6" style="background-color: #e1cecf; width: 99%; padding-left: 5px; padding-right: 5px">
          <img src="question_mark.png" onclick="q6QM()">
        <h3>Summarise why you want to study your subject and what you wish to get out of studying your subject. Try to relate this paragraph back to your 1st paragraph.</h3>
        <textarea id="q6Text" name="paragraph_text" oninput="wordCount()"  rows="15" style="resize: none; width: 99%;" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q6count">0</span>
        </p>
      </div>


    </div>
    
    
    <form id="parSave" action="savePreviewToEdit.php" method="POST">
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
    
    function q1QM(){
      document.getElementById('q1Info').style.display = "block";
    }

    function q2QM(){
      document.getElementById('q2Info').style.display = "block";
    }

    function q3QM(){
      document.getElementById('q3Info').style.display = "block";
    }
    
    function q4QM(){
      document.getElementById('q4Info').style.display = "block";
    }

    function q5QM(){
      document.getElementById('q5Info').style.display = "block";
    }

    function q6QM(){
      document.getElementById('q6Info').style.display = "block";
    }

      var par1 = <?php echo json_encode($par1); ?>;
        var par2 = <?php echo json_encode($par2); ?>;
        var par3 = <?php echo json_encode($par3); ?>;
        var par4 = <?php echo json_encode($par4); ?>;
        var par5 = <?php echo json_encode($par5); ?>;
        var par6 = <?php echo json_encode($par6); ?>;
      document.getElementById("q1Text").value = par1;
      document.getElementById("q2Text").value = par2;
      document.getElementById("q3Text").value = par3;
      document.getElementById("q4Text").value = par4;
      document.getElementById("q5Text").value = par5;
      document.getElementById("q6Text").value = par6;


    function wordCount(){
      var words = document.getElementById("q1Text").value;
      var words2 = document.getElementById("q2Text").value;
      var words3 = document.getElementById("q3Text").value;
      var words4 = document.getElementById("q4Text").value;
      var words5 = document.getElementById("q5Text").value;
      var words6 = document.getElementById("q6Text").value;


      // Initialize the word counter
      var count = 0;
      var count2 = 0;
      var count3 = 0;
      var count4 = 0;
      var count5 = 0;
      var count6 = 0;

      // Split the words on each
      // space character
      var split = words.split('');
      var split2 = words2.split('');
      var split3 = words3.split('');
      var split4 = words4.split('');
      var split5 = words5.split('');
      var split6 = words5.split('');

      // Loop through the words and
      // increase the counter when
      // each split word is not empty
      for (var i = 0; i < split.length; i++) {
          if (split[i] != "") {
              count += 1;
          }
      }

      for (var i = 0; i < split2.length; i++) {
          if (split2[i] != "") {
              count2 += 1;
          }
      }

      for (var i = 0; i < split3.length; i++) {
          if (split3[i] != "") {
              count3 += 1;
          }
      }

      for (var i = 0; i < split4.length; i++) {
          if (split4[i] != "") {
              count4 += 1;
          }
      }

      for (var i = 0; i < split5.length; i++) {
          if (split5[i] != "") {
              count5 += 1;
          }
      }

      for (var i = 0; i < split6.length; i++) {
          if (split6[i] != "") {
              count6 += 1;
          }
      }


      // Display it as output
      document.getElementById("q1count").innerHTML = count;
      document.getElementById("q2count").innerHTML = count2;
      document.getElementById("q3count").innerHTML = count3;
      document.getElementById("q4count").innerHTML = count4;
      document.getElementById("q5count").innerHTML = count5;
      document.getElementById("q6count").innerHTML = count6;
    }



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
    
    function closeForm(){
      document.getElementById('q1Info').style.display = "none";
      document.getElementById('q2Info').style.display = "none";
      document.getElementById('q3Info').style.display = "none";
      document.getElementById('q4Info').style.display = "none";
      document.getElementById('q5Info').style.display = "none";
      document.getElementById('q6Info').style.display = "none";


    }


    </script>

  </body>
</html>
