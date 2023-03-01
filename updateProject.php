<?php
    include("header.php");
    include("database.php");
    $query = "SELECT * FROM Project";
    $res = db::getRecords($query);

    if(isset($_GET["status"]) && $_GET["status"]==1)
    {
        echo "<script>alert('Data Not Entered')</script>";
    }
    else if(isset($_GET["status"]) && $_GET["status"]==2)
    {
        echo "<script>alert('Designation Updated!')</script>";
    }
    else if(isset($_GET["status"]) && $_GET["status"]==3)
    {
        echo "<script>alert('Title Updated!')</script>";
    }
    else if(isset($_GET["status"]) && $_GET["status"]==4)
    {
        echo "<script>alert('Designation and Title Updated')</script>";
    }
    else if(isset($_GET["status"]) && $_GET["status"]==5)
    {
        echo "<script>alert('Select Title!')</script>";
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
                                            <h4>Update Project</h4>
                                            <p>Add information about Project</p>
                                        </div>
                                        <form method="POST" action ="action.php">
                                        <div class="basic_form">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui left icon input swdh11 swdh19">
                                                                    <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="gen">
                                                                            <option value="0">Select Project Title</option>
                                                                            <?php 
                                                                            foreach($res as $pro)
                                                                            {
                                                                            
                                                                            echo '<option value="'. $pro['Id'].'">'.$pro['Title'].'</option>';
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
                                                                        name="title"  id="id[surname]"
                                                                         maxlength="64"
                                                                        placeholder="Title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="des"
                                                                            id="id_about"
                                                                            placeholder="Write a little description about project..."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">Leave Empty If you dont want to edit any field</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="divider-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <button class="save_btn" type="submit" name="uppro">Submit</button>
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