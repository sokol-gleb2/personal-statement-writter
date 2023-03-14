<?php

    include "connection.php";
    
    
    session_start();
 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: log_in_page.php");
        exit;
    }



    // $studentID = $_POST['StudentID'];
    $studentID = $_SESSION['id'];
    $studentName = "-";
    
    $sql = "SELECT * FROM Student_tbl WHERE StudentID=$studentID;";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $GLOBALS["studentName"] = $row['StudentName'];
            }
        }
    }else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
    
    $sql = "SELECT * FROM Main_tbl WHERE StudentID=$studentID;";
    $statements = [];
    
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                array_push($GLOBALS["statements"], $row['StatementID']);
                
            }
        }
    }else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    
    
    $status = [];
    $date = [];
    
    $versions = [];
    $numberOfVersions = [];
    
    foreach ($statements as $statement){
        
        $sql = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statement . ";";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $vs = [];
                    array_push($vs, $row['VersionID']);
                    array_push($GLOBALS["versions"], end($vs));
                    // print_r($vs);
                    // if (count($vs) > 1){
                    //     array_push($GLOBALS["versions"], end($vs));
                    // }else{
                    //     array_push($GLOBALS["versions"], $vs[0]);
                    // }
                    
                    
                }
            }
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
        $version = end($versions);
        array_push($numberOfVersions, $version);
        $sql0 = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statement . " AND VersionID='$version';";
        if($result = mysqli_query($conn, $sql0)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    array_push($GLOBALS["status"], $row['StatementStatus']);
                    array_push($GLOBALS["date"], $row['LastSaved']);
                }
            }
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
    
    $dates = [];
    for ($i = 0; $i < count($statements); $i++){
        $vers = $numberOfVersions[$i];
        for ($j = 0; $j < intval($vers)+1; $j++){
            $sql1 = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statements[$i] . " AND VersionID='$j';";
            if($result = mysqli_query($conn, $sql1)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        array_push($GLOBALS["dates"], $row['LastSaved']);
                    }
                }
            }else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
    }
    
    
    
    
    
    // foreach( $statements as $value ) {
    //     echo "StatmentID is $value <br>";
    // }
    
    


?>
    
    
    
    
    <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="home_page_student.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Home Page</title>

    <div id="header">
      <div style="">
            <img id="menuLogo" src="MenuLogoAtlas.png" align="left" onclick="goToHome()">
        </div>
        <div class="header" style="width: min(100% - 30px); text-align: center; ">
          <button id="homeButton" class="home_button" onclick="home_button()" style="font-size: 17px; color: #a31621"><b>HOME</b></button>
          <button id="atlasButton" class="home_button" onclick="whyAtlas()" style="font-size: 17px; color: #a31621"><b>WHY ATLAS</b></button>
          <button id="logoutButton" class="home_button" onclick="logout()" style="font-size: 17px; color: #a31621"><b>LOG OUT</b></button>
        </div>

    </div>
    

    <br>
    <br>


  </head>


  <body>
      
      
    <div class="form-popup" id="versionInfo">
      <p style="font-family: Helvetica">
        <u>Select which version you would like to work with:</u>
        <br>
      </p>
      <div class="versions" id="versionsList">
      </div>
      <div style="text-align: center; margin-top: 5px">
        <button type="button" class="btn_cancel" onclick="closeVersionList()">Close</button>
      </div>
    </div>
    
    

    <div id="welcome_to_atlas" style="margin: auto; text-align: center; font-size: 60px; margin-top: 50px">
        Welcome, <i style="font-size: 60px"><b style="color: #A31621" id="name"></b></i>
      <!--<img src="welcome_to_atlas.png">-->
    </div>

    <br>
    <br>

    <!-- Para overview: -->
    <div id="welcome_writing" style="background-color: rgba(255,2555,255,.7);; font-family: Helvetica; text-align: justify;">
        
        <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 50px;">
            <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
            Use the information from your brainstorming and arrange them under the headings of the questions you have already answered. This will provide you with the basic structure of your UCAS statement:
    
          </p>
        
        <p style="color: #A31621; margin-left: 30px; margin-right: 30px; margin-top: 35px; font-size: 23px; font-weight: bold; ">Overview of UCAS Paragraphs</p>
        
        
      <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 10px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>1st Paragraph:</b></i> What event triggered your passion for your subject?
 
      </p>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 20px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>2nd Paragraph:</b></i> How does your combination of A level subjects and skills demonstrate
that you would make a good student for your chosen subject?

      </p>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 20px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>3rd Paragraph:</b></i> What particular areas of your subject (i.e. concepts and theories) do you find most interesting and why?

      </p>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 20px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>4th Paragraph:</b></i> How have you developed these areas of interest beyond work set in class? Include school trips/personal projects, work experience and subject-related extra-curricular activities.

      </p>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 20px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i><b>5th Paragraph:</b></i> Extra-curricular activities, achievements and honours NOT related to your subject (this should form a short penultimate paragraph)

      </p>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 18px; margin-top: 20px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        <i style="color: #A31621"><b style="color: #A31621">6th Paragraph:</b></i> Summarise why you want to study your subject and what you wish to get out of studying your subject. Try to relate this paragraph back to your 1st paragraph.

      </p>
      
      <p style="margin-top: 60px; font-size: 21px; text-align: center">
          <b>Encourage yourself to read your statement.</b>
      </p>
      <p style="margin-top: 10px; font-size: 21px; text-align: center">
        Does it show the <b style="color: #A31621"><i>motivational</i></b> factor?
      </p>
      <p style="margin-top: 5px; font-size: 21px; text-align: center">
        Does it have the <b style="color: #A31621"><i>likeability</i></b> factor?
      </p>
      <p style="margin-top: 5px; font-size: 21px; text-align: center">
        Does it have that <b style="color: #A31621"><i>X-factor</i></b>?
      </p>
      
    </div>





    <div style="text-align: center; margin-top: 50px">
      <h2>Are you ready? Let's begin...</h2>
    </div>
    <div class="wrapper" id="startButtonWrapper" style="text-align: center">
      <button class="startButton" id="startButton" onclick="start()"><span>START NEW PERSONAL STATEMENT</span></button>
    </div>
    
    <div style="text-align: center; visibility: hidden">
        <button id="continueButton" class="continueButton" onclick="goToEdit()">CONTINUE PERSONAL STATEMENTS</button>
    </div>
    
    
    
    
    <div id="newDevelopment" class="newDevelopment" style="">
        <div style="display: inline-block;">
        <h2 style="float: left; color: #a31621; margin-left: 50px;"><u>Previous Drafts:</u></h2>
      </div>
      </br>

      <div id="studentList" style="display: inline-block; width: 90%; margin-left: 5%; margin-right: 5%; ">
        
      </div>

    </div>
    
    <!--<form id="goToStatement" action="editing_ps_page_preview.php" method="POST">-->
    <!--    <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>-->
    <!--    <input type='hidden' id='StatementIDField' name="StatementID" value='0'/>-->
    <!--    <input type='hidden' id='StatementIDLocField' name="StatementIDLoc" value='1'/>-->
    <!--    <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>-->
    <!--</form>-->
    
    <!--<form id="goToStatement" action="creating_ps_page.php" method="POST">-->
    <!--    <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>-->
    <!--    <input type='hidden' id='StatementIDField' name="StatementID" value='0'/>-->
    <!--    <input type='hidden' id='StatementIDLocField' name="StatementIDLoc" value='1'/>-->
    <!--    <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>-->
    <!--</form>-->
    
    <form id="goToStatement" action="creating_ps_page_preview" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='VersionIDField' name="VersionID" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="goToMarkedStatement" action="editing_ps_page_preview_marked" method="POST">
        <input type='hidden' id='markedStudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='markedStatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='markedVersionIDField' name="VersionID" value='0'/>
        <input type='hidden' id='markedStatementIDLocField' name="StatementIDLoc" value='1'/>
        <button type='submit' id="markedHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="createNewPS" action="create-new-ps-id.php" method="POST">
        <input type='hidden' id='createStudentIDField' name="StudentID" value='0'/>
        <button type='submit' id="createHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="whyAtlas" action="whyAtlas" method="POST">
        <input type='hidden' id='whyAtlasStudentID' name="StudentID" value='0'/>
        <input type='hidden' id='whyAtlasVersionID' name="VersionID" value='0'/>
        <input type='hidden' id='whyAtlasCurrPage' name="CurrPage" value='home'/>
        <button type='submit' id="whyAtlasSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    
    
    
    
    <div style="text-align: center; margin-top: 30px">
        2022 © Insight Education Ltd | All Rights Reserved | Company Registration Number: 8934853
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer>
    
    
        const statements = <?php echo json_encode($statements); ?>;
        var status = <?php echo json_encode($status); ?>;
        var date = <?php echo json_encode($date); ?>;
        var name = <?php echo json_encode($studentName); ?>;
        var versions = <?php echo json_encode($numberOfVersions); ?>;
        
        var dates = <?php echo json_encode($dates); ?>;
        
        document.getElementById('name').innerHTML = name;
        let statuses = status.split(",");
        if (statements.length != 0){
            document.getElementById('continueButton').style.visibility = "visible";
            document.getElementById('startButton').style.backgroundColor = "transparent";
            document.getElementById('startButton').style.color = "black";
            document.getElementById('startButton').style.border = "2px solid black";
        }
    
    
      function start(){
        var studentID = '<?= $studentID ?>';
        document.getElementById("createStudentIDField").value = studentID;
        document.getElementById("createHiddenSubmitButton").click();
      }
      
      function whyAtlas(){
          var studentID = '<?= $studentID ?>';
        document.getElementById("whyAtlasStudentID").value = studentID;
        document.getElementById("whyAtlasSubmitButton").click();
      }
    
    // $("#continueButton").click(function(){
    //   $("#studentList").toggle();
    //   $("#newDevelopment").toggle();
    // });
    
    $("#studentList").hide();
    $("#newDevelopment").hide();
    var dateCount = 0;
            for (let i = 0; i < statements.length; i++) {
                const statement = document.createElement("div");
                statement.style.borderBottom = "1px solid black";
                statement.style.borderTop = "1px solid black";
                statement.style.height = "50px";
                statement.style.paddingTop = "25px";
                statement.style.paddingLeft = "10px";
                var currStatus = statuses[i];
                var currDate = date[i];
                statement.innerHTML = "Statement "+(i+1)+" \xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0 Status: "+currStatus+" \xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0 Date: "+currDate;
              
                statement.classList.add("statement");
                statement.id = "statement"+i;
                var currStatement = statements[i];
                var studentID = '<?= $studentID ?>';
                
              
                document.getElementById("studentList").appendChild(statement);
              
              
            }
            
            
            for (let i = 0; i < statements.length; i++) {
                var id = "#statement"+i;
                var currStatus = statuses[i];
                if (currStatus === "submitted" || currStatus === "ongoing") {
                    $(id).click(function(){
                        var statementClicked = this.id;
                        var clicked = statementClicked.replace("statement", "");
                        var dateCount = 0;
                        for (let k = 0; k < parseInt(clicked)+1; k++) {
                            dateCount += parseInt(versions[k])+1;
                        }
                        for (let j = -1; j < parseInt(versions[clicked]); j++){
                            const version = document.createElement("div");
                            version.style.borderBottom = "1px solid black";
                            version.style.borderTop = "1px solid black";
                            version.style.height = "50px";
                            version.style.paddingTop = "25px";
                            version.style.paddingLeft = "10px";
                            var versionDate = dates[dateCount-1];
                            version.innerHTML = "Version "+(j+1)+" \xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0 Date: "+versionDate;
                          
                            version.classList.add("version");
                            version.id = "version"+(j+1);
                            document.getElementById("versionsList").appendChild(version);
                            
                            $("#version"+(j+1)).click(function(){
                                var studentID = '<?= $studentID ?>';
                                document.getElementById("StudentIDField").value = studentID;
                                document.getElementById("StatementIDField").value = statements[i];
                                document.getElementById("VersionIDField").value = (j+1);
                                document.getElementById("hiddenSubmitButton").click();
                            })
                        }
                        $("#versionInfo").css("display", "block");
                    
                    });
                }else {
                    $(id).click(function(){
                        var statementClicked = this.id;
                        var clicked = statementClicked.replace("statement", "");
                        var version = versions[clicked];
                        var studentID = '<?= $studentID ?>';
                        document.getElementById("markedStudentIDField").value = studentID;
                        document.getElementById("markedStatementIDField").value = statements[i];
                        document.getElementById("markedVersionIDField").value = version;
                        document.getElementById("markedHiddenSubmitButton").click();
                    });
                }
                
            }
      
      
      
        function goToEdit(){
            
            $("#studentList").toggle();
            $("#newDevelopment").toggle();
            
            
        //   document.getElementById('studentList').style.visibility = "visible";
        //     document.getElementById('newDevelopment').style.visibility = "visible";
        //     document.getElementById('newDevelopment').style.marginTop = "40px";
            
            
          
        //   location.href = "creating_ps_page_preview.php";
        }
        
        function closeVersionList(){
            // document.getElementById("versionInfo").textContent = '';
            var versions = document.getElementById("versionsList");
            while (versions.firstChild) {
                versions.removeChild(versions.lastChild);
            }
            $("#versionInfo").css("display", "none");
        }
        
        
        function logout() {
            window.location = "log_out.php";
        }
        
        
        
        
        
    </script>

  </body>
</html>
