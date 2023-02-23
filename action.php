<?php
    include('database.php');
    if(isset($_POST['stu']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pno = $_POST['pno'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gen'];
        $roll = $_POST['roll'];

        $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth) values('$name','$surname','$pno','$email','$dob')";
        $res = db::insertRecords($query);
        $query = "INSERT INTO Student(Id,RegistrationNo) values((SELECT MAX(Id) FROM Person) , $roll)";
        $res = db::insertRecords($query);
        echo "<script>location='addStudent.php?status=1'</script>";
    }
    if(isset($_POST['adv']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pno = $_POST['pno'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gen'];
        $salary = $_POST['salary'];
        $des = $_POST['des'];

        $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth) values('$name','$surname','$pno','$email','$dob')";
        $res = db::insertRecords($query);
        $query = "INSERT INTO Advisor(Id, Designation, Salary) values((SELECT MAX(Id) FROM Person) ,'$des','$salary')";
        $res = db::insertRecords($query);
        echo "<script>location='addAdvisor.php?status=1'</script>";
    }

?>