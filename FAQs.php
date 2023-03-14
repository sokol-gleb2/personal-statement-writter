<?php
    include "connection.php";

    $studentID = $_POST['StudentID'];
    $statementID = $_POST['StatementID'];
    $versionID = $_POST['VersionID'];
    $nextQ = $_POST['NextQ'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="FAQs.css">
    <link rel="icon" href="MenuLogoAtlas.png">
    <title></title>
  </head>
  <body>

    <div class="goBack" id="goBackButton">
      <div class="arrow" style="">
        <p id="arrow" style=""><<</p>
      </div>
      <div class="writing">
        <p id="writing">Go Back</p>
      </div>
    </div>

    <div class="faq">
      <p id="faq">Frequently Asked Questions</p>
    </div>
    <div class="questions">
      <div class="mainQs">
          <p>
            <u class="qa">Question:</u> How much should I write for each paragraph?
            <br>
            <u class="qa">Answer:</u> Each ps will be different, there are no set balance/requirements/standards for how much you should write for each paragraph and sub-q. We recommend averaging around 600 characters, which might equate to 100-150 words per each paragraph.
            (Keep an eye on the character counter)
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> How do I save my statement?
            <br>
            <u class="qa">Answer:</u> To make sure your work is saved and up to date, scroll down to the bottom of each page and click “SAVE AND CONTINUE”.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> Will I get a chance to edit my statement before I submit it?
            <br>
            <u class="qa">Answer:</u> Yes. Once you have completed all 6 paragraphs, you will be taken to a preview page, where you can edit the whole statement before you submit it for our tutors.
          </p>
      </div>


      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> How will I hear back on any updates to my PS?
            <br>
            <u class="qa">Answer:</u> Once a tutor has submitted their feedback and comments, the students will be sent an email alerting them.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> Do I need to fill out every box?
            <br>
            <u class="qa">Answer:</u> Use the sublist as a guide, not as a checklist.
          </p>
      </div>


      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> Can I leave and come back to it?
            <br>
            <u class="qa">Answer:</u> Yes and remember to save your work.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> If my school has a different structure, which one should I use?
            <br>
            <u class="qa">Answer:</u> Our structure has been tested and proved to put students into world class universities.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> Can I restart my statement?
            <br>
            <u class="qa">Answer:</u> Yes. Home page -> Create new PS.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> I’m struggling to write anything.
            <br>
            <u class="qa">Answer:</u> You have many options in this case: 1. Example Answers as guide. 2. Ask tutor. 3. Learning log.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> My school has issued a deadline for my PS but I haven’t finished it yet. What do I do?
            <br>
            <u class="qa">Answer:</u> Communicate with your teachers that you're in the process of refining it and you wouldn’t want to submit a half-finished statement.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> Which style of spelling should I use? Is it okay to use American or English spellings
            <br>
            <u class="qa">Answer:</u> Some students have used American spelling in the past. If you’re applying to British Unis, we'd recommend using British spelling but just be consistent.
          </p>
      </div>


      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> My statement is under 4000 characters. But pasting it into UCAS has cut it. What’s going on??
            <br>
            <u class="qa">Answer:</u> Don’t leave spaces between paragraphs. Paste it in as a block.
          </p>
      </div>

      <div class="mainQs" style="margin-top: 30px;">
          <p>
            <u class="qa">Question:</u> My school has suggested changing content when I showed it to them. What do I do?
            <br>
            <u class="qa">Answer:</u> Consult your mentor or the Insight team before the changes are made. But remeber that it's your personal statement and you always have the final say.
          </p>
      </div>

    </div>
    
    
    <form id="goToFirstPage" action="creating_ps_page_q2" method="POST">
        <input type='hidden' id='StudentIDField' name="StudentID" value='0'/>
        <input type='hidden' id='StatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='VersionIDField' name="VersionID" value='0'/>
        <button type='submit' id="hiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>

    <div class="wrapper" style="margin: auto;">
      <button class="saveButton" id="saveButton" onclick="close()"><span>CLOSE</span></button>
    </div>

  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    $( "#goBackButton" ).mouseenter( function(){
      $("#arrow").css("visibility", "visible");
      $("#arrow").fadeIn(500);
    } ).mouseleave( function(){
      $("#arrow").fadeOut(200);
    } );
    
    $("#goBackButton").click(function(){
        close();
    });
    
    function close(){
        var studentID = '<?= $studentID ?>';
        var statementID = '<?= $statementID ?>';
        var versionID = '<?= $versionID ?>';
        var nextQ = '<?= $nextQ ?>';
        var action = "home_page"
        if (nextQ == 'preview'){
            action = "creating_ps_page_preview";
        }else if (nextQ == 'home'){
            action = "home_page_student";
        }
        
        else if (nextQ == '1'){
            action = "creating_ps_page";
        }else if (nextQ == 'final'){
            action = "creating_ps_page_final";
        }else {
            action = "creating_ps_page_q"+nextQ;
        }
        
        document.getElementById("goToFirstPage").action = action;
        document.getElementById("StudentIDField").value = studentID;
        document.getElementById("StatementIDField").value = statementID;
        document.getElementById("VersionIDField").value = versionID;
        document.getElementById("hiddenSubmitButton").click();
    }

  </script>
</html>
