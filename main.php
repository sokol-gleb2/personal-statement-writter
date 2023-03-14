    <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <meta charset="utf-8">
    <title>Welcome</title>



  </head>


  <body>

    <div id="welcome_to_atlas" style="margin: auto; text-align: center; font-size: 60px; margin-top: 50px">
        <img src="AtlasLogo.png" style="margin: auto;">
        Welcome to <i style="font-size: 60px"><b style="color: #A31621">Atlas</b></i>
      <!--<img src="welcome_to_atlas.png">-->
    </div>
    

    <br>
    <br>

    <!-- Para overview: -->
    <div id="welcome_writing" style="background-color: white">
        <h2 style="margin-left: 30px"><u>Why Atlas?</u></h2>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 17px; margin-top: -5px;">
        <!--<b style="color: #A31621">1st Paragraph: </b>What even triggered passion for your subject?-->
        The origins of the <i><b style="color: #A31621">Atlas</b></i> are rooted in Greek mythology: the enduring image of the Titan holding the world on his shoulders. The term then became associated with collections of maps and charts - the cornerstones for explorers and navigators as they set out on journeys across the world. As such, the concept of Atlas has a double meaning: it is a responsibility to bear, and a guide from which to learn. We strongly believe in guiding our students to recognising and achieving their best potential. We want to provide the guides… the charts… the ATLAS, that will help students as they progress through their UCAS applications. 
      </p>
      <h2 style="margin-left: 30px; margin-top: 20px"><u>Getting started with Atlas</u></h2>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 17px; margin-top: -5px;">
        <b style="color: #A31621">How the ATLAS works is very straightforward. </b>Once logged in, you will be able to start a new application. Step by step, ATLAS will overview the key components that make up a top-class personal statement. Taking inspiration from our gold-standard examples <u style="color: #A31621">based on our many previously successful applications</u>, you will be given prompts to build up each of your 6 paragraphs. After all 6 have been completed, you will see your whole statement brought together, which you will then be able to submit for our experienced tutors to provide bespoke feedback.
      </p>
      <h2 style="margin-left: 30px; margin-top: 20px"><u>Take the responsibility, Atlas will guide you</u></h2>
      <p style="margin-left: 30px; margin-right: 30px; font-size: 17px; margin-top: -5px;">
        The prospect of writing a personal statement can be daunting. It takes responsibility and commitment to succeed. ATLAS will provide the guides designed to help you take that responsibility. With ATLAS guiding you, you will craft a unique personal statement, fine-tuned and approved by our team of experienced graduates, teachers and academics. The next step towards securing your place at your top university begins here.
      </p>
      <p style="margin-left: 30px; margin-right: 30px; margin-top: 50px; margin-bottom: 20px; font-size: 21px; text-align: center">
        <b style="color: #A31621"><i>Now is the time to chart your path.</i></b>
      </p>
      
    </div>





    
    <div class="wrapper" style="text-align: center; margin-top: 50px;">
      <button class="startButton" id="startButton" onclick="createNewAccount()"><span>CREATE LOG-IN DETAILS</span></button>
    </div>
    <div class="wrapper" style="text-align: center; margin-top: 20px;">
      <button class="startButton" id="logInButton" onclick="toLogIn()"><span>LOG-IN TO YOUR ACCOUNT</span></button>
    </div>
    
    
    
    
    
    
    <div style="text-align: center; margin-top: 30px">
        2022 © Insight Education Ltd | All Rights Reserved | Company Registration Number: 8934853
    </div>



    <script>
        function createNewAccount(){
            location.href = "making_log_in_details";
        }
        
        function toLogIn() {
            location.href = "log_in_page";
        }
        
        
        
        
    </script>

  </body>
</html>
