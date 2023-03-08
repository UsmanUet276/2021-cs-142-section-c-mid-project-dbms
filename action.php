<?php
include('database.php');
if (isset($_POST['stu'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gen'];
    $roll = $_POST['roll'];
    if ($gender == "") {
        echo "<script>location='addStudent.php?status=3'</script>";
    } 
    else {
        $query = "SELECT * FROM Student as s INNER JOIN Person as p ON s.Id = p.Id WHERE s.RegistrationNo = '$roll' OR p.Email = '$email'";
        $res = db::getRecords($query);
        $count = 0;
        foreach ($res as $t) {
            $count++;
        }
        echo $count;
        if ($count >= 1) {
            echo "<script>location='addStudent.php?status=2'</script>";
        } 
        else {
            $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth,Gender) values('$name','$surname','$pno','$email','$dob','$gender')";
            $res = db::insertRecords($query);
            $query = "INSERT INTO Student(Id,RegistrationNo) values((SELECT MAX(Id) FROM Person) , '$roll')";
            $res = db::insertRecords($query);
            echo "<script>location='addStudent.php?status=1'</script>";
        }
    }
} 
else if (isset($_POST['delstu'])) {
    $roll = $_POST['roll'];
    $query = "SELECT Id FROM Student WHERE RegistrationNo = '$roll'";
    $res = db::getRecord($query);

    if ($res != false) {
        $res = $res['Id'];
        $query = "DELETE FROM Student WHERE Id = $res";
        $result = db::deleteRecords($query);
        $query = "DELETE FROM Person WHERE Id = $res";
        $result = db::deleteRecords($query);
        echo "<script>location='delStudent.php?status=1'</script>";
    } 
    else {
        echo "<script>location='delStudent.php?status=2'</script>";
    }
} 
else if (isset($_POST['upstu'])) {
    $roll = $_POST['roll'];

    $query = "SELECT Id FROM Student Where RegistrationNo = '$roll'";
    $res = db::getRecord($query);

    if ($res == false) {
        echo "<script>location='updateStudent.php?status=1'</script>";
    } 
    else {
        session_start();
        $_SESSION['Id'] = $res['Id'];
        echo "<script>location='editStudent.php?status=1'</script>";
    }
} 
else if (isset($_POST['editstu'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gen = $_POST['gen'];
    session_start();
    $id = $_SESSION["Id"];
    $query = "SELECT Email FROM Person WHERE Id = $id";
    $Email = db::getRecord($query);
    $query = "SELECT * FROM Person  WHERE Email = '$email'";
    $res = db::getRecords($query);
    $count = 0;
    foreach ($res as $t) {
        $count++;
    }
    echo $count;
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
else if (isset($_POST['upadv'])) {
    $email = $_POST['email'];

    $query = "SELECT Id FROM Person Where Email = '$email'";
    $res = db::getRecord($query);

    if ($res == false) {
        echo "<script>location='updateAdvisor.php?status=1'</script>";
    } 
    else {
        session_start();
        $_SESSION['Id'] = $res['Id'];
        echo "<script>location='editAdvisor.php?status=1'</script>";
    }
} 
else if (isset($_POST['editadv'])) {
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
    session_start();
    $id = $_SESSION["Id"];
    $query = "UPDATE Person SET FirstName = '$name', LastName = '$surname', Contact = '$pno', DateOfBirth = '$dob', Gender='$gen' Where Id = $id";
    $res = db::updateRecord($query);
    $query = "UPDATE Advisor SET Designation = '$des', Salary = '$salary' Where Id = $id";
    $res = db::updateRecord($query);
    session_destroy();
    echo "<script>location='updateAdvisor.php?status=3'</script>";
} 
else if (isset($_POST['deladv'])) {
    $email = $_POST['email'];
    $query = "SELECT Id FROM Person WHERE Email = $email";
    $res = db::getRecord($query);

    if ($res != false) {
        $res = $res['Id'];
        $query = "DELETE FROM Adv WHERE Id = $res";
        $result = db::deleteRecords($query);
        $query = "DELETE FROM Person WHERE Id = $res";
        $result = db::deleteRecords($query);
        echo "<script>location='delAdvisor.php?status=1'</script>";
    } 
    else {
        echo "<script>location='delAdvisor.php?status=2'</script>";
    }
} 
else if (isset($_POST['addpro'])) {
    $title = $_POST['title'];
    $des = $_POST['des'];
    $query = "SELECT COUNT(*) FROM Project WHERE [Title] = '$title'";
    $res = db::getRecord($query);

    if ($res[''] > 0) {
        echo "<script>location='addProject.php?status=2'</script>";
    }
    $query = "INSERT INTO Project ([Title], [Description]) VALUES ('$title' , '$des')";
    $res = db::insertRecord($query);
    echo "<script>location='addProject.php?status=1'</script>";
} 
else if (isset($_POST['delpro'])) {
    $title = $_POST['title'];

    $query = "SELECT COUNT(*) FROM Project WHERE [Title] = '$title'";
    $res = db::getRecord($query);

    if ($res[''] > 0) {
        $query = "DELETE FROM Project where Title = '$title'";
        $res = db::deleteRecord($query);
        echo "<script>location='deleteProject.php?status=1'</script>";
    } 
    else {
        echo "<script>location='deleteProject.php?status=2'</script>";
    }
} 
else if (isset($_POST['uppro'])) {
    $title = $_POST['title'];
    $des = $_POST['des'];
    $gen = $_POST['gen'];
    echo "<script>alert('" . $gen . "')</script>";
    if ($gen == 0) {
        echo "<script>location='updateProject.php?status=5'</script>";
    } 
    else if ($title == "" && $des == "") {
        echo "<script>location='updateProject.php?status=1'</script>";
    } 
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
else if (isset($_POST['creGroup'])) {
    $gen = $_POST['gen'];
    $roll = $_POST['roll'];

    if ($gen == "") {
        echo "<script>location='createStudentGroup.php?status=1'</script>";
    }
    $query = "SELECT COUNT(*) FROM Student WHERE RegistrationNo = '$roll'";
    $r = db::getRecord($query);
    if ($r[''] == 0) {
        echo "<script>location='createStudentGroup.php?status=2'</script>";
    }
    $query = "SELECT COUNT(*) FROM GroupStudent WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') and [Status] = (SELECT Id FROM Lookup Where Category = 'STATUS' and Value='Active')";
    $r = db::getRecord($query);
    if ($r[''] > 0) {
        echo "<script>location='createStudentGroup.php?status=3'</script>";
    } 
    else {
        $query = "INSERT INTO [Group] (Created_On) VALUES (getdate())";
        $res = db::insertRecord($query);
        $query = "INSERT INTO GroupStudent (GroupId,StudentId, [Status] , AssignmentDate) 
        VALUES ((SELECT MAX(Id) FROM [Group]) , 
        (SELECT Id FROM Student WHERE RegistrationNo = '$roll'),
        (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active'), getdate())";
        $res = db::insertRecord($query);

        $query = "INSERT INTO GroupProject (ProjectId, GroupId, AssignmentDate) VALUES ('$gen',(SELECT MAX(Id) FROM [Group]), getdate())";
        $res = db::insertRecord($query);
        echo "<script>location='createStudentGroup.php?status=4'</script>";
    }
} 
else if (isset($_POST['addstuGroup'])) {
    $id = $_POST['gen'];
    $roll = $_POST['roll'];

    if ($id == "") {
        echo "<script>location='addStuToGroup.php?status=1'</script>";
    }
    $query = "SELECT COUNT(*) FROM Student WHERE RegistrationNo = '$roll'";
    $res = db::getRecord($query);
    if ($res[''] == 0) {
        echo "<script>location='addStuToGroup.php?status=2'</script>";
    }

    $query = "SELECT COUNT(*) FROM GroupStudent 
        WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') 
        and 
        [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active')";
    $res = db::getRecord($query);
    if ($res[''] > 0) {
        echo "<script>location='addStuToGroup.php?status=4'</script>";
    }

    $query = "INSERT INTO GroupStudent (GroupId,StudentId, [Status] , AssignmentDate) 
        VALUES ('$id' , 
        (SELECT Id FROM Student WHERE RegistrationNo = '$roll'),
        (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active'), getdate())";
    $res = db::insertRecord($query);
    echo "<script>location='addStuToGroup.php?status=3'</script>";
} 
else if (isset($_POST['delStuGroup'])) {
    $roll = $_POST['roll'];

    $query = "SELECT COUNT(*) FROM GroupStudent WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') and [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active') ";
    $res = db::getRecord($query);

    if ($res[''] == 0) {
        echo "<script>location='delStuToGroup.php?status=1'</script>";
    } 
    else {
        $query = "SELECT COUNT(*) FROM GroupStudent WHERE [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active') and GroupId = (SELECT GroupId FROM GroupStudent WHERE StudentId = (SELECT Id FROM Student WHERE RegistrationNo = '$roll') and [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'Active'))";
        $res = db::getRecord($query);
        if($res[''] <= 1)
        {
            echo "<script>location='delStuToGroup.php?status=3'</script>";
        }
        else
        {
            $query = "UPDATE GroupStudent SET [Status] = (SELECT Id FROM Lookup WHERE Category = 'STATUS' and [Value] = 'InActive')";
            $res = db::updateRecord($query);
            echo "<script>location='delStuToGroup.php?status=2'</script>";
        }
    }
} 
else if (isset($_POST['addeval'])) {
    $name = $_POST['name'];
    $marks = $_POST['marks'];
    $weight = $_POST['weight'];

    //cheack if marks and weightage is integer or not
    if (!is_numeric($marks) || !is_numeric($weight)) {
        echo "<script>location='addEvaluation.php?status=3'</script>";
    }
    $query = "SELECT COUNT(*) FROM Evaluation WHERE [Name] = '$name'";
    $res = db::getRecord($query);
    if ($res[''] > 0) {
        echo "<script>location='addEvaluation.php?status=1'</script>";
    } 
    else {
        $query = "INSERT INTO Evaluation ([Name],TotalMarks, TotalWeightage) VALUES ('$name','$marks','$weight')";
        $res = db::insertRecord($query);
        echo "<script>location='addEvaluation.php?status=2'</script>";
    }
} 
else if (isset($_POST['deleval'])) {
    $name = $_POST['title'];

    $query = "SELECT COUNT(*) FROM Evaluation WHERE [Name] = '$name'";
    $res = db::getRecord($query);
    if ($res[''] == 0) {
        echo "<script>location='delEvaluation.php?status=1'</script>";
    } 
    else {
        $query = "DELETE FROM Evaluation WHERE [Name] = '$name'";
        $res = db::deleteRecord($query);
        echo "<script>location='delEvaluation.php?status=2'</script>";
    }
} 
else if (isset($_POST['pa'])) {
    $advrol = $_POST['advrol'];
    $adv = $_POST['adv'];
    $pro = $_POST['pro'];


    if ($advrol == "" || $adv == "" || $pro == "") {
        echo "<script>location='addProjectAdvisor.php?status=1'</script>";
    } 
    else {
        $query = "SELECT COUNT(*) FROM ProjectAdvisor WHERE ProjectId = '$pro' and (AdvisorId = '$adv' or AdvisorRole='$advrol')";
        $res = db::getRecord($query);
        if ($res[''] > 0) {
            echo "<script>location='addProjectAdvisor.php?status=2'</script>";
        } else {
            $query = "INSERT INTO ProjectAdvisor (AdvisorId, ProjectId, AdvisorRole,AssignmentDate) VALUES ('$adv','$pro','$advrol',getdate())";
            $res = db::insertRecord($query);
            echo "<script>location='addProjectAdvisor.php?status=3'</script>";
        }
    }
} 
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
    $query = "SELECT * FROM Person WHERE Email = '$email'";
    $res = db::getRecords($query);
    $count = 0;
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

        $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth,Gender) values('$name','$surname','$pno','$email','$dob','$gender')";
        $res = db::insertRecords($query);
        $query = "INSERT INTO Advisor(Id, Designation, Salary) values((SELECT MAX(Id) FROM Person) ,'$des','$salary')";
        $res = db::insertRecords($query);
        echo "<script>location='addAdvisor.php?status=1'</script>";
    }
    

}
else if(isset($_POST['addgroeval'])){
    $eval = $_POST['eval'];
    $group = $_POST['group'];
    $marks = $_POST['marks'];
    //cheack if marks is integer or not
    if(!is_numeric($marks))
    {
        echo "<script>location='EvaluateGroup.php?status=5'</script>";
    }
    if($eval == "" || $group == "")
    {
        echo "<script>location='EvaluateGroup.php?status=3'</script>";
    }
    $query = "SELECT TotalMarks FROM Evaluation where Id = $eval";
    $res = db::getRecord($query);
    if($res['TotalMarks'] < $marks)
    {
        echo "<script>location='EvaluateGroup.php?status=4'</script>";
    }
    $query = "SELECT COUNT(*) FROM GroupEvaluation WHERE EvaluationId = $eval and GroupId = $group";
    $res = db::getRecord($query);
    if($res[''] > 0){
        echo "<script>location='EvaluateGroup.php?status=1'</script>";
    }
    else{
        $query = "INSERT INTO GroupEvaluation (GroupId,EvaluationId,ObtainedMarks, EvaluationDate) VALUES ($group,$eval,$marks,getdate())";
        $res = db::insertRecord($query);
        echo "<script>location='EvaluateGroup.php?status=2'</script>";
    }
}
else if(isset($_POST['upev']))
{
    $name = $_POST['title'];

    $query = "SELECT COUNT(*) FROM Evaluation WHERE [Name] = '$name'";
    $res = db::getRecord($query);
    if($res[''] == 0){
        echo "<script>location='updateEvaluation.php?status=1'</script>";
    }
    else{
        $query = "SELECT Id FROM Evaluation WHERE [Name] = '$name'";
        $res = db::getRecord($query);
        session_start();
        $_SESSION['Id'] = $res['Id'];
        echo "<script>location='editEvaluation.php'</script>";
    }
}
else if(isset($_POST['edev']))
{
    $marks = $_POST['marks'];
    $weight = $_POST['weight'];
    session_start();
    $id = $_SESSION["Id"];
    if(!is_numeric($marks) || !is_numeric($weight))
    {
        echo "<script>location='editEvaluation.php?status=1'</script>";
    }
    $query = "UPDATE Evaluation SET TotalMarks = $marks, TotalWeightage = $weight WHERE Id = $id";
    $res = db::updateRecord($query);
    session_destroy();
    echo "<script>location='updateEvaluation.php?status=2'</script>";
}
?>