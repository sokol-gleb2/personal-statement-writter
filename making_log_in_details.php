<?php

    include "connection.php";
    

    $sql = "SELECT * FROM Student_tbl;";
    $usernames = [];
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                array_push($GLOBALS["usernames"], $row['StudentUsername']);
            }
        } 
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="making_log_in_details.css">
    <link rel="icon" href="MenuLogoAtlas.png">

    <!--<div id="logo">-->
       <!--<img src="IA_Logo.png"> -->
    <!--  <video autoplay muted preload="auto" id="vid">-->
    <!--    <source src="welcome_to_atlas.mp4" type="video/mp4">-->
    <!--  </video>-->
    <!--</div>-->

    <meta charset="utf-8">
    <title>Creating New Atlas Account</title>


  </head>
  <body>


    <div id="loginBox" class="creating-log-in-box">

      <!--Sign in-->
      <div>

        <div id="Sign in" style="color: #a31621; text-align: center; padding: 0">
          <h2>Create Your Log-In Details</h2>
        </div>

        <div id="loginForm" style="text-align: left">
            
          <div id="Name" style="margin-left: 20px; margin-top: 40px">
            Full Name:
            <input id="nameInput" name="name_entered" size="30" style="float: right; margin-right: 5px;"/>
          </div>
          
          <div id="Email" style="margin-left: 20px; margin-top: 20px">
            Email:
            <input id="emailInput" name="email_entered" size="30" style="float: right; margin-right: 5px;"/>
          </div>
            
          <div id="Username" style="margin-left: 20px; margin-top: 20px">
            New Username:
            <input id="usernameInput" name="username_entered" size="30" style="float: right; margin-right: 5px;"/>
          </div>

          <div id="Password" style="margin-left: 20px; margin-top: 20px;">
            New Password:
            <input type="password" id="passwordInput" name="password_entered" size="30" style="float: right; margin-right: 5px;"/>
          </div>
          
          <div id="repeatPassword" style="margin-left: 20px; margin-top: 20px">
            Repeat Password:
            <input type="password" id="passwordInputRepeat" name="password_entered" size="30" style="float: right; margin-right: 5px;"/>
          </div>
        </div>

        <div class="wrapper">
          <button class="signin" id="sign-in" onclick="create()" style="margin-bottom: 10px; margin-top: 25px"><span>Create</span></button>
        </div>

        

      </div>

      <!------------------------------->
      
      <div id="problem" style="visibility: hidden; height: 0; text-align: center; color: red">
          <!--<p style="color: red; visibility: hidden" id="alreadyExists">This username already exists. Please try another one.</p>-->
          <!--<p style="color: red; visibility: hidden" id="notMatching">Password is not matching</p>-->
      </div>

    </div>
    
    <form id="authentication" action="save-log-in-details.php" method="POST">
        <input type='hidden' id='usernameInputSend' name="StudentUsername" value='1'/>
        <input type='hidden' id='passwordInputSend' name="StudentPassword" value='0'/>
        <input type='hidden' id='nameInputSend' name="StudentName" value='0'/>
        <input type='hidden' id='emailInputSend' name="StudentEmail" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>



    <script>
    
        var usernames = <?php echo json_encode($usernames); ?>;
        

      function create(){
          

          exists = false;
          for (var i in usernames){
              if (usernames[i] === document.getElementById('usernameInput').value){
                  exists = true;
                  break;
              }
          }
          
          empty = false;
          if ((document.getElementById('usernameInput').value == '') || (document.getElementById('passwordInput').value == '') || (document.getElementById('nameInput').value == '') || (document.getElementById('emailInput').value == '')){
              empty = true;
          }

          if (!empty){
              if (document.getElementById('passwordInput').value == document.getElementById('passwordInputRepeat').value){
                  if (!exists){
                    document.getElementById('usernameInputSend').value = document.getElementById('usernameInput').value;
                    document.getElementById('passwordInputSend').value = document.getElementById('passwordInput').value;
                    document.getElementById('nameInputSend').value = document.getElementById('nameInput').value;
                    document.getElementById('emailInputSend').value = document.getElementById('emailInput').value;
                    document.getElementById('hiddenSubmitButton').click();
                      
                  }else{
                    //   alert("Username already exists. Please try another one.");
                    document.getElementById('problem').style.visibility = 'visible';
                    // document.getElementById('alreadyExists').style.visibility = 'visible';
                    document.getElementById('problem').style.height = '20px';
                    document.getElementById('problem').style.marginBottom = '5px';
                    document.getElementById('problem').innerHTML = 'Username already exists. Please try another one.';
                  }
              }else{
                //   alert("Password and Repeat Password fields are not the same");
                  document.getElementById('problem').style.visibility = 'visible';
                //   document.getElementById('notMatching').style.visibility = 'visible';
                  document.getElementById('problem').style.height = '20px';
                  document.getElementById('problem').style.marginBottom = '5px';
                  document.getElementById('problem').innerHTML = 'Password and Repeat Password fields are not the same.';
                  
              }
          }else{
            // alert("Some fields are missing");
            document.getElementById('problem').style.visibility = 'visible';
            document.getElementById('problem').style.height = '20px';
            document.getElementById('problem').style.marginBottom = '5px';
            document.getElementById('problem').innerHTML = 'Some fields are missing';
        }
        
        }
        
        


      

      // document.getElementById('vid').addEventListener("focus", function () {
      //   setTimeout(function() {
      //       document.getElementById('loginBox').style.visibility = "visible";
      //   }, 1000)
      // });

    </script>

  </body>
</html>
