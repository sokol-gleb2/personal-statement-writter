<?php

    include "connection.php";
    
    session_start();
 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: log_in_page.php");
        exit;
    }else if ($_SESSION['id'] !== "admin") {
        $message = "Not Authorised";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location='log_in_page';</script>";
        exit;
    }
    
    $sql = "SELECT * FROM Student_tbl;";
    $names = [];
    $ids = [];
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($names, $row['StudentName']);
            array_push($ids, $row['StudentID']);
        }
    }
    
    function array_zip($a1, $a2) {
        for($i = 0; $i < min(count($a1), count($a2)); $i++) {
            $out[$i] = [$a1[$i], $a2[$i]];
        }
        return $out;
    }
    
    function getNames() {
        $zipped = array_zip($GLOBALS['names'], $GLOBALS['ids']);
        return $zipped;
    }
    
    

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="email.css">
    <title>Email</title>
  </head>
  <body>

    <div class="bg" id="bg"></div>
    <button class="goBackButton" onclick="goback()"><b class="goBackWriting">GO BACK</b></button>


    <div class="form">
      <div class="studentSection">
        Students:
        <select class="students" name="students" id="studentsList">
          <option value="volvo">All</option>
          <?php 
            $arr = getNames();
            foreach ($arr as $a) {
                $name = $a[0];
                echo "<option value='$name'>$name</option>";
            }
          ?>
        </select>
      </div>
      <br>
      <div class="subjectSection">
        Subject:
        <input id="subject" class="subject" type="text" name="subject" placeholder="Enter subject here...">
      </div>
      <br>
      <div class="bodySection">
        Body:
        <textarea id="bodyType" class="bodyType" placeholder="Enter body here..." type="text" rows="15"></textarea>
      </div>
      <div style="width: 100%; text-align: center; margin-top: 15px;">
        <button type="button" name="submit" class="submitButton" onclick="submit()">SEND</button>
      </div>
    </div>

    <form action="email_students.php" style="display: none;" method="POST">
      <input id="studentField" type="text" name="Student" value="">
      <input id="subjectField" type="text" name="Subject" value="">
      <input id="bodyField" type="text" name="Body" value="">
      <button id="submitButton" type="submit"></button>
    </form>

    <script type="text/javascript">
      var el = document.querySelector("#bg");
      el.addEventListener("mousemove", (e) => {
        el.style.backgroundPositionX = -e.offsetX/70 + "px";
        el.style.backgroundPositionY = -e.offsetY/70 + "px";
      });
      
      function submit() {
          var e = document.getElementById('studentsList').selectedIndex;
          document.getElementById('studentField').value = e;
          document.getElementById('subjectField').value = document.getElementById('subject').value;
          document.getElementById('bodyField').value = document.getElementById('bodyType').value;
          document.getElementById('submitButton').click();
      }
      
      function goback() {
          window.location = "home_page_tutor";
      }
      
      
    </script>
  </body>
</html>
