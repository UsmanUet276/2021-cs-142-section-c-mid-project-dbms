<?php
    include("header.php");
    include("database.php");
    $query = "SELECT * FROM [Group]";
    $res1 = db::getRecords($query);
    $query = "SELECT * FROM Evaluation";
    $res = db::getRecords($query);
    if(isset($_GET["status"]) && $_GET["status"]==1)
    {
        echo "<script>alert('Evaluation Already Exists')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==2)
    {
        echo "<script>alert('Data Submitted!')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==3)
    {
        echo "<script>alert('Select All options')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==4)
    {
        echo "<script>alert('Marks entered is greater than total marks')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==5)
    {
        echo "<script>alert('Marks entered are not in numeric form')</script>";
    }
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
                                            <h4>Evaluate Group</h4>
                                        </div>
                                        <form method="POST" action ="action.php">
                                        <div class="basic_form">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="group">
                                                                    <option value="">Select Group Id</option>
                                                                            <?php 
                                                                            foreach($res1 as $pro)
                                                                            {
                                                                            
                                                                            echo '<option value="'. $pro['Id'].'">'.$pro['Id']."-".$pro['Created_On'] .'</option>';
                                                                            }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="eval">
                                                                    <option value="">Select Evaluation Name</option>
                                                                            <?php 
                                                                            foreach($res as $pro)
                                                                            {
                                                                            
                                                                            echo '<option value="'. $pro['Id'].'">'.$pro['Name']."(out of ". $pro['TotalMarks'].")" .'</option>';
                                                                            }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="marks"  id="id[surname]"
                                                                        required="" maxlength="64"
                                                                        placeholder="Obtained Marks">
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
                                        
                                    <button class="save_btn" type="submit" name="addgroeval">Submit</button>
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