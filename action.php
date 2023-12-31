<?php

//including database connection file
include('database.php');

//add student
if (isset($_POST['stu'])) {
    //variables get from post request
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gen'];
    $roll = $_POST['roll'];

    //when user does not enter any value in genders field
    if ($gender == "") {
        echo "<script>location='addStudent.php?status=3'</script>";
    } 
    //else
    else {
        //getting student record from database
        $query = "SELECT * FROM Student as s INNER JOIN Person as p ON s.Id = p.Id WHERE s.RegistrationNo = '$roll' OR p.Email = '$email'";
        $res = db::getRecords($query);
        $count = 0;
        //counting number of records
        foreach ($res as $t) {
            $count++;
        }
        //if count is greater than 0 then student already exists
        if ($count >= 1) {
            echo "<script>location='addStudent.php?status=2'</script>";
        } 
        //else
        else {
            //adding student record in person table
            $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth,Gender) values('$name','$surname','$pno','$email','$dob','$gender')";
            $res = db::insertRecords($query);
            //adding student record in student table
            $query = "INSERT INTO Student(Id,RegistrationNo) values((SELECT MAX(Id) FROM Person) , '$roll')";
            $res = db::insertRecords($query);

            //redirecting to addStudent.php
            echo "<script>location='addStudent.php?status=1'</script>";
        }
    }
} 
//delete student
else if (isset($_POST['delstu'])) {
    //variables get from post request
    $roll = $_POST['roll'];
    //getting student record from database
    $query = "SELECT Id FROM Student WHERE RegistrationNo = '$roll'";
    $res = db::getRecord($query);

    //if student record esists
    if ($res != false) {
        //getting id from database object
        $res = $res['Id'];
        //deleting student record from database
        $query = "DELETE FROM Student WHERE Id = $res";
        $result = db::deleteRecords($query);
        //deleting from person table
        $query = "DELETE FROM Person WHERE Id = $res";
        $result = db::deleteRecords($query);
        //redirecting to delStudent.php
        echo "<script>location='delStudent.php?status=1'</script>";
    } 
    else {
        //redirecting to delStudent.php
        echo "<script>location='delStudent.php?status=2'</script>";
    }
} 
//update student
else if (isset($_POST['upstu'])) {
    //variable get from post request
    $roll = $_POST['roll'];

    //getting student id from database
    $query = "SELECT Id FROM Student Where RegistrationNo = '$roll'";
    $res = db::getRecord($query);

    //if student record does not exists
    if ($res == false) {
        //redirecting to updateStudent.php
        echo "<script>location='updateStudent.php?status=1'</script>";
    } 
    else {
        //session variable
        session_start();
        //setting session variable
        $_SESSION['Id'] = $res['Id'];
        //redirecting to editStudent.php
        echo "<script>location='editStudent.php?status=1'</script>";
    }
} 
//edit student
else if (isset($_POST['editstu'])) {
    //variables get from post request
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gen = $_POST['gen'];
    //session variable
    session_start();
    $id = $_SESSION["Id"];
    //getting email from database
    $query = "SELECT Email FROM Person WHERE Id = $id";
    $Email = db::getRecord($query);
    $query = "SELECT * FROM Person  WHERE Email = '$email'";
    $res = db::getRecords($query);
    $count = 0;
    foreach ($res as $t) {
        $count++;
    }
    echo $count;
    
    //if student record already exists
    if ($count >= 1 && $Email['Email'] != $email) {
        echo "<script>location='editStudent.php?status=2'</script>";
    } 
    else {
        $query = "UPDATE Person SET FirstName = '$name', LastName = '$surname', Contact = '$pno', Email = '$email', DateOfBirth = '$dob', Gender='$gen' Where Id = $id";
        $res = db::updateRecord($query);
        session_destroy();
        echo "<script>location='updateStudent.php?status=3'</script>";
    }
} 
// update advisor
else if (isset($_POST['upadv'])) {
    //variables get from post request
    $email = $_POST['email'];

    //getting email from database
    $query = "SELECT Id FROM Person Where Email = '$email'";
    $res = db::getRecord($query);

    //if advisor record does not exists
    if ($res == false) {
        //redirecting to updateAdvisor.php
        echo "<script>location='updateAdvisor.php?status=1'</script>";
    } 
    else {
        //session variable
        session_start();
        $_SESSION['Id'] = $res['Id'];
        //redirecting to editAdvisor.php
        echo "<script>location='editAdvisor.php?status=1'</script>";
    }
} 
//edit advisor
else if (isset($_POST['editadv'])) {
    //variables get from post request
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pno = $_POST['pno'];
    $dob = $_POST['dob'];
    $gen = $_POST['gen'];
    $salary = $_POST['salary'];
    $des = $_POST['des'];

    //cheack if salary is number
    if (!is_numeric($salary)) {
        echo "<script>location='editAdvisor.php?status=2'</script>";
    }
    //session variable
    session_start();
    $id = $_SESSION["Id"];
    //update advisor record in database
    $query = "UPDATE Person SET FirstName = '$name', LastName = '$surname', Contact = '$pno', DateOfBirth = '$dob', Gender='$gen' Where Id = $id";
    $res = db::updateRecord($query);
    $query = "UPDATE Advisor SET Designation = '$des', Salary = '$salary' Where Id = $id";
    $res = db::updateRecord($query);
    //destroy session variable
    session_destroy();
    //redirecting to updateAdvisor.php
    echo "<script>location='updateAdvisor.php?status=3'</script>";
} 
//add project
else if (isset($_POST['addpro'])) {
    //variables get from post request
    $title = $_POST['title'];
    $des = $_POST['des'];
    //getting project record from database
    $query = "SELECT COUNT(*) FROM Project WHERE [Title] = '$title'";
    $res = db::getRecord($query);

    //if project record already exists
    if ($res[''] > 0) {
        echo "<script>location='addProject.php?status=2'</script>";
    }
    //inserting project record in database
    $query = "INSERT INTO Project ([Title], [Description]) VALUES ('$title' , '$des')";
    $res = db::insertRecord($query);
    //redirecting to addProject.php
    echo "<script>location='addProject.php?status=1'</script>";
} 
//update project
else if (isset($_POST['uppro'])) {
    //variables get from post request
    $title = $_POST['title'];
    $des = $_POST['des'];
    $gen = $_POST['gen'];
    //cheaking if gender selected
    if ($gen == 0) {
        echo "<script>location='updateProject.php?status=5'</script>";
    } 
    //cheak if title and description is empty
    else if ($title == "" && $des == "") {
        echo "<script>location='updateProject.php?status=1'</script>";
    } 
    //cheak if title is empty anf setting description and Id
    else if ($title == "") {
        $query = "UPDATE Project SET Description = '$des' where Id = '$gen'";
        $re = db::updateRecord($query);
        echo "<script>location='updateProject.php?status=2'</script>";
    } 
    else if ($des == "") {
        $query = "UPDATE Project SET Title = '$title' where Id = '$gen'";
        $re = db::updateRecord($query);
        echo "<script>location='updateProject.php?status=3'</script>";
    } 
    else {
        $query = "UPDATE Project SET Description = '$des', Title = '$title' where Id = '$gen'";
        $re = db::updateRecord($query);
        echo "<script>location='updateProject.php?status=4'</script>";
    }
} 
//create group
else if (isset($_POST['creGroup'])) {
    //variables get from post request
    $gen = $_POST['gen'];
    $roll = $_POST['roll'];

    if ($gen == "") {
        echo "<script>location='createStudentGroup.php?status=1'</script>";
    }
    //getting student count from database
    $query = "SELECT COUNT(*) FROM Student WHERE RegistrationNo = '$roll'";
    $r = db::getRecord($query);
    if ($r[''] == 0) {
        echo "<script>location='createStudentGroup.php?status=2'</script>";
    }
    //getting student count from database
    $query = "SELECT COUNT(*) FROM GroupStudent WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') and [Status] = (SELECT Id FROM Lookup Where Category = 'STATUS' and Value='Active')";
    $r = db::getRecord($query);
    if ($r[''] > 0) {
        echo "<script>location='createStudentGroup.php?status=3'</script>";
    } 
    else {
        //inserting group record in database
        $query = "INSERT INTO [Group] (Created_On) VALUES (getdate())";
        $res = db::insertRecord($query);
        $query = "INSERT INTO GroupStudent (GroupId,StudentId, [Status] , AssignmentDate) 
        VALUES ((SELECT MAX(Id) FROM [Group]) , 
        (SELECT Id FROM Student WHERE RegistrationNo = '$roll'),
        (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active'), getdate())";
        $res = db::insertRecord($query);

        //inserting group project record in database
        $query = "INSERT INTO GroupProject (ProjectId, GroupId, AssignmentDate) VALUES ('$gen',(SELECT MAX(Id) FROM [Group]), getdate())";
        $res = db::insertRecord($query);
        echo "<script>location='createStudentGroup.php?status=4'</script>";
    }
} 
//add student to group
else if (isset($_POST['addstuGroup'])) {
    $id = $_POST['gen'];
    $roll = $_POST['roll'];

    if ($id == "") {
        echo "<script>location='addStuToGroup.php?status=1'</script>";
    }
    //getting student count from database
    $query = "SELECT COUNT(*) FROM Student WHERE RegistrationNo = '$roll'";
    $res = db::getRecord($query);
    //if student record does not exists
    if ($res[''] == 0) {
        echo "<script>location='addStuToGroup.php?status=2'</script>";
    }
//getting student count from database
    $query = "SELECT COUNT(*) FROM GroupStudent 
        WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') 
        and 
        [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active')";
    $res = db::getRecord($query);
    if ($res[''] > 0) {
        
        echo "<script>location='addStuToGroup.php?status=4'</script>";
    }

    //inserting group student record in database
    $query = "INSERT INTO GroupStudent (GroupId,StudentId, [Status] , AssignmentDate) 
        VALUES ('$id' , 
        (SELECT Id FROM Student WHERE RegistrationNo = '$roll'),
        (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active'), getdate())";
    $res = db::insertRecord($query);
    echo "<script>location='addStuToGroup.php?status=3'</script>";
} 
//delete student from group
else if (isset($_POST['delStuGroup'])) {
    $roll = $_POST['roll'];

    //getting student count from database
    $query = "SELECT COUNT(*) FROM GroupStudent WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') and [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active') ";
    $res = db::getRecord($query);

    if ($res[''] == 0) {
        echo "<script>location='delStuToGroup.php?status=1'</script>";
    } 
    else {
        //getting student count from database
        $query = "SELECT COUNT(*) FROM GroupStudent WHERE [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active') and GroupId = (SELECT GroupId FROM GroupStudent WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') and [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active'))";
        $res = db::getRecord($query);
        if($res[''] <= 1)
        {
            echo "<script>location='delStuToGroup.php?status=3'</script>";
        }
        else
        {
            //updating group student record in database
            $query = "UPDATE GroupStudent SET [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'InActive')";
            $res = db::updateRecord($query);
            echo "<script>location='delStuToGroup.php?status=2'</script>";
        }
    }
} 
//add evaluation
else if (isset($_POST['addeval'])) {
    $name = $_POST['name'];
    $marks = $_POST['marks'];
    $weight = $_POST['weight'];

    //cheack if marks and weightage is integer or not
    if (!is_numeric($marks) || !is_numeric($weight)) {
        echo "<script>location='addEvaluation.php?status=3'</script>";
    }
    //getting student count from database
    $query = "SELECT COUNT(*) FROM Evaluation WHERE [Name] = '$name'";
    $res = db::getRecord($query);
    if ($res[''] > 0) {
        echo "<script>location='addEvaluation.php?status=1'</script>";
    } 
    else {
        //inserting evaluation record in database
        $query = "INSERT INTO Evaluation ([Name],TotalMarks, TotalWeightage) VALUES ('$name','$marks','$weight')";
        $res = db::insertRecord($query);
        echo "<script>location='addEvaluation.php?status=2'</script>";
    }
} 
//add project advisor
else if (isset($_POST['pa'])) {
    $advrol = $_POST['advrol'];
    $adv = $_POST['adv'];
    $pro = $_POST['pro'];

    //cheak if any field is empty
    if ($advrol == "" || $adv == "" || $pro == "") {
        echo "<script>location='addProjectAdvisor.php?status=1'</script>";
    } 
    else {
        //getting project advisor count from database
        $query = "SELECT COUNT(*) FROM ProjectAdvisor WHERE ProjectId = '$pro' and (AdvisorId = '$adv' or AdvisorRole='$advrol')";
        $res = db::getRecord($query);
        if ($res[''] > 0) {
            echo "<script>location='addProjectAdvisor.php?status=2'</script>";
        } else {
            //inserting project advisor record in database
            $query = "INSERT INTO ProjectAdvisor (AdvisorId, ProjectId, AdvisorRole,AssignmentDate) VALUES ('$adv','$pro','$advrol',getdate())";
            $res = db::insertRecord($query);
            echo "<script>location='addProjectAdvisor.php?status=3'</script>";
        }
    }
} 
//add advisor
else if (isset($_POST['adv'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gen'];
    $salary = $_POST['salary'];
    $des = $_POST['des'];
    //check if salary is integer or not
    if (!is_numeric($salary)) {
        echo "<script>location='addAdvisor.php?status=4'</script>";
    }
    //check if email is valid or not
    $query = "SELECT * FROM Person WHERE Email = '$email'";
    $res = db::getRecords($query);
    $count = 0;
    //check if any field is empty
    if ($gender == 0 || $des == 0) {
        echo "<script>location='addAdvisor.php?status=3'</script>";
    }
    foreach ($res as $t) {
        $count++;
    }
    if ($count >= 1) {
        echo "<script>location='addAdvisor.php?status=2'</script>";
    } 
    else {
        //inserting advisor record in database
        $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth,Gender) values('$name','$surname','$pno','$email','$dob','$gender')";
        $res = db::insertRecords($query);
        $query = "INSERT INTO Advisor(Id, Designation, Salary) values((SELECT MAX(Id) FROM Person) ,'$des','$salary')";
        $res = db::insertRecords($query);
        echo "<script>location='addAdvisor.php?status=1'</script>";
    }
    

}
//add group evaluation
else if(isset($_POST['addgroeval'])){
    $eval = $_POST['eval'];
    $group = $_POST['group'];
    $marks = $_POST['marks'];
    //cheack if marks is integer or not
    if(!is_numeric($marks))
    {
        echo "<script>location='EvaluateGroup.php?status=5'</script>";
    }
    //cheack if any field is empty
    if($eval == "" || $group == "")
    {
        echo "<script>location='EvaluateGroup.php?status=3'</script>";
    }
    //cheack if marks is greater than total marks
    $query = "SELECT TotalMarks FROM Evaluation where Id = $eval";
    $res = db::getRecord($query);
    if($res['TotalMarks'] < $marks)
    {
        echo "<script>location='EvaluateGroup.php?status=4'</script>";
    }
    //getting group evaluation count from database
    $query = "SELECT COUNT(*) FROM GroupEvaluation WHERE EvaluationId = $eval and GroupId = $group";
    $res = db::getRecord($query);
    if($res[''] > 0){
        echo "<script>location='EvaluateGroup.php?status=1'</script>";
    }
    else{
        //inserting group evaluation record in database
        $query = "INSERT INTO GroupEvaluation (GroupId,EvaluationId,ObtainedMarks, EvaluationDate) VALUES ($group,$eval,$marks,getdate())";
        $res = db::insertRecord($query);
        echo "<script>location='EvaluateGroup.php?status=2'</script>";
    }
}
//update evaluation
else if(isset($_POST['upev']))
{
    $name = $_POST['title'];
    //getting evaluation count from database
    $query = "SELECT COUNT(*) FROM Evaluation WHERE [Name] = '$name'";
    $res = db::getRecord($query);
    if($res[''] == 0){
        echo "<script>location='updateEvaluation.php?status=1'</script>";
    }
    else{
        //getting evaluation id from database
        $query = "SELECT Id FROM Evaluation WHERE [Name] = '$name'";
        $res = db::getRecord($query);
        //storing evaluation id in session
        session_start();
        $_SESSION['Id'] = $res['Id'];
        echo "<script>location='editEvaluation.php'</script>";
    }
}
//edit evaluation
else if(isset($_POST['edev']))
{
    $marks = $_POST['marks'];
    $weight = $_POST['weight'];
    //getting evaluation id from session
    session_start();
    $id = $_SESSION["Id"];
    //cheack if marks and weight is integer or not
    if(!is_numeric($marks) || !is_numeric($weight))
    {
        echo "<script>location='editEvaluation.php?status=1'</script>";
    }
    //updating evaluation record in database
    $query = "UPDATE Evaluation SET TotalMarks = $marks, TotalWeightage = $weight WHERE Id = $id";
    $res = db::updateRecord($query);
    //destroying session
    session_destroy();
    echo "<script>location='updateEvaluation.php?status=2'</script>";
}
?>