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
                $GLOBALS["q1"] = $row['StatementQ6'];
                        
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="creating_ps_page_q6.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Creating new PS Q6</title>

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
      <button class="banner" style="height: 60px" onclick="goToQuestion3()">PARAGRAPH 3</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion4()">PARAGRAPH 4</button>
      <button class="banner" style="height: 60px" onclick="goToQuestion5()">PARAGRAPH 5</button>
      <button class="banner">PARAGRAPH 6</button>
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
        I look forward to studying law as it combines my passion for politics, reading, creative writing, and public speaking. It has shaped human behaviour and understanding since the start of civilisation, but its role in driving society today is what cemented my decision to study law. 
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
        I love seeing how economic theories actually work out in practice. My visits to India allowed me to witness the economic miracle that has taken place and the way it has changed lives for the better. Although globalisation has been somewhat negatively portrayed, the economic miracles in China and India could never have taken place without this. I am passionate to learn how economic policies can be used to improve people’s lives everywhere.
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
        My desire is to achieve real social change by taking my efforts further than just community and voluntary service, stepping up into a role of social, political and economic leadership. To do this I need to better understand society and the way it works. Building upon my analytical background in mathematics, a degree in PPE would be the ideal platform from which to pursue such a career.

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
        My experiences have given me a realistic insight into both the stimulating and harsher side of dentistry. My longstanding interest in oral care, combined with a genuine desire to care for the health of young and old demonstrates that I am ready to commit fully and whole-heartedly to this profession.
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
        My interest and research into biomedical science outside my school studies have given me a good foundation for university studies that will hopefully lead to a medical-related career. Furthermore, with my future qualifications I am eager to offer my services to my home country as a scientist and hopefully lecture and inspire others.


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
        Without question, a degree in Computer Science will provide me with specialist knowledge and
intellectual fulfilment. It would give me the potential to enter into a career in IT, creating new technologies and applications to make my own contribution to society. It is my primary ambition, and I am certain it will provide me with many enjoyable years of study as well as opening a wide and flexible path when choosing a rewarding career.


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
        As a person who enjoys understanding how the world works, I am keen to become involved in scientific research. My hardworking nature and willingness to investigate, coupled with the excitement of being on the brink of discovery, makes me suitable for a career in this field. I believe that now is a very exciting time; scientific knowledge is continually expanding and the possibilities of what can be achieved are becoming almost endless and, for these reasons, I want to be part of this new age of science.



      </p>

      <div style="text-align: center">
        <button type="button" class="btn_cancel" onclick="closeForm()">Close</button>
      </div>

    </div>
    <!------------>


    <!-- QUESTIONS -->

    <div style="text-align: center; margin-left: 5%; margin-right: 5%">
      <h1 style="color: darkred; text-align: justify; font-family: Helvetica"> Paragraph 6: Summarise why you want to study your subject and what you wish to get out of studying your subject. Try to relate this paragraph back to your 1st paragraph.</h1>
    </div>
    
    <div class="helpBox">
        <p style="font-size: 20px; color: #a31621">Need some ideas? Use the below questions where needed to help write your paragraph:</p>
        <ul>
            <li style="margin: 5px">Have you explored your undergraduate course or A level topics related to your future studies? Have you taken the initiative to join a society/group that shows wider interests in your university course?</li>
            <li style="margin: 5px">Can you name the event/title and who spoke or authored; summarise their arguments and give an opinion on the strength of the information? What are the wider implications of their argument and why did you find it interesting/compelling?</li>
            <li style="margin: 5px">Have you undertaken relevant work experience? What did you learn? What did you observe that was thought-provoking?</li>
        </ul>
    </div>

    
    <div class="qs" id="q1" style="margin-top: 20px; width: 90%; padding-left: 5px; padding-right: 5px; padding-top: 10px; text-align: center; margin-left: 5%; margin-right: 5%;">
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
        <input type='hidden' id='q4Field' name="q4" value='1'/>
        <input type='hidden' id='q5Field' name="q5" value='1'/>
        <input type='hidden' id='q6Field' name="q6" value='1'/>
        <input type='hidden' id='nextQ' name="NextQ" value='1'/>
        <input type='hidden' id='currentQ' name="CurrentQ" value='6'/>
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
      <button class="saveButton" id="saveButton" onclick="save()"><span>SAVE AND PREVIEW</span></button>
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

    function help_button(){
        $("#container").css("visibility", "visible");
    }
    
    function closePopUp(){
        $("#container").css("visibility", "hidden");
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
        
        document.getElementById("q6Field").value = par1;
        document.getElementById("nextQ").value = "preview";
        
        
        
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
        
        document.getElementById("q6Field").value = par1;
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
        
        document.getElementById("q6Field").value = par1;
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
        
        document.getElementById("q6Field").value = par1;
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
        
        document.getElementById("q6Field").value = par1;
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
        
        document.getElementById("q6Field").value = par1;
        document.getElementById("nextQ").value = "5";
        
        
        
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
        
        document.getElementById("q6Field").value = par1;
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
        
        document.getElementById("q6Field").value = par1;
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
        
        document.getElementById("q6Field").value = par1;
        document.getElementById("nextQ").value = "6";
        
        
        
        document.getElementById("hiddenSubmitButton").click();
    }


    </script>

  </body>
</html>
