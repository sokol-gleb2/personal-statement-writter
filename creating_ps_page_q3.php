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
                $GLOBALS["q1"] = $row['StatementQ3'];
                        
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="creating_ps_page_q3.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Creating new PS Q3</title>

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

      <button class="banner" style="height: 60px" onclick="goToQuestion1()">PARAGRAPH 1</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion2()">PARAGRAPH 2</button>
      <button class="banner">PARAGRAPH 3</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion4()">PARAGRAPH 4</button>
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
        As a psychology student, I have learned to use evidence to evaluate the different sides of an argument, a skill which will be useful to a law student. I am fascinated by the determinism-free will debate. Experiments conducted by Skinner and other behavioural psychologists give evidence of the role of the subconscious in responding to situational factors over the goal of self-actualization (as free will suggests). However, I find free will to be a more positive approach because the concept of determinism diminishes responsibility for one’s own actions. Through economics I have acquired analytical skills, which enables me to grapple difficult questions such as whether the Human Development Index is a more accurate reflection of quality of life as opposed to GDP per capita.
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
        Among all the economic concepts I have discovered, international trade fascinates me the most. The theoretical underpinnings behind trade intrigue me, particularly the theory of comparative advantage and how it can help countries cooperate in a “positive-sum” manner to maintain and increase wealth. I enjoy exploring the inter-relationships behind trade blocs and how free trade agreements are shaped by political players like Donald Trump, historical events such as war and social trends like Brexit.
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
        Reading Introduction to Political Philosophy by Jonathan Wolff, I discovered different political frameworks that outline better ways to run a country, such as utilitarianism or libertarianism. I was especially drawn to Wolff’s discussion on the distribution of justice and equality within society, where he implies that improvements are possible. I encountered philosophy at a school subject taster which presented the moral dilemma of whether or not you should act to divert a runaway train onto a different track to save five lives at the cost of one. As a Christian, this challenged my moral reasoning on where culpability lies. Using David Ricardo’s model of comparative advantage he explains how economic driving forces impact the way the world works, from the cost of coffee to workers’ wages. Although arguably an oversimplification, I am intrigued by the idea of harnessing these forces to effect positive change in society.

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
        Medicine appeals to me because I will have the opportunity to put my interest in science to practical use by helping to reduce people’s suffering. I have a passion for human biology and constantly strive to understand how the body works. Medical research fascinates me since every new discovery creates countless new questions we must answer, particularly in genetics. I was fascinated by Dawkins’; ‘The Selfish Gene’; and also really enjoyed ‘Genome’ by Matt Ridley; a book which has given me an understanding of the subject, as well as some of the issues that medical science is trying to solve. It also gave me an insight into medical conditions such as cystic fibrosis which challenge doctors every day, and into the ethical issues surrounding the virtual elimination of this disease in the US Jewish population.
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
        My particular interests lie in the biological and chemical area of science especially the biology of the human body; the processes that enable the body to operate correctly and the subsequent consequences when malfunctions occur. The fact that science is constantly changing due to new developments is intriguing; our views, ideas and concepts are being modified and challenged on a regular basis. So much so that there will always be opportunities to develop, improve and surpass existing confines, which allows us to research into cures for the conditions and diseases that afflict our society.
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
        Sir Anthony Seldon’s thoughts on whether AI will liberate or infantilise humanity generated debate amongst my peers. I believe that humanity always strives to deliver new innovation as quickly as possible, without considering how ethical issues can affect the community around it. Most memorable was a lecture by Hugo Pinto entitled “The Human Problem of AI” on the use of AI in business processes. Pinto dealt with the strategic planning of building AI for a business, as well as the details of what equipment, hardware, and technology to use for building it. Technology is always changing, and missing trends could be costly. Pinto’s lecture inspired me to think how AI could be integrated into business processes. For my Extended Project Qualification (EPQ) I drew on “The Essence of AI” by Alison Cawsey which explores machine learning and introduced me to neural networking.
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
        Quantum Mechanics is fascinating because it helps explain the behaviour of matter and its interaction with energy on the scale of atoms and subatomic particles. Studying particle physics at AS level has been fascinating. I was delighted to learn about quarks and sub-atomic particle reactions because they explain the inner workings of the atom and how nuclear processes such as alpha and beta decays are feasible. I have watched Leonard Susskind’s lecture on
particles and light. I enjoyed learning that particles are released in discrete quantities and exhibit wave-like properties. Learning about chemical bonds has helped me expand my knowledge on the physical effects of interactions of particles and how the combination of different ions can affect the
physical and chemical properties of compounds.


      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- QUESTIONS -->

    <div style="text-align: center; font-family: Helvetica; margin-left: 5%; margin-right: 5%">
      <h1 style="color: darkred; text-align: justify">Paragraph 3: What particular areas of your subject (i.e. topics. concepts and theories) do you find most interesting and why?</h1>
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
    
    <div class="qs" id="q1" style="margin-top: 20px; width: 90%; padding-left: 5px; padding-right: 5px; padding-top: 10px; text-align: center; margin-left: 5%; margin-right: 5%">
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
        <input type='hidden' id='currentQ' name="CurrentQ" value='3'/>
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
        
        document.getElementById("q3Field").value = par1;
        document.getElementById("nextQ").value = "4";
        
        
        
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
        
        document.getElementById("q3Field").value = par1;
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
        
        document.getElementById("q3Field").value = par1;
        document.getElementById("nextQ").value = "2";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }

    function goToQuestion4(){
      document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q3Field").value = par1;
        document.getElementById("nextQ").value = "4";
        
        
        
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
        
        document.getElementById("q3Field").value = par1;
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
        
        document.getElementById("q3Field").value = par1;
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
        
        document.getElementById("q3Field").value = par1;
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
        
        document.getElementById("q3Field").value = par1;
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
        
        document.getElementById("q3Field").value = par1;
        document.getElementById("nextQ").value = "3";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    </script>

  </body>
</html>
