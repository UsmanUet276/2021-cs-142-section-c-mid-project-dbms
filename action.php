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
        $query = "SELECT * FROM Student WHERE RegistrationNo = $roll";
        $res = db::getRecords($query);
        $count = 0;
        foreach($res as $t)
        {
            $count ++;
        }
        echo $count;
        if($count >= 1)
        {
            echo "<script>location='addStudent.php?status=2'</script>";
        }
        else
        {
            $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth,Gender) values('$name','$surname','$pno','$email','$dob','$gender')";
            $res = db::insertRecords($query);
            $query = "INSERT INTO Student(Id,RegistrationNo) values((SELECT MAX(Id) FROM Person) , $roll)";
            $res = db::insertRecords($query);
            echo "<script>location='addStudent.php?status=1'</script>";
        }
    }
    if(isset($_POST['delstu']))
    {
        $roll = $_POST['roll'];
        $query = "SELECT Id FROM Student WHERE RegistrationNo = $roll";
        $res = db::getRecord($query);

        if ($res != false)
        {
            $res = $res['Id'];
            $query = "DELETE FROM Student WHERE Id = $res";
            $result = db::deleteRecords($query);
            $query = "DELETE FROM Person WHERE Id = $res";
            $result = db::deleteRecords($query); 
            echo "<script>location='delStudent.php?status=1'</script>";
        }
        else
        {
            echo "<script>location='delStudent.php?status=2'</script>";
        }
        
    }
    if(isset($_POST['upstu']))
    {
        $roll = $_POST['roll'];

        $query = "SELECT Id FROM Student Where RegistrationNo = $roll";
        $res = db::getRecord($query);

        if($res == false)
        {
            echo "<script>location='updateStudent.php?status=1'</script>";
        }
        else
        {
            session_start();
            $_SESSION['Id'] = $res['Id'];
            echo "<script>location='editStudent.php?status=1'</script>";
        }
    }
    if(isset($_POST['editstu']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pno = $_POST['pno'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gen = $_POST['gen'];
        session_start();
        $id = $_SESSION["Id"];
        $query = "UPDATE Person SET FirstName = '$name', LastName = '$surname', Contact = '$pno', Email = '$email', DateOfBirth = '$dob', Gender='$gen' Where Id = $id";
        $res = db::updateRecord($query);
        session_destroy();
        echo "<script>location='updateStudent.php?status=3'</script>";
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
        $query = "SELECT * FROM Person WHERE Email = '$email'";
        $res = db::getRecords($query);
        $count = 0;
        foreach($res as $t)
        {
            $count ++;
        }
        echo $count;
        if($count >= 1)
        {
            echo "<script>location='addAdvisor.php?status=2'</script>";
        }
        else
        {
            
        $query = "INSERT INTO Person(FirstName, LastName, Contact, Email, DateOfBirth,Gender) values('$name','$surname','$pno','$email','$dob','$gender')";
        $res = db::insertRecords($query);
        $query = "INSERT INTO Advisor(Id, Designation, Salary) values((SELECT MAX(Id) FROM Person) ,'$des','$salary')";
        $res = db::insertRecords($query);
        echo "<script>location='addAdvisor.php?status=1'</script>";
        }
    }
    if(isset($_POST['upadv']))
    {
        $email = $_POST['email'];

        $query = "SELECT Id FROM Person Where Email = '$email'";
        $res = db::getRecord($query);

        if($res == false)
        {
            echo "<script>location='updateAdvisor.php?status=1'</script>";
        }
        else
        {
            session_start();
            $_SESSION['Id'] = $res['Id'];
            echo "<script>location='editAdvisor.php?status=1'</script>";
        }
    }
    if(isset($_POST['editadv']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pno = $_POST['pno'];
        $dob = $_POST['dob'];
        $gen = $_POST['gen'];
        $salary = $_POST['salary'];
        $des = $_POST['des'];
        session_start();
        $id = $_SESSION["Id"];
        $query = "UPDATE Person SET FirstName = '$name', LastName = '$surname', Contact = '$pno', DateOfBirth = '$dob', Gender='$gen' Where Id = $id";
        $res = db::updateRecord($query);
        $query = "UPDATE Advisor SET Designation = '$des', Salary = '$salary' Where Id = $id";
        $res = db::updateRecord($query);
        session_destroy();
        echo "<script>location='updateAdvisor.php?status=3'</script>";
    }
    if(isset($_POST['deladv']))
    {
        $email = $_POST['email'];
        $query = "SELECT Id FROM Person WHERE Email = $email";
        $res = db::getRecord($query);

        if ($res != false)
        {
            $res = $res['Id'];
            $query = "DELETE FROM Adv WHERE Id = $res";
            $result = db::deleteRecords($query);
            $query = "DELETE FROM Person WHERE Id = $res";
            $result = db::deleteRecords($query); 
            echo "<script>location='delAdvisor.php?status=1'</script>";
        }
        else
        {
            echo "<script>location='delAdvisor.php?status=2'</script>";
        }
        
    }

?>