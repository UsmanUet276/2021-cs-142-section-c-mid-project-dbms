<?php
    include("header.php");
    include("database.php");
    $query = "SELECT * FROM Lookup WHERE Category = 'ADVISOR_ROLE'";
    $res = db::getRecords($query);
    $query = "SELECT * FROM Advisor as A INNER JOIN Person as p ON A.Id = p.Id";
    $res1 = db::getRecords($query);
    $query = "SELECT * FROM Project";
    $res2 = db::getRecords($query);
    if(isset($_GET["status"]) && $_GET["status"]==1)
    {
        echo "<script>alert('Select All options')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==2)
    {
        echo "<script>alert('Same Advisor or Advisor role already assigned to project')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==3)
    {
        echo "<script>alert('Data Entered Succesfully!')</script>";
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
                                            <h4>Add Project Advisor</h4>
                                            <p>Select Advisor role, advisor and project</p>
                                        </div>
                                        <form method="POST" action ="action.php">
                                        <div class="basic_form">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="advrol">
                                                                            <option value="">Select Advisor Role</option>

                                                                            <?php 
                                                                            foreach($res as $pro)
                                                                            {
                                                                            
                                                                            echo '<option value="'. $pro['Id'].'">'.$pro['Value'].'</option>';
                                                                            }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="adv">
                                                                    <option value="">Select Advisor</option>
                                                                            <?php 
                                                                            foreach($res1 as $pro)
                                                                            {
                                                                            
                                                                            echo '<option value="'. $pro['Id'].'">'.$pro['FirstName']. ' - ' .$pro['Email'] .'</option>';
                                                                            }
                                                                            ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="pro">
                                                                    <option value="">Select Project Title</option>
                                                                            <?php 
                                                                            foreach($res2 as $pro)
                                                                            {
                                                                            
                                                                            echo '<option value="'. $pro['Id'].'">'.$pro['Title'] .'</option>';
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
                                        
                                    <button class="save_btn" type="submit" name="pa">Submit</button>
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