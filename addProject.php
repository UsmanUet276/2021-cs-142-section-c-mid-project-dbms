<?php
    include("header.php");
    include("database.php");
    if(isset($_GET["status"]) && $_GET["status"]==1)
    {
        echo "<script>alert('Data Enetered Successfully')</script>";
    }
    if(isset($_GET["status"]) && $_GET["status"]==2)
    {
        echo "<script>alert('Project already exists')</script>";
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
                                            <h4>Add Project</h4>
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
                                                                    <input class="prompt srch_explore" type="text"
                                                                        name="title"  id="id[surname]"
                                                                        required="" maxlength="64"
                                                                        placeholder="Title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="ui search focus mt-30">
                                                                <div class="ui form swdh30">
                                                                    <div class="field">
                                                                        <textarea rows="3" name="des"
                                                                            id="id_about" required
                                                                            placeholder="Write a little description about project..."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="help-block">Links and coupon codes are not
                                                                    permitted in this section.</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="divider-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <button class="save_btn" type="submit" name="addpro">Submit</button>
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