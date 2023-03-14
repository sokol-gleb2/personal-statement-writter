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
                $GLOBALS["q1"] = $row['StatementQ2'];
                        
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="creating_ps_page_q2.css">
    <link rel="icon" href="MenuLogoAtlas.png" >
    <meta charset="utf-8">
    <title>Creating new PS Q2</title>

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
        Currently, I study History, English Literature and Classics, which I feel have been excellent preparation for a degree in Law. From my study of English Literature, I have gained skills in analysing texts and have learnt to appreciate the influence of the written word. Both English Literature and History mutually reinforce one another; the former is a subjective discipline which allows me to exercise empathy; the latter is an objective discipline, allowing me to see both sides of the argument and select evidence to identify cause and effect and set up debate. Through further reading, including 'Learning the Law' by Glanville Williams, I have become more open-minded about the complexities of the law. It has also helped me to navigate my way through the basics of the legal system.
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
        Along with Economics, I have studied Mathematics, Biology and Chemistry at AS Level. I thoroughly enjoy Mathematics, especially the statistical and problem solving aspect of it. I feel that these are directly relevant to economics, given the important use of econometrics in the subject. In order to further broaden my mathematical skills and knowledge, I am studying AS Level Further Mathematics, along with completing a full A-Level in Mathematics.
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
        My A-levels in physics, mathematics and further mathematics have provided me with a useful
foundation for studying politics, philosophy and economics, developing my skills in logical reasoning and systematic calculation. Mathematics provides me with a strong background in the use of statistical models and analyses. Physics developed my logical problem solving skills, enabling me to apply them to real-world situations such as using theoretical modelling to design a water rocket to reach the maximum possible altitude. I learned how a complex problem can be solved by appropriate simplification and careful consideration of all variables involved.

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
        My A level subjects make me well equipped for university studies. Mathematics has helped me to think about problems logically and develop my skills in applying concepts from other A level subjects. I enjoy studying Chemistry as it teaches me the composition of substances and materials and importance of adhering to instructions. This has developed both my team working and my motor skills. I have shown discipline and effective time management as well as a dedication to exploring medicine-related fields.
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
        At school, chemistry helped me understand biological processes, including osmotic passive processes that cells use to create movement. I learnt that saltwater fish are hypotonic to seawater to regulate salt and water retention. In addition, my mathematics studies were useful for calculating fish growth and catch rates in order to estimate how the population could be exploited sustainability. In Biology, I enjoyed studying ecological life systems such as the reintroduction of wolves to Yellowstone national park, where they not only maintained a healthier deer population.
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
        Mathematics as problem solving gives me immense personal satisfaction. In my A-Level studies, I have found mathematical topics such as differential equations and complex numbers to be especially interesting. Outside of A-Level studies, I have also researched topics such as the Mandelbrot Set and discovered how complex numbers can turn into vivid shapes. My enthusiasm for Mathematics has led me to take part in the UKMT Maths Challenges, through which I have achieved various gold certificates. My natural problem-solving ability and enjoyment of the practical application of mathematical tools provides me with good foundations to study Computer Science at University Level.
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
        My biology studies have allowed me to develop experimental skills, and to see how advancements in physics can lead to discoveries such as DNA. Throughout my A-level studies, many other subjects have enhanced the skills I need to succeed in physics. I have improved my independent learning skills by taking A2 maths a year early and studying a unit of Social and Political Economy at the South Bank University. From my studies of history I have enhanced my analytical and evaluative skills through discussion with my peers and improved my ability to work to deadlines.

      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>



    <!-- Questions/Preview Banner -->

    <div id="banner">


      <div class="outer">

      <button class="banner" style="height: 60px" onclick="goToQuestion1()">PARAGRAPH 1</button>
      <button class="banner">PARAGRAPH 2</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion3()">PARAGRAPH 3</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion4()">PARAGRAPH 4</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion5()">PARAGRAPH 5</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion6()">PARAGRAPH 6</button>
      <button class="banner" style="height: 60px" onclick="goToPreview()">PREVIEW</button>

    </div>




    </div>
    
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

    <!------------------------------>


    <!-- QUESTIONS -->

    <div style="text-align: center">
      <h1 style="color: darkred; font-family: Helvetica; text-align: justify; margin-left: 5%; margin-right: 5%">Paragraph 2: How do your combination of A level subjects and skills demonstrate that you would make a good student for your chosen subject?</h1>
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
      
    

    <!--------------------->
    
    <form id="scoreSubmit" action="save.php" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='1'/>
        <input type='hidden' id='VersionIDField' name="VersionID" value='1'/>
        <input type='hidden' id='q1Field' name="q1" value='1'/>
        <input type='hidden' id='q2Field' name="q2" value='1'/>
        <input type='hidden' id='q3Field' name="q3" value='1'/>
        <input type='hidden' id='q4Field' name="q4" value='1'/>
        <input type='hidden' id='q5Field' name="q5" value='1'/>
        <input type='hidden' id='q6Field' name="q6" value='1'/>
        <input type='hidden' id='nextQ' name="NextQ" value='3'/>
        <input type='hidden' id='currentQ' name="CurrentQ" value='2'/>
        <input type='hidden' id='newVersion' name="NewVersion" value='true'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="whyAtlas" action="whyAtlas" method="POST">
        <input type='hidden' id='whyAtlasStudentID' name="StudentID" value='0'/>
        <input type='hidden' id='whyAtlasStatementID' name="StatementID" value='0'/>
        <input type='hidden' id='whyAtlasCurrPage' name="CurrPage" value='2'/>
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
        
        document.getElementById("q2Field").value = par1;
        document.getElementById("nextQ").value = "3";
        
        
        
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
        
        document.getElementById("q2Field").value = par1;
        document.getElementById("nextQ").value = "1";
        
        
        
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
        
        document.getElementById("q2Field").value = par1;
        document.getElementById("nextQ").value = "3";
        
        
        
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
        
        document.getElementById("q2Field").value = par1;
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
        
        document.getElementById("q2Field").value = par1;
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
        
        document.getElementById("q2Field").value = par1;
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
        
        document.getElementById("q2Field").value = par1;
        document.getElementById("nextQ").value = "preview";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    
    function help_button(){
        closeForm();
        $("#container").css("visibility", "visible");
    }
    
    function closePopUp(){
        $("#container").css("visibility", "hidden");
    }
    
    function save_button(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q2Field").value = par1;
        document.getElementById("nextQ").value = "2";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function home_button(){
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        
        var par1 = document.getElementById("q1Text").value;
        
        if (par1 === q1){
            document.getElementById("newVersion").value = "false";
        }
        
        document.getElementById("q2Field").value = par1;
        document.getElementById("nextQ").value = "home";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }
    
    function whyAtlas(){
        document.getElementById("whyAtlasStudentID").value = studentID;
        document.getElementById("whyAtlasStatementID").value = statementID;
        document.getElementById("whyAtlasSubmitButton").click();
    }


    </script>



  </body>
</html>
