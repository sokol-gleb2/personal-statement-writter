<?php

    include "connection.php";
    
    session_start();
 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: log_in_page.php");
        exit;
    }
    
    
    $studentID = [];
    $statementID = [];
    $studentNames = [];
    $TutorIDs = [];
    $tutorIDs = [];
    $tutorID = $_SESSION['id'];
    
    $studentIDs = [];
    $statementIDs = [];
    $totalVersions = [];
    $status = [];
    $date = [];
    $allVersions = [];
    $studentNames = [];
    $tutorNames = [];
    
    $namesFinal = [];
    $totalStatements = [];
    $tutorName = "";
    
    if ($tutorID === "admin") {
        $sql = "SELECT * FROM Main_tbl WHERE 1;";
        if ($result = mysqli_query($conn, $sql)) {
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    array_push($GLOBALS["studentID"], $row['StudentID']);
                    array_push($GLOBALS["statementID"], $row['StatementID']);
                    array_push($GLOBALS["TutorIDs"], $row['TutorID']);
                }    
            }
        }
        for ($i = 0; $i < count($GLOBALS["statementID"]); $i++) {
            $currStatement = $GLOBALS["statementID"][$i];
            $currStudent = $GLOBALS["studentID"][$i];
            $currTutor = $GLOBALS["TutorIDs"][$i];
            $sql2 = "SELECT * FROM Statement_tbl WHERE StatementID='$currStatement';";
            if ($result = mysqli_query($conn, $sql2)) {
                if(mysqli_num_rows($result) > 0) {
                    $versions = [];
                    while ($row = mysqli_fetch_array($result)) {
                        array_push($versions, $row['VersionID']);
                        array_push($GLOBALS["allVersions"], $row['VersionID']);
                        array_push($GLOBALS["status"], $row['StatementStatus']);
                    }
                }
            }
            foreach ($versions as $version){
                array_push($GLOBALS['totalVersions'], end($versions));
                array_push($GLOBALS['statementIDs'], $currStatement);
                array_push($GLOBALS['studentIDs'], $currStudent);
                array_push($GLOBALS['tutorIDs'], $currTutor);
                $sqlV = "SELECT * FROM Statement_tbl WHERE StatementID='$currStatement' AND VersionID='$version';";
                if ($result = mysqli_query($conn, $sqlV)) {
                    if(mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)){
                            // array_push($GLOBALS["status"], $row["StatementStatus"]);
                            array_push($GLOBALS["date"], $row["LastSaved"]);
                        }
                    }
                }
            }
            unset($versions);
            
        }
        for ($i = 0; $i < count($GLOBALS['studentIDs']); $i++) {
            $st = $GLOBALS['studentIDs'][$i];
            $tr = $GLOBALS['tutorIDs'][$i];
            
            $sqlS = "SELECT * FROM Student_tbl WHERE StudentID='$st';";
            if ($result = mysqli_query($conn, $sqlS)) {
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        array_push($studentNames, $row['StudentName']);
                    }
                }
            }
            
            $sqlT = "SELECT * FROM Tutor_tbl WHERE TutorID='$tr';";
            if ($result = mysqli_query($conn, $sqlT)) {
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        array_push($tutorNames, $row['TutorName']);
                    }
                }
            }
        }
        
    }else {
        
        $sql = "SELECT * FROM Tutor_tbl WHERE TutorID=" . $tutorID . ";";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                
                while($row = mysqli_fetch_array($result)){
                    $GLOBALS["tutorName"] = $row['TutorName'];
                    
                }
            }else{
                echo "No records matching your query were found.";
            }
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
        
        
        
        $sql = "SELECT * FROM Main_tbl WHERE TutorID=" . $tutorID . ";";
        
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                
                while($row = mysqli_fetch_array($result)){
                    array_push($GLOBALS["studentID"], $row['StudentID']);
                    array_push($GLOBALS["statementID"], $row['StatementID']);
                    
                }
            }else{
                echo "No records matching your query were found.";
            }
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        
        
        
        foreach ($studentID as $student){
            $sql2 = "SELECT * FROM Student_tbl WHERE StudentID=" . $student . ";";
            
            if($result = mysqli_query($conn, $sql2)){
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result)){
                        array_push($GLOBALS["studentNames"], $row['StudentName']);
                    }
                }else{
                    echo "No records matching your query were found.";
                }
            }else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
            }
            
        }
        
        
        
        for ($i = 0; $i < count($statementID); $i++){
            $statement = $statementID[$i];
            $currName = $studentNames[$i];
            $sql3 = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statement . ";";
            
            if($result = mysqli_query($conn, $sql3)){
                if(mysqli_num_rows($result) > 0){
                    $versions = [];
                    while($row = mysqli_fetch_array($result)){
                        array_push($GLOBALS["allVersions"], $row['VersionID']);
                        array_push($GLOBALS["namesFinal"], $currName);
                        array_push($versions, $row['VersionID']);
                    }
                    
                }else{
                    echo "No records matching your query were found.";
                }
            }else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
            }
            
            foreach ($versions as $versionID){
                array_push($GLOBALS["totalStatements"], $statement);
                $sql4 = "SELECT * FROM Statement_tbl WHERE StatementID=" . $statement . " AND VersionID='$versionID';";
                if($result = mysqli_query($conn, $sql4)){
                    if(mysqli_num_rows($result) > 0){
                        
                        while($row = mysqli_fetch_array($result)){
                            array_push($GLOBALS["status"], $row['StatementStatus']);
                            array_push($GLOBALS["date"], $row['LastSaved']);
                        }
                    }else{
                        echo "No records matching your query were found.";
                    }
                }else{
                    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
                }
            }
            for ($j = 0; $j < count($versions); $j++){
                array_push($GLOBALS['totalVersions'], end($versions));            
            }
            unset($versions);
            
        }
        
        
    }
    
    
    
    function displayStudents() {
        include "connection.php";
        $studentIDs = [];
        $tutorIDs = [];
        $sql = "SELECT * FROM Main_tbl WHERE 1;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_array($result)) {
                array_push($studentIDs, $row['StudentID']);
                array_push($tutorIDs, $row['TutorID']);
            }
            
        }else {
            return "0 results";
        }
        
        $students = [];
        foreach ($studentIDs as $studentID) {
            $getStudentNames = "SELECT * FROM Student_tbl WHERE StudentID=$studentID;";
            $result = mysqli_query($conn, $getStudentNames);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    array_push($students, $row['StudentName']);    
                }
            }
        }
        
        $tutors = [];
        foreach ($tutorIDs as $tutorID) {
            $getTutorNames = "SELECT * FROM Tutor_tbl WHERE TutorID=$tutorID;";
            $result = mysqli_query($conn, $getTutorNames);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    array_push($tutors, $row['TutorName']);    
                }
            }
        }
            
        $return = [$students, $tutors];
        return $return;
        $conn->close();
        
    }
    
    function getTutorDropdownList() {
        include "connection.php";
        $tutorNames = [];
        $tutorIDs = [];
        $sql = "SELECT * FROM Tutor_tbl WHERE 1;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_array($result)) {
                array_push($tutorNames, $row['TutorName']);
                array_push($tutorIDs, $row['TutorID']);
            }
            
        }else {
            return "0 results";
        }
        $return = [$tutorIDs, $tutorNames];
        return $return;
    }
    
    
    
    
    
    
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="home_page_tutor.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Tutor Home Page</title>

    <div id="header">
      <div>
        <img id="menuLogo" src="MenuLogoAtlas.png" alt="">
      </div>
      <div class="header" id="menuHeader">
        <button class="home_button" id="homeButton">HOME</button>
        <button class="home_button" id="helpButton">HELP</button>
        <button class="home_button" id="logoutButton" onclick="logout()">LOG OUT</button>
      </div>
      <div class="searchBar">
        <img src="searchIcon.png" class="searchLogo">
        <input type="text" placeholder="Enter name of student here..." class="searchInput">
        <img src="crossIcon.png" class="crossLogo">
      </div>

    </div>

    <br>
    <br>


  </head>
  <body>

    <div style="text-align: center">
      <p style="font-size: 40px">Welcome back, <i id="welcome_back_message" class="welcome_back"></i></p>
    </div>

    <br>
    

    <div id="projectStats" class="container space-around">
      <div style="text-align: center; overflow-wrap: break-word; display: inline-block">
        <p class="projectsText">Already Reviewed:</p>
        <p class="ongoingProjectsStat" id="alreadyReviewedCount">0</p>
      </div>

      <div style="text-align: center; display: inline-block">
        <p class="projectsText">Ongoing Projects:</p>
        <p class="completedProjectsStat" id="ongoingProjectsCount">0</p>
      </div>

      <div style="text-align: center; display: inline-block">
        <p class="projectsText">To Be Reviewed:</p>
        <p class="newDevelopmentProjectsStat" id="toBeReviewedCount">0</p>
      </div>
    </div>

    <br>
    <br>
    
    <div id="studentListBanner" style="display: none" class="newDevelopment">
      <div style="display: inline-block;">
        <h2 style="float: left; color: #a31621; margin-left: 50px"><u>Students:</u></h2>
      </div>
      </br>
      <div class="detailBanner" id="studentListView">
          <div class="details" style="width: 33%">Student Name:</div>
          <div class="details" style="width: 33%">Number of Statements:</div>
          <div class="details" style="width: 33%">Tutor Name:</div>
          <!--<div class="details" style="width: 24%">Last Active</div>-->
          <!-- used to be: 28, 14, 28, 24 -->
      </div>
      <div id="studentListViewAdmin">
        
      </div>
    </div>
    
    <dialog id="studentDetailChange">
        <div id="closeDialog" onclick="closeDialog()">Close</div>
        <div id="currentTutor" style="width: 100%; text-align: center"></div>
        <div style="margin-top: 5%">
            <label for="tutorSelect">Assign Tutor:</label>
            <select id="tutorList" name="tutorSelect" style="width: 30%; margin-left: 5%; min-width: 100px"></select>
            <input type="submit" value="Update" onclick="updateTutor()" style="float: right; width: 20%; min-width: 100px">
        </div>
        <div style="width: 100%; height: 100%">
            <button id="deleteStudent" onlick="deleteStudent()">Delete Student</button>
        </div>
    </dialog>


    <div id="newDevelopment" class="newDevelopment">
      <div style="display: inline-block;">
        <h2 style="float: left; color: #a31621; margin-left: 50px"><u>To Be Reviewed:</u></h2>
      </div>
      </br>
      <div class="detailBanner" id="detailBannerSubmitted">
          <div class="details" style="width: 29%">Student Name:</div>
          <div class="details" style="width: 24%">Version / Total Versions</div>
          <div class="details" style="width: 29%">Tutor Name:</div>
          <div class="details" style="width: 14%">Date</div>
      </div>
      <div id="studentList">
        
      </div>

    </div>
    
    <br>
    
    <div id="ongoingProjects" class="newDevelopment">
      <div style="display: inline-block;">
        <h2 style="float: left; color: #a31621; margin-left: 50px"><u>Ongoing Projects:</u></h2>
      </div>
      </br>
      <div class="detailBanner" id="detailBannerOngoing">
          <div class="details" style="width: 29%">Student Name:</div>
          <div class="details" style="width: 24%">Version / Total Versions</div>
          <div class="details" style="width: 29%">Tutor Name:</div>
          <div class="details" style="width: 14%">Date</div>
      </div>
      <div id="studentListOngoing">
        
      </div>

    </div>
    
    <br>
    
    <div id="oldDevelopment" class="newDevelopment">
      <div style="display: inline-block;">
        <h2 style="float: left; color: #a31621; margin-left: 50px"><u>Already Reviewed:</u></h2>
      </div>
      </br>
      <div class="detailBanner" id="detailBannerReviewed">
          <div class="details" style="width: 29%">Student Name:</div>
          <div class="details" style="width: 24%">Version / Total Versions</div>
          <div class="details" style="width: 29%">Tutor Name:</div>
          <div class="details" style="width: 14%">Date</div>
      </div>
      <div id="studentListReviewed">
        

      </div>



    </div>
    
    <form id="goToStatement" action="edit" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='TutorIDField' name="TutorID" value='0'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='0'/> 
        <input type='hidden' id='VersionIDField' name="VersionID" value='0'/> 
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <form id="updateTutor" action="updateTutor" method="POST">
        <input type='hidden' id='StudentForUpdate' name="studentForUpdate" value='0'/>
        <input type='hidden' id='SelectedTutorID' name="selectedTutorID" value='0'/>
        <button type='submit' id="updateButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="hash.js"></script>
    <script>
        var tutorID = '<?= $tutorID ?>';
        var versions = <?php echo json_encode($allVersions); ?>;
        var tutorName = "";
        var status = <?php echo json_encode($status); ?>;
        let statuses = status.split(",");
        var date = <?php echo json_encode($date); ?>;
        var studentID = <?php echo json_encode($studentID); ?>;
        var totalVersions = <?php echo json_encode($totalVersions); ?>;
        var toBeReviewedCount = 0;
        var alreadyReviewedCount = 0;
        var ongoingProjects = 0;
        var studentForUpdate;
        // var studentNames;
        // var tutorNames;
        
        if (tutorID === "admin") {
            var studentNames = <? echo json_encode($studentNames); ?>;
            var tutorNames = <? echo json_encode($tutorNames); ?>;
            tutorName = "admin";
            
            const studentsButton = document.createElement("button");
            studentsButton.classList.add("home_button");
            studentsButton.style.marginLeft = "17px";
            studentsButton.style.marginRight = "17px";
            studentsButton.innerHTML = "STUDENTS";
            document.getElementById("menuHeader").appendChild(studentsButton);
            
            const emailButton = document.createElement("button");
            emailButton.classList.add("home_button");
            emailButton.style.marginLeft = "17px";
            emailButton.style.marginRight = "17px";
            emailButton.innerHTML = "EMAIL";
            emailButton.onclick = function() {
                window.location = "email";
            }
            document.getElementById("menuHeader").appendChild(emailButton);
            
            
            //function to look at all students and see how many
            const ls = <?php echo json_encode(displayStudents()); ?>;
            const studentListForAdmin = ls[0];
            const tutorListForAdmin = ls[1];
                    
            const statementCount = new HashMap();
            const studentsHash = new HashMap();
            for (var i = 0; i < studentListForAdmin.length; i++) {
                if (studentsHash.has(studentListForAdmin[i])) {
                    statementCount.set(studentListForAdmin[i], (statementCount.get(studentListForAdmin[i])+1));
                }else {
                    statementCount.set(studentListForAdmin[i], 1);
                    studentsHash.set(studentListForAdmin[i], tutorListForAdmin[i]);
                }
            }
                    
            for (var i = 0; i < studentsHash.keys.length; i++) {
                var studentWrite = studentsHash.keys[i].content;
                var tutorWrite = studentsHash.get(studentWrite);
                var statementNumberWrite = statementCount.get(studentWrite);
                        
                const statement = document.createElement("div");
                statement.id = i;
                statement.classList.add("statementAdminView");
                        
                const studentName = document.createElement("div");
                const numberOfStatements = document.createElement("div");
                const tutorName = document.createElement("div");
                        
                studentName.classList.add("statementDetails");
                tutorName.classList.add("statementDetails");
                numberOfStatements.classList.add("statementDetails");
                        
                studentName.style.width = "33%";
                tutorName.style.width = "33%";
                numberOfStatements.style.width = "29%";
                numberOfStatements.style.paddingLeft = "5%";
                        
                studentName.innerHTML = studentWrite;
                tutorName.innerHTML = tutorWrite;
                numberOfStatements.innerHTML = statementNumberWrite;
                        
                statement.appendChild(studentName);
                statement.appendChild(numberOfStatements);
                statement.appendChild(tutorName);
                document.getElementById("studentListViewAdmin").appendChild(statement);
                
                statement.onclick = function() {
                    //pop up
                    let sw = statement.getElementsByTagName('div')[0].innerHTML;
                    let tr = statement.getElementsByTagName('div')[2].innerHTML;
                    
                    document.getElementById("currentTutor").innerHTML = sw + "'s current tutor is: " + tr;
                    var st = document.getElementById("studentDetailChange");
                    st.showModal();
                    
                    studentForUpdate = statement.id;
                    
                }
            }
            var tutorListDropdown = document.getElementById("tutorList");
            const tutorDropdownList = <?php echo json_encode(getTutorDropdownList()); ?>;
            var tdl = tutorDropdownList[1];
            tdl.forEach((item) => {
                var tutor = document.createElement("option");
                tutor.text = item;
                tutorListDropdown.add(tutor);
            });
            
            // close modal dialog:
            function closeDialog() {
                document.getElementById("studentDetailChange").close();
            }
            //-----------------------------------------------------------------------------    
                    
            studentsButton.onclick = function() {
                if (document.getElementById("studentListBanner").style.display == "block") {
                    document.getElementById("studentListBanner").style.display = "none";
                    
                    
                }else {
                    document.getElementById("studentListBanner").style.display = "block";
                    document.getElementById("studentListBanner").style.marginBottom = "20px";
                    document.getElementById("studentListView").classList.add("show");
                    
                    
                    
                }
                
            }
            document.getElementById("helpButton").style.marginRight = "17px";
            
            // ADD CODE BELOW: Add all projects to the screen => Student Name : Version / All Versions : Tutor Name : Date
            for (let i = 0; i < statuses.length; i++) {
                if (statuses[i] === "submitted") {
                    toBeReviewedCount += 1;
                    document.getElementById("detailBannerSubmitted").classList.add("show");
                    const statement = document.createElement("div");
                    statement.classList.add("statementAdminView");
                    
                    var studentName = studentNames[i];
                    var currTutorName = tutorNames[i];
                    var statementDate = date[i];
                    var statementVersion = (parseInt(versions[i])+1).toString()+"/"+(parseInt(totalVersions[i])+1);
                    
                    const studentNameDiv = document.createElement("div");
                    const statementVersionDiv = document.createElement("div");
                    const tutorNameDiv = document.createElement("div");
                    const statementDateDiv = document.createElement("div");
                    
                    studentNameDiv.innerHTML = studentName;
                    statementVersionDiv.innerHTML = statementVersion;
                    tutorNameDiv.innerHTML = currTutorName;
                    statementDateDiv.innerHTML = statementDate;
                    
                    studentNameDiv.style.width = "27%";
                    statementVersionDiv.style.width = "24%";
                    statementVersionDiv.style.paddingLeft = "5%";
                    tutorNameDiv.style.width = "29%";
                    statementDateDiv.style.width = "14%";
                    
                    studentNameDiv.classList.add("statementDetails");
                    statementVersionDiv.classList.add("statementDetails");
                    tutorNameDiv.classList.add("statementDetails");
                    statementDateDiv.classList.add("statementDetails");
                    
                    
                    statement.appendChild(studentNameDiv);
                    statement.appendChild(statementVersionDiv);
                    statement.appendChild(tutorNameDiv);
                    statement.appendChild(statementDateDiv);
                    document.getElementById("studentList").appendChild(statement);
                }else if (statuses[i] === "ongoing") {
                    ongoingProjects += 1;
                    document.getElementById("detailBannerOngoing").classList.add("show");
                    const statement = document.createElement("div");
                    statement.classList.add("statementAdminView");
                    
                    var studentName = studentNames[i];
                    var currTutorName = tutorNames[i];
                    var statementDate = date[i];
                    var statementVersion = (parseInt(versions[i])+1).toString()+"/"+(parseInt(totalVersions[i])+1);
                    
                    const studentNameDiv = document.createElement("div");
                    const statementVersionDiv = document.createElement("div");
                    const tutorNameDiv = document.createElement("div");
                    const statementDateDiv = document.createElement("div");
                    
                    studentNameDiv.innerHTML = studentName;
                    statementVersionDiv.innerHTML = statementVersion;
                    tutorNameDiv.innerHTML = currTutorName;
                    statementDateDiv.innerHTML = statementDate;
                    
                    studentNameDiv.style.width = "27%";
                    statementVersionDiv.style.width = "24%";
                    statementVersionDiv.style.paddingLeft = "5%";
                    tutorNameDiv.style.width = "29%";
                    statementDateDiv.style.width = "14%";
                    
                    studentNameDiv.classList.add("statementDetails");
                    statementVersionDiv.classList.add("statementDetails");
                    tutorNameDiv.classList.add("statementDetails");
                    statementDateDiv.classList.add("statementDetails");
                    
                    
                    statement.appendChild(studentNameDiv);
                    statement.appendChild(statementVersionDiv);
                    statement.appendChild(tutorNameDiv);
                    statement.appendChild(statementDateDiv);
                    document.getElementById("studentListOngoing").appendChild(statement);
                    
                }else {
                    alreadyReviewedCount += 1;
                    document.getElementById("detailBannerReviewed").classList.add("show");
                    const statement = document.createElement("div");
                    statement.classList.add("statementAdminView");
                    
                    var studentName = studentNames[i];
                    var currTutorName = tutorNames[i];
                    var statementDate = date[i];
                    var statementVersion = (parseInt(versions[i])+1).toString()+"/"+(parseInt(totalVersions[i])+1);
                    
                    const studentNameDiv = document.createElement("div");
                    const statementVersionDiv = document.createElement("div");
                    const tutorNameDiv = document.createElement("div");
                    const statementDateDiv = document.createElement("div");
                    
                    studentNameDiv.innerHTML = studentName;
                    statementVersionDiv.innerHTML = statementVersion;
                    tutorNameDiv.innerHTML = currTutorName;
                    statementDateDiv.innerHTML = statementDate;
                    
                    studentNameDiv.style.width = "27%";
                    statementVersionDiv.style.width = "24%";
                    statementVersionDiv.style.paddingLeft = "5%";
                    tutorNameDiv.style.width = "29%";
                    statementDateDiv.style.width = "14%";
                    
                    studentNameDiv.classList.add("statementDetails");
                    statementVersionDiv.classList.add("statementDetails");
                    tutorNameDiv.classList.add("statementDetails");
                    statementDateDiv.classList.add("statementDetails");
                    
                    
                    statement.appendChild(studentNameDiv);
                    statement.appendChild(statementVersionDiv);
                    statement.appendChild(tutorNameDiv);
                    statement.appendChild(statementDateDiv);
                    document.getElementById("studentListReviewed").appendChild(statement);
                }
            }
            
            
        }else {
            var names = <?php echo json_encode($namesFinal); ?>;
            var statements = <?php echo json_encode($totalStatements); ?>;
            tutorName = <?php echo json_encode($tutorName); ?>;
            
            for (let i = 0; i < names.length; i++) {
                currStatus = statuses[i];
                if (currStatus == "submitted"){
                    
                    toBeReviewedCount += 1;
                    
                    const statement = document.createElement("div");
                    
                    statement.style.borderBottom = "1px solid black";
                    statement.style.borderTop = "1px solid black";
                    statement.style.height = "50px";
                    // statement.style.paddingTop = "25px";
                    
                    studentName = names[i];
                    currDate = date[i];
                    currVersion = versions[i];
                    totalVersion = totalVersions[i];
                    const name = document.createElement("div");
                    const version = document.createElement("div");
                    const status = document.createElement("div");
                    const dateS = document.createElement("div");
                    name.classList.add("name");
                    version.classList.add("version");
                    status.classList.add("status");
                    dateS.classList.add("date");
                    name.innerHTML = studentName;
                    version.innerHTML = "Version: "+(parseInt(currVersion)+1).toString()+"/"+(parseInt(totalVersion)+1);
                    status.innerHTML = "Status: submitted";
                    dateS.innerHTML = "Date: "+currDate;
                    
                    
                    statement.classList.add("statement");
                    statement.id = "statement"+i;
                    currStatement = statements[i];
                    var currStudentID = studentID[i];
                    statement.onclick = function(){
                        document.getElementById("StudentIDField").value = currStudentID;
                        document.getElementById("TutorIDField").value = tutorID;
                        document.getElementById("StatementIDField").value = statements[i];
                        document.getElementById("VersionIDField").value = versions[i];
                        document.getElementById("hiddenSubmitButton").click();
                            
                    };
                    document.getElementById("studentList").appendChild(statement);
                    statement.appendChild(name);
                    statement.appendChild(version);
                    statement.appendChild(status);
                    statement.appendChild(dateS);
                }else if (currStatus == "marked"){
                    
                    alreadyReviewedCount += 1;
                    
                    const statement = document.createElement("div");
                    
                    statement.style.borderBottom = "1px solid black";
                    statement.style.borderTop = "1px solid black";
                    statement.style.height = "50px";
                    statement.style.paddingTop = "25px";
                    
                    studentName = names[i];
                    currDate = date[i];
                    
                    const name = document.createElement("div");
                    const status = document.createElement("div");
                    const dateS = document.createElement("div");
                    name.classList.add("name");
                    status.classList.add("status");
                    dateS.classList.add("date");
                    name.innerHTML = studentName;
                    status.innerHTML = "Status: submitted";
                    dateS.innerHTML = "Date: "+currDate;
                    
                    
                    statement.classList.add("statement");
                    statement.id = "statement"+i;
                    // currStatement = statements[i];
                    var currStudentID = studentID[i];
                    // statement.onclick = function(){
                    //     document.getElementById("StudentIDField").value = currStudentID;
                    //     document.getElementById("StatementIDLocField").value = i;
                    //     document.getElementById("hiddenSubmitButton").click();
                            
                    // };
                    document.getElementById("studentListReviewed").appendChild(statement);
                    statement.appendChild(name);
                    statement.appendChild(status);
                    statement.appendChild(dateS);
                    // statement.onclick = function(){
                    //     document.getElementById("markedStudentIDField").value = studentID;
                    //     document.getElementById("markedStatementIDLocField").value = i;
                    //     document.getElementById("markedHiddenSubmitButton").click();
                        
                    // };
                }
                
              
                
              
              
            }
        }
    
        document.getElementById('welcome_back_message').innerHTML = tutorName;
        document.getElementById("toBeReviewedCount").innerHTML = toBeReviewedCount;
        document.getElementById("ongoingProjectsCount").innerHTML = ongoingProjects;
        document.getElementById("alreadyReviewedCount").innerHTML = alreadyReviewedCount;
            
            
        
        
        //Search thing:
          $(".searchLogo").click(function(){
              if (this.className === "searchLogo toggled"){
                valueEntered();
              }else{
                $(".searchLogo").addClass("toggled");
                $(".searchBar").addClass("toggled");
                $(".searchInput").addClass("toggled");
                $(".crossLogo").addClass("toggled");
              }
    
              $(document).keypress(function(event){
                if (event.which === 13){
                  valueEntered();
                }
              })
          });
    
          $(".crossLogo").click(function(){
            var search = $(".searchInput");
            search.attr("placeholder", "Enter name of student here...");
            search.removeClass("wrongInput");
            $(".searchLogo").removeClass("toggled");
            $(".searchBar").removeClass("toggled");
            $(".searchInput").removeClass("toggled");
            $(".crossLogo").removeClass("toggled");
          });
    
          var screen_size = window.innerWidth;
          if (screen_size < 815){
            $(".searchInput").attr("placeholder", "Name of student...");
          }
    
          function valueEntered() {
            var search = $(".searchInput");
            if (search.val().trim().length === 0){
              search.val("");
              search.attr("placeholder", "Nothing Found")
              search.addClass("wrongInput");
            }else{
              //function for checking student
              checkStudent(search.val());
            }
          }
    
          function checkStudent(dataEntered) {
    
          }
          
          
        function logout() {
            window.location = "log_out.php";
        }
        
        function updateTutor() {
            // var selectedTutor = document.getElementById("tutorList").options[document.getElementById("tutorList").selectedIndex].value;
            var selectedTutorID = document.getElementById("tutorList").selectedIndex;
            
            //update tutor:
            // document.cookie = "selectedTutorID=" + selectedTutorID;
            // document.cookie = "studentForUpdate=" + studentForUpdate;
            document.getElementById("StudentForUpdate").value = studentForUpdate;
            document.getElementById("SelectedTutorID").value = selectedTutorID;
            document.getElementById("updateButton").click();
            
            
            if (updateFunc == true) {
                alert("Updated!");
            } else {
                alert("There seems to be a problem. Try again in a little bit.");
            }
        }
        
        
            
      
    </script>

  </body>
</html>
