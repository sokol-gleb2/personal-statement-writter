<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="Log-in_page.css">
    <link rel="icon" href="icon.png">
    <div id="logo">
       <img src="welcomeToAtlas.png" id="mediaImage" class="mediaImage closed"> 
      <video autoplay muted preload="auto" id="vid" class="vid">
        <source src="AtlasIntro.mp4" type="video/mp4">
      </video>
    </div>

    <meta charset="utf-8">
    <title>Log-In Page</title>


  </head>
  <body>


    <div id="loginBox" class="log-in-box" style="visibility: hidden">

      <!--Sign in-->
      <div>

        <div id="Sign in" style="color: #a31621; text-align: center; padding: 0">
          <h1>Sign In</h1>
        </div>

        <div id="loginForm" style="text-align: left">
          <div id="Username" style="margin-left: 25px; margin-top: 40px">
            Username:
            <input id="usernameInput" name="username_entered" style="width: 65%"/>
          </div>

          <div id="Password" style="margin-left: 25px; margin-top: 10px">
            Password:
            <input type="password" id="passwordInput" name="password_entered" style="margin-left: 4px; width: 65%"/>
          </div>
        </div>

        <div class="wrapper">
          <button class="signin" id="sign-in" onclick="sign_in()"><span>Sign In</span></button>
        </div>

        <div style="text-align: center; font-size: 10px; margin-top: 10px; margin-bottom: 10px;">
          <a href="" style="color: red"><u>Forgot Password</u></a>
        </div>

      </div>

      <!------------------------------->

    </div>
    
    <form id="authentication" action="authenticate.php" method="POST">
        <input type='hidden' id='usernameInputSend' name="Username" value='1'/>
        <input type='hidden' id='passwordInputSend' name="Password" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    
        if (window.innerWidth < 960) {
            document.getElementById("vid").classList.add("closed");
            document.getElementById("mediaImage").classList.remove("closed");
            document.getElementById('loginBox').style.visibility = "visible";
        }else {
            document.getElementById('vid').addEventListener('ended',myHandler,false);

        }

        function myHandler(e){
            document.getElementById('loginBox').style.visibility = "visible";
        }
    
        $(document).keypress(function(event){
          if (event.keyCode === 13) {
            $("#sign-in").click();
          }
        });

      function sign_in(){
        document.getElementById('usernameInputSend').value = document.getElementById('usernameInput').value;
        document.getElementById('passwordInputSend').value = document.getElementById('passwordInput').value;
        document.getElementById('hiddenSubmitButton').click();
        
      }


      

    </script>

  </body>
</html>
