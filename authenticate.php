<?php

    include 'connection.php';
    
    $usernameEntered = $_POST['Username'];
    $passwordEntered = $_POST['Password'];
    $id = 0;
    $passed = "not passed";
    $type = "student";
    
    
    if ($usernameEntered === "admin") {
        $sql = "SELECT * FROM Tutor_tbl WHERE `TutorUsername`='admin' AND `TutorPassword`=PASSWORD('$passwordEntered');";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            session_start();
                
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = "admin";
            $_SESSION["username"] = $usernameEntered;
                
            
            header("location: home_page_tutor");
        }else {
            header("location: log_in_page_incorrect");
        }
        
    } else {
        $sql = "SELECT * FROM Student_tbl WHERE `StudentUsername`='$usernameEntered' AND `StudentPassword`=PASSWORD('$passwordEntered');";
        $sqlTutor = "SELECT * FROM Tutor_tbl WHERE `TutorUsername`='$usernameEntered' AND `TutorPassword`=PASSWORD('$passwordEntered');";
        
        
        if($result = mysqli_query($conn, $sql)) {
            if(mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_array($result)) {
                    session_start();
                
                    $_SESSION["loggedin"] = true;
                    $_SESSION["type"] = "student";
                    $_SESSION["id"] = $row['StudentID'];
                    $_SESSION["username"] = $usernameEntered;
                        
                    header("location: home_page_student");    
                }
                
                
            } else {
                if ($result2 = mysqli_query($conn, $sqlTutor)) {
                    if(mysqli_num_rows($result2) == 1) {
                        while($row = mysqli_fetch_array($result2)) {
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["type"] = "tutor";
                            $_SESSION["id"] = $row['TutorID'];
                            $_SESSION["username"] = $usernameEntered;
                            
                            header("location: home_page_tutor");    
                        }
                    } else {
                        header("location: log_in_page_incorrect");
                    }
                }
            }
        }    
    }
    
    
    
    
    
    
    
    

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    


  </head>


  <body>

    
    
    
    <form id="goToLogIn" action="log_in_page_incorrect" method="POST">
        <input type='hidden' id='StudentUsernameField' name="StudentUsername" value='0'/>
        <button type='submit' id="hiddenSubmitButton2" style="visibility: hidden" name="submit"></button>
    </form>
    



    <script>
        // var studentID = '<?= $id ?>';
        // var studentUsernameEntered = '<?= $usernameEntered ?>';
        var passed = '<?= $passed ?>';
        // var type = '<?= $type ?>';
        
        
        if (passed === "not passed"){
            document.getElementById("StudentUsernameField").value = studentUsernameEntered;
            document.getElementById("hiddenSubmitButton2").click();
        }
        
        

        
        
    </script>

  </body>
</html>


