<?php
    session_start();
    if(!isset($_SESSION["Id"]))
    {
        echo "<script>location='updateStudent.php'</script>";
    }
    include("header.php");
    include("database.php");
    if(isset($_GET["status"]) && $_GET["status"]==2)
    {
        echo "<script>alert('Email Already exists')</script>";
    }
    $query = "SELECT * FROM Lookup where Category = 'GENDER'";
    $res = db::getRecords($query);
    $id = $_SESSION["Id"];
    $query = "SELECT * FROM Student as s INNER JOIN Person AS p ON s.Id = p.Id where s.Id = $id";
    $res1 = db::getRecords($query);
    $id = $res1[0]['Gender'];
    $query = "SELECT [Value] FROM Lookup Where Id = $id";
    $res2 = db::getRecord($query);
?>
       <div class="sa4d25">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                                aria-labelledby="pills-account-tab">
                                <div class="account_setting">
                                    <div class="basic_profile">
                                        <div class="basic_ptitle">
                                            <h4>Edit Student</h4>
                                            <p>Edit information about student</p>
                                        </div>
                                        <form method="POST" action ="action.php">
                                        <div class="basic_form">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="name" <?php 
                                                                        $fname = $res1[0]['FirstName'];
                                                                        echo "value = '".$fname."'";?> id="id[name]"
                                                                        required="" maxlength="64"
                                                                        placeholder="First Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="surname" <?php 
                                                                        $lname = $res1[0]['LastName'];
                                                                        echo "value = '".$lname."'";?> id="id[surname]"
                                                                        required="" maxlength="64"
                                                                        placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="tel"
                                                                        name="pno" <?php 
                                                                        $pno = $res1[0]['Contact'];
                                                                        echo "value = '".$pno."'";?>id="id[surname]"
                                                                        required="" maxlength="64"
                                                                        placeholder="Phone Number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="email"
                                                                        name="email" <?php 
                                                                        $email = $res1[0]['Email'];
                                                                        echo "value = '".$email."'";?> id="id[surname]"
                                                                        required="" maxlength="64"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="date"
                                                                        name="dob" <?php 
                                                                        $dob = $res1[0]['DateOfBirth'];
                                                                        $date = date('Y-m-d', strtotime($dob));
                                                                        echo "value = '".$date."'";?> id="id[surname]"
                                                                        required="" maxlength="64"
                                                                        >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="gen">
                                                                            <option <?php 
                                                                        $g = $res1[0]['Gender'];
                                                                        echo "value = '".$g."'";?>><?php echo $res2['Value'];?></option>
                                                                            <?php 
                                                                            foreach($res as $gen)
                                                                            {
                                                                            if($res2['Value'] != $gen['Value'])
                                                                            echo '<option value="'. $gen['Id'].'">'.$gen['Value'].'</option>';
                                                                            }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="divider-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <button class="save_btn" type="submit" name="editstu">Edit</button>
                                    <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
<?php
    include("footer.php");
?>