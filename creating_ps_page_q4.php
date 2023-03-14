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
                $GLOBALS["q1"] = $row['StatementQ4'];
                        
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="creating_ps_page_q4.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Creating new PS Q4</title>
  </head>


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

  <body>


    <!-- Questions/Preview Banner -->

    <div class="outer">

      <button class="banner" style="height: 60px" onclick="goToQuestion1()">PARAGRAPH 1</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion2()">PARAGRAPH 2</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion3()">PARAGRAPH 3</button>
      <button class="banner">PARAGRAPH 4</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion5()">PARAGRAPH 5</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion6()">PARAGRAPH 6</button>
      <button class="banner" style="height: 60px" onclick="goToPreview()">PREVIEW</button>

    </div>

    <!------------------------------>

    <!-- Example Qs -->
    <div style="margin-top: 20px; text-align: center">
        <h2 style="font-family: Helvetica">Example Answers: </h2>
        <button class="exampleButton" id="exampleButtonLaw" onclick="lawExample()"><span style="font-size: 14px">LAW</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="econExample()"><span style="font-size: 14px">ECONOMICS</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="ppeExample()"><span style="font-size: 14px">PPE</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="medExample()"><span style="font-size: 14px">MEDICINE</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="bioExample()"><span style="font-size: 14px">BIOLOGY</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="compsciExample()"><span style="font-size: 14px">COMP SCI</span></button>
        <button class="exampleButton" id="exampleButtonEcon" onclick="physicsExample()"><span style="font-size: 14px">PHYSICS</span></button>
    </div>
    <!-- --------- -->
    

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
        To gain an insight of the law at work, I undertook one-week placements in a corporate law firm and the Crown Prosecution Service. As part of my work experience, I observed cases in progress and gained a better understanding of our criminal court procedure. I also enjoyed shadowing the Legal Editor of The Times newspaper. I had the pleasure of attending a press conference in the Department of Constitutional Affairs regarding the reform of the coroners system, enabling me to see the inseparable nature of law and government policy.
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
        My enthusiasm for Economics is further driven by my determination to explore new concepts. Through a series of lectures and a project using economic concepts to improve a business firm, I was able to develop my analytical skills. I also successfully completed a work experience placement at KPMG where I developed invaluable skills such as communication, teamwork, research, problem solving and presentation.
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
        My interest in the growing economic and political power of the emerging Asian economies was influential in my decision to learn Mandarin. After school I spent 8 months studying at Beijing Language University. Once my Chinese was good enough, I enjoyed discovering the views of locals on their own country and the West, from the man I met who had witnessed his friends shot at Tiananmen, to the patriotic friend who refused to answer my questions on Chinese politics as she viewed them as insulting. I saw the impact of government policy in everyday life and the differences with the UK.

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
        To gain some practical experience, I joined St John Ambulance Youth Cadets. We meet up every week to learn new skills, such as First Aid, and I am currently working towards a Grand Prior Award. I have learnt to remain calm and make quick and rational judgments under immense pressure and time constraints. Being in the Youth Cadets has furthered my teamwork skills, taught me to communicate effectively under pressure, expanded my medicine-related knowledge and enabled me to give something back to the society that has helped me so much.
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
        This past summer I went to the Harvard Medical School as an intern at the Institute for Aging
Research at Hebrew Senior Life. I researched the effects of concussion on the declining consistency of stride patterns when walking.  I discovered that people who previously had concussion had far less complex gait patterns than the control group which had yet to be scientifically proven. During this internship, I also developed an app to help collect data from patients, gaining insights into ageing from several perspectives.


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
        I am particularly interested in Robots and Sensors and Actuators as they are all part of Robotics which will impact our future world. Furthermore, in the summer of 2010, I attended a course at Harvard specialising in iPhone and iPad Programming, where I created two of my own “Apps”. I previously only knew Visual Basic from A-Level and C++ which I learnt myself; therefore
learning XCode was challenging but extremely interesting. I made an App with animations, flashing
images and sounds followed by another with addictive hypnotic circles. Outside of school, I apply
my artistic flair and computing skills to design brochures and posters for my school, companies and
charitable organizations.

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
        In my spare time, I enjoy reading articles on energy generation and its sustainability. In Marjolein Helder’s article on sustainable renewable energy she argued that before energy sources can be considered sustainable they have to meet certain environmental, economic and social criteria. I feel that it would be ideal if we could use energy in a way that allows it to return to the environment in forms that we can use readily and with little processing. During my visit to the Nigerian Breweries malting plant, I found the malting and lautering process particularly interesting, as they
used basic chemistry techniques such as fermentation, filtration and decompositions to create popular consumer products which brought my A level chemistry studies to life.



      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>
    
    


    <!-- QUESTIONS -->

    <div style="text-align: center; margin-left: 5%; margin-right: 5%">
      <h1 style="color: darkred; text-align: justify; font-family: Helvetica"> Paragraph 4: How have you <u>developed your subject interest beyond work set in class</u> (i.e. attendance at public lectures, listening to TV/Radio documentaries, visits to cultural institutions relating to your subject, wider reading, work experience/placements)? What did you learn from your experiences? (Relate what you have learnt to your subject).</h1>
    </div>
    
    <div class="helpBox">
        <p style="font-size: 20px; color: #a31621">Need some ideas? Use the below questions where needed to help write your paragraph:</p>
        <ul>
            <li style="margin: 5px">Have you explored your undergraduate course or A level topics related to your future studies? Have you taken the initiative to join a society/group that shows wider interests in your university course?</li>
            <li style="margin: 5px">Can you name the event/title and who spoke or authored; summarise their arguments and give an opinion on the strength of the information? What are the wider implications of their argument and why did you find it interesting/compelling?</li>
            <li style="margin: 5px">Have you undertaken relevant work experience? What did you learn? What did you observe that was thought-provoking?</li>
        </ul>
    </div>
    
    
    <div class="qs" id="q1" style="margin-top: 20px; width: 90%; padding-left: 5px; padding-right: 5px; padding-top: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
        <textarea id="q1Text" name="paragraph_text" oninput="wordCount()"  rows="25" style="resize: none; width: 99%; font-family: Helvetica; font-size: 17px; background-color: rgba(255, 255, 255, 0.7)" ></textarea>
        <br>
        <p style="text-align: right; font-size: 18px"> Character Count:
            <span id="q1count">0</span>
        </p>
      </div>
      <br>
      
      

    <!--------------------->
    
    <form id="scoreSubmit" action="save.php" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='VersionIDField' name="VersionID"/>
        <input type='hidden' id='q1Field' name="q1" value='1'/>
        <input type='hidden' id='q2Field' name="q2" value='1'/>
        <input type='hidden' id='q3Field' name="q3" value='1'/>
        <input type='hidden' id='p3q1Field' name="p3q1" value='1'/>
        <input type='hidden' id='p3q2Field' name="p3q2" value='1'/>
        <input type='hidden' id='p3q3Field' name="p3q3" value='1'/>
        <input type='hidden' id='p3q4Field' name="p3q4" value='1'/>
        <input type='hidden' id='p3q5Field' name="p3q5" value='1'/>
        <input type='hidden' id='q4Field' name="q4" value='1'/>
        <input type='hidden' id='q5Field' name="q5" value='1'/>
        <input type='hidden' id='q6Field' name="q6" value='1'/>
        <input type='hidden' id='nextQ' name="NextQ" value='4'/>
        <input type='hidden' id='currentQ' name="CurrentQ" value='4'/>
        <input type='hidden' id='newVersion' name="NewVersion" value='true'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="whyAtlas" action="whyAtlas" method="POST">
        <input type='hidden' id='whyAtlasStudentID' name="StudentID" value='0'/>
        <input type='hidden' id='whyAtlasStatementID' name="StatementID" value='0'/>
        <input type='hidden' id='whyAtlasCurrPage' name="CurrPage" value='1'/>
        <button type='submit' id="whyAtlasSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>


    <br>
    <br>
    <br>
    <div class="wrapper" style="margin: auto;">
      <button class="saveButton" id="saveButton" onclick="save()"><span>SAVE AND CONTINUE</span></button>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    
    // var count = 0;
    // var split = q1.split('');
    // for (var i = 0; i < split.length; i++) {
    //     if (split[i] != "") {
    //         count += 1;
    //     }
    // }
    // document.getElementById("q1count").innerHTML = count;
    
    $(".form-popup").bind("copy", function(event){
        event.preventDefault();
    });
    
    var q1 = <?php echo json_encode($q1); ?>;
    
    document.getElementById("q1Text").innerHTML = q1;
    
    
    
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


    function save(){
        
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "5";
        
        
        
        document.getElementById("hiddenSubmitButton").click();

    }

    function goToQuestion1(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "1";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion2(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "2";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion3(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "3";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function goToQuestion5(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "5";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function goToQuestion6(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "6";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    function goToPreview(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "preview";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function help_button(){
        $("#container").css("visibility", "visible");
    }
    
    function closePopUp(){
        $("#container").css("visibility", "hidden");
    }
    
    function home_button(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "home";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function whyAtlas(){
        document.getElementById("whyAtlasStudentID").value = studentID;
        document.getElementById("whyAtlasStatementID").value = statementID;
        document.getElementById("whyAtlasSubmitButton").click();
    }
    
    function save_button(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q4Field").value = par1;
        document.getElementById("nextQ").value = "4";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    </script>

  </body>
</html>
