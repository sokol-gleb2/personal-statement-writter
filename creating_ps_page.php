<?php

    include "connection.php";

    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    $final = $versionID;
    
    
    $sql0 = "SELECT * FROM Statement_tbl WHERE StatementID='$statementID' AND VersionID='$final';";
    $q1 = "";
    
    if($result = mysqli_query($conn, $sql0)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $GLOBALS["q1"] = $row['StatementQ1'];
                        
            }
            
        }
    }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Creating a new PS</title>


    <link rel="stylesheet" href="creating_ps_page.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Paragraph 1</title>

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

      <button class="banner">PARAGRAPH 1</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion2()">PARAGRAPH 2</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion3()">PARAGRAPH 3</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion4()">PARAGRAPH 4</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion5()">PARAGRAPH 5</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion6()">PARAGRAPH 6</button>
      <button class="banner" style="height: 60px" onclick="goToPreview()">PREVIEW</button>

    </div>
    
    
    <div style="margin-top: 20px; text-align: center">
        <h2 style="font-family: Helvetica">Example Answers: </h2>
        <button class="exampleButton" id="exampleButtonLaw" onclick="lawExample()"><span style="font-size: 14px">LAW</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="econExample()"><span style="font-size: 14px">ECONOMICS</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="ppeExample()"><span style="font-size: 14px">PPE</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="medExample()"><span style="font-size: 14px">MEDICINE</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="bioExample()"><span style="font-size: 14px">BIOLOGY</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="compsciExample()"><span style="font-size: 14px">COMPUTER SCI</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="physicsExample()"><span style="font-size: 14px">PHYSICS</span></button>
    </div>

    <!------------------------------>


    <!-- POP UP HELP -->
    <div id="container" class="container" style="visibility: hidden">
      <div style="text-align: center">
        <h1 style="color: #A31621">Need some help?</h1>
      </div>
      <div style="padding: 20px">
        <h2>That's alright. You can always email your tutor or the Insight Education team at support@insight-ed.co.uk.</h2>
        <br>
        <br>
        <h2> Here's some Frequently Asked Questions:</h2>
        <br>
        <p><b>Question: </b> How to return back to the Home Page?</p>
        <p><b>Answer: </b> Click the HOME button above. All your answers will be automatically saved.</p>
      </div>
      <div style="text-align: center; margin-top: 20px; margin-bottom: 10px">
        <button type="button" class="btn_cancel" onclick="closePopUp()">Close</button>
      </div>
    </div>
    <!-- ----------- -->



    <!-- POP UP LAW-->
    <div class="form-popup" id="lawInfo">

      <p style="font-family: Helvetica">
        <u>Example answer (Law):</u>
        <br>
        In the UK and the US government decisions made centuries ago have moulded constitutional law, and the law’s role in protecting society is clear today. Seeing the clear global importance of law led me to consider its role in other areas, such as history. Whilst examining Castro, Hitler, and the Rwandan genocide in IB History I was struck by a correlation between a breakdown in the rule of law (RoL) and increased in human suffering, a pattern which continues in literature. Shakespeare’s Measure for Measure explores the necessity of fair and just laws to protect citizens from disproportionate punishment. Similarly, in The Handmaid’s Tale, Margaret Atwood’s stark depiction of an authoritarian regime, where women are virtually imprisoned, emphasises the importance of the RoL.
      </p>
      

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>

    <!-- POP UP ECON-->
    <div class="form-popup" id="econInfo" >

      <p style="font-family: Helvetica">
        <u>Example answer (Economics):</u>
        <br>
        My thirst for comprehensive economic knowledge was ignited by the experience of teaching underprivileged children in Hebei province. I recognised the disproportionate gap of economic development and wanted to discover long-lasting solutions on problems faced by people trapped in poverty. Therefore, I chose to study A Level economics, which later helped to provide me with explanations whilst prompting me to ask deeper questions about the world around me. Furthermore, I am intrigued by limitations of modelling the real world which rarely behaves rationally.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP PPE-->
    <div class="form-popup" id="ppeInfo" >

      <p style="font-family: Helvetica">
        <u>Example answer (PPE):</u>
        <br>
        I am intrigued by how politicians develop goals which reflect their ideologies, the political institutions they use to achieve them and the economic and fiscal instruments designed to fund their agenda. This interest developed when studying A level politics and extended beyond the syllabus. At school I regularly took part in debates and visited both the UK and European parliaments. I began reading literature about aspects of the wider world, the most influential being China and the West in the 21 st Century by Will Hutton. I have recently read Freakonomics by Levitt and Dubner, and enjoyed the clever way it explores how economic theory can be applied to solve everyday problems.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP MEDICINE-->
    <div class="form-popup" id="medInfo" >

      <p style="font-family: Helvetica">
        <u>Example answer (Medicine):</u>
        <br>
        ‘Master cells’, a headline I remember about stem cell research and the scientific prospects these totipotent cells could bring. Ever since, I have been following the development of stem cell research with interest and recently read that foetal stem cells have been injected into people who are paralysed. Contrary to what was originally expected, they began to partially recover feeling. I am also fascinated with how stem cells can be used to treat both non-malignant and malignant diseases. Learning about this strengthened my passion for studying Medicine, as I hope to one day use my problem solving skills to perform diagnoses and to treat others.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP BIOLOGY-->
    <div class="form-popup" id="bioInfo" >

      <p style="font-family: Helvetica">
        <u>Example answer (Biology):</u>
        <br>
        Topical issues such as the effects of GM crops, the use of Cholinesterase inhibitors in the treatment of Alzheimer’s or the possibilities of bionic limbs fascinate me. I am enthralled by the biological and medical sciences because they allow us to ascertain how and why our world and all in it work the way they do. They define our possibilities and limitations, create new facts and validate theories. Research in these fields will, I hope; enable me to contribute to the prevention and cure of diseases.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- POP UP COMP SCI-->
    <div class="form-popup" id="compsciInfo" >

      <p style="font-family: Helvetica">
        <u>Example answer (Computer Science):</u>
        <br>
        Growing up, I have always enjoyed watching sci-fi movies and reading comics which depicted worlds set in a future of flying cars and advanced systems. However, it was not until I watched a video of the ‘6th Sense’ by Pranav Mistry which showed the next generation of mobile technology integrated seamlessly into our lives that I realised this ‘future’ is closer than I thought. Through the past decade, I have been driven by a passion to contribute to technological advancements being developed every day which motivates me to study computer engineering.
      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>
    
    
    
    <!-- POP UP PHYSICS-->
    <div class="form-popup" id="physicsInfo" >

      <p style="font-family: Helvetica">
        <u>Example answer (Physics):</u>
        <br>
        When I was younger my favourite word was “why”. 
        I was always a curious child, and this mostly manifested in questioning various natural phenomena for example, why the sound of an ambulance siren changes as it drives past, or why car engines heat up after a long drive. Studying science has begun to give me the tools to answer such questions. It was not until I studied the Doppler Effect in my AS levels, that I came to understand that it is because there is a decrease in the frequency of sound as the ambulance drove away from me. This scientific concept as well as others have brought to life my learning in Physics and fuelled my determination to explore it further at university.

      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>



    <br>
    <br>

    <!-- QUESTIONS -->

    <div style="text-align: center; margin-left: 5px">
      <h1 style="color: darkred; font-family: Helvetica; text-align: justify; margin-left: 5%; margin-right: 5%">Paragraph 1: What event(s) triggered your passion/appreciation for your subject?</h1>
    </div>
    
    <div class="helpBox">
        <p style="font-size: 20px; color: #a31621">Need some ideas? Use the below questions where needed to help write your paragraph:</p>
        <ul>
            <li style="margin: 5px">What did you enjoy doing as a child that showed your early aptitude for your chosen university subject?</li>
            <li style="margin: 5px">What is your earliest memory of an event or situation that showed interest in your subject?</li>
            <li style="margin: 5px">In science – did you find something – a fossil or a saw a fascinating bird or a skeleton; in maths, did you have to calculate something and found you were good at it; in humanities, did you read or observe something that showed you have an early inclination or ability to analyse ideas or stories or arguments?</li>
            <li style="margin: 5px">If it was a gradual realisation, what circumstances led you become interested in your subject?</li>
            <li style="margin: 5px">Is there a big idea that sparked your interest and how did it come about?</li>
        </ul>
    </div>
    
    <div class="qs" id="q1" style="margin-top: 20px; padding-left: 5px; padding-right: 5px; padding-top: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
        <textarea id="q1Text" name="paragraph_text" oninput="wordCount()"  rows="25" style="resize: none; width: 99%; font-family: Helvetica; font-size: 17px; background-color: rgba(255, 255, 255, 0.7)" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q1count">0</span>
        </p>
      </div>
      <br>
      


    
    <form id="scoreSubmit" action="save.php" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='VersionIDField' name="VersionID" />
        <input type='hidden' id='q1Field' name="q1" value='1'/>
        <input type='hidden' id='q2Field' name="q2" value='1'/>
        <input type='hidden' id='q3Field' name="q3" value='1'/>
        <input type='hidden' id='q4Field' name="q4" value='1'/>
        <input type='hidden' id='q5Field' name="q5" value='1'/>
        <input type='hidden' id='q6Field' name="q6" value='1'/>
        <input type='hidden' id='nextQ' name="NextQ" value=''/>
        <input type='hidden' id='currentQ' name="CurrentQ" value='1'/>
        <input type='hidden' id='newVersion' name="NewVersion" value='true'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="faqPage" action="FAQs" method="POST">
        <input type='hidden' id='faqStudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='faqStatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='faqVersionIDField' name="VersionID" value='0'/>
        <input type='hidden' id='faqCurrentQ' name="NextQ" value='1'/>
        <button type='submit' id="faqHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="whyAtlas" action="whyAtlas" method="POST">
        <input type='hidden' id='whyAtlasStudentID' name="StudentID" value='0'/>
        <input type='hidden' id='whyAtlasStatementID' name="StatementID" value='0'/>
        <input type='hidden' id='whyAtlasVersionID' name="VersionID" value='0'/>
        <input type='hidden' id='whyAtlasCurrPage' name="CurrPage" value='1'/>
        <button type='submit' id="whyAtlasSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    



    <br>
    <br>
    <br>
    <div class="wrapper" style="margin: auto;">
      <button class="saveButton" id="saveButton" onclick="saveAnswers()"><span>SAVE AND CONTINUE</span></button>
    </div>

    
    
    <div style="text-align: center; margin-top: 30px">
        2022 © Insight Education Ltd | All Rights Reserved | Company Registration Number: 8934853
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <script>
    
    
    
    $(".form-popup").bind("copy", function(event){
        event.preventDefault();
    });
    
    var q1 = <?php echo json_encode($q1); ?>;
    
    document.getElementById("q1Text").innerHTML = q1;
    
    var count = 0;
    var split = q1.split('');
    for (var i = 0; i < split.length; i++) {
        if (split[i] != "") {
            count += 1;
        }
    }
    document.getElementById("q1count").innerHTML = count;
    
    
    
    function wordCount(){
      var words = document.getElementById("q1Text").value;


      // Initialize the word counter
      var count = 0;
      

      // Split the words on each
      // space character
      var split = words.split('');
      

      // Loop through the words and
      // increase the counter when
      // each split word is not empty
      for (var i = 0; i < split.length; i++) {
          if (split[i] != "") {
              count += 1;
          }
      }

      


      // Display it as output
      document.getElementById("q1count").innerHTML = count;
    }


    function lawExample(){
        closeForm();
        $("#lawInfo").css("display", "block");
    }

    function econExample(){
        closeForm();
        $("#econInfo").css("display", "block");
    }

    function ppeExample(){
        closeForm();
        $("#ppeInfo").css("display", "block");
    }

    function medExample(){
        closeForm();
        $("#medInfo").css("display", "block");
    }
    
    function bioExample(){
        closeForm();
        $("#bioInfo").css("display", "block");
    }
    
    function compsciExample(){
        closeForm();
        $("#compsciInfo").css("display", "block");
    }
    
    function physicsExample(){
        closeForm();
        $("#physicsInfo").css("display", "block");
    }


    function closeForm(){
      $(".form-popup").css("display", "none");

    }
    
    
    var studentID = '<?= $studentID ?>';
    var statementID = '<?= $statementID ?>';
    var versionID = '<?= $final ?>';

    function saveAnswers(){
        
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "2";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    function save(){
        saveAnswers();
        

    }
    
    function closePopUp(){
        document.getElementById('container').style.visibility = "hidden";
    }
    
    function help_button(){
        document.getElementById('container').style.visibility = "visible";
    }
    
    function save_button(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "1";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function home_button(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "home";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    function goToQuestion2(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "2";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion3(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "3";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion4(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "4";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion5(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "5";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion6(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "6";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function faq_button(){
        document.getElementById("faqStudentIDField").value = studentID;
        document.getElementById("faqStatementIDField").value = statementID;
        document.getElementById("faqVersionIDField").value = versionID;
        document.getElementById("faqHiddenSubmitButton").click();
    }
    
    
    function whyAtlas(){
        document.getElementById("whyAtlasStudentID").value = studentID;
        document.getElementById("whyAtlasStatementID").value = statementID;
        document.getElementById("whyAtlasVersionID").value = versionID;
        document.getElementById("whyAtlasSubmitButton").click();
    }


    function goToPreview(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        par1 = par1.replace(/\n\s*\n/g, '\n');
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q1Field").value = par1;
        document.getElementById("nextQ").value = "preview";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    </script>

  </body>
</html>
