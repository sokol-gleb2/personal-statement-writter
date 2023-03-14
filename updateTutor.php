<?php 
    include "connection.php";
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

    $selectedTutor = $_POST['selectedTutorID'];
    $studentForUpdate = $_POST['studentForUpdate'];
    $tutorIDs = getTutorDropdownList()[0];
    $newTutor = $tutorIDs[$selectedTutor];
                    
    $studentIDs = [];
    $sqlStudent = "SELECT StudentID FROM Student_tbl;";
    $result = mysqli_query($conn, $sqlStudent);
    while ($row = mysqli_fetch_array($result)) {
        array_push($studentIDs, $row['StudentID']);
    }
    $studentID = $studentIDs[$studentForUpdate];
                    
    $sqlUpdate = "UPDATE Main_tbl SET TutorID='$newTutor' WHERE StudentID='$studentID';";
    $updateResult = mysqli_query($conn, $sqlUpdate);
    
    header("Location: home_page_tutor");
    exit();
    


?>