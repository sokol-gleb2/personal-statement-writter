<html>
    <head>
        
    </head>
    
    <body>
        
        <form id="goToError" action="error" method="POST">
        <input type='hidden' id='errorStudentIDField' name="StudentID" value='1'/>
        <input type='hidden' id='errorStatementIDField' name="StatementID" value='0'/>
        <input type='hidden' id='errorVersionIDField' name="VersionID" value='0'/>
        <input type='hidden' id='errorDataField' name="Data" value='Some shit has gone wrong here'/>
        <input type='hidden' id='errorCurrPageField' name="CurrPage" value='Test Page'/>
        <input type='hidden' id='errorErrorField' name="Error" value='Error: Serious'/>
        <button type='submit' id="errorHiddenSubmitButton" style="visibility: hidden" name="submit"></button>
    </form>
    
    <script>
        document.getElementById("errorDataField").value = ["Not wrong", "Don't wanna", "We should leave"];
        document.getElementById("errorHiddenSubmitButton").click();
    </script>
    </body>
</html>