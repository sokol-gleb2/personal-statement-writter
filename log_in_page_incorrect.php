<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="Log-in_page.css">
    <link rel="icon" href="MenuLogoAtlas.png">

    <div id="logo">
      <!-- <img src="IA_Logo.png"> -->
      <img src="welcomeToAtlas.png" id="vid">
    </div>

    <meta charset="utf-8">
    <title>Log-In Page</title>


  </head>
  <body>


    
    <div id="loginBox" class="log-in-box">

      <!--Sign in-->
      <div>

        <div id="Sign in" style="color: #a31621; text-align: center; padding: 0">
          <h1>Sign In</h1>
        </div>

        <div id="loginForm" style="text-align: left">
          <div id="Username" style="margin-left: 20px; margin-top: 40px">
            Username:
            <input id="usernameInput" name="username_entered" size="35"/>
          </div>

          <div id="Password" style="margin-left: 20px; margin-top: 10px">
            Password:
            <input type="password" id="passwordInput" name="password_entered" size="35" style="margin-left: 4px"/>
          </div>
        </div>

        <div class="wrapper">
          <button class="signin" id="sign-in" onclick="sign_in()"><span>Sign In</span></button>
        </div>

        <div style="text-align: center; font-size: 10px; margin-top: 10px; margin-bottom: 10px;">
          <a href="www.facebook.com" style="color: red"><u>Forgot Password</u></a>
        </div>

      </div>

      <!------------------------------->

    </div>
    
    <form id="authentication" action="authenticate.php" method="POST">
        <input type='hidden' id='usernameInputSend' name="Username" value='1'/>
        <input type='hidden' id='passwordInputSend' name="Password" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>



    <script>
    
        alert('Incorrect Username and/or Password');
    
        document.getElementById('usernameInput').value = usernameEnteredLast;

      function sign_in(){
        document.getElementById('usernameInputSend').value = document.getElementById('usernameInput').value;
        document.getElementById('passwordInputSend').value = document.getElementById('passwordInput').value;
        document.getElementById('hiddenSubmitButton').click();
        
      }


    //   document.getElementById('vid').addEventListener('ended',myHandler,false);

    //   function myHandler(e){
    //       document.getElementById('loginBox').style.visibility = "visible";
    //   }

      // document.getElementById('vid').addEventListener("focus", function () {
      //   setTimeout(function() {
      //       document.getElementById('loginBox').style.visibility = "visible";
      //   }, 1000)
      // });

    </script>

  </body>
</html>
