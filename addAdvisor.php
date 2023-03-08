<?php
include("header.php");
include("database.php");
$query = "SELECT * FROM Lookup where Category = 'DESIGNATION'";
$res = db::getRecords($query);
$query = "SELECT * FROM Lookup where Category = 'GENDER'";
$res1 = db::getRecords($query);
if (isset($_GET["status"]) && $_GET["status"] == 1) {
    echo "<script>alert('Data Entered Successfully')</script>";
}
if (isset($_GET["status"]) && $_GET["status"] == 2) {
    echo "<script>alert('Advisor Already Exists')</script>";
}
if (isset($_GET["status"]) && $_GET["status"] == 3) {
    echo "<script>alert('Fill Gender and Designation')</script>";
}
if(isset($_GET["status"]) && $_GET["status"] == 4){
    echo "<script>alert('Add salary in numeric form')</script>";
}
?>
<div class="sa4d25">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                        <div class="account_setting">
                            <div class="basic_profile">
                                <div class="basic_ptitle">
                                    <h4>Add Advisor</h4>
                                    <p>Add information about Advisor</p>
                                </div>
                                <form method="POST" action="action.php">
                                    <div class="basic_form">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="name" id="id[name]" required="" maxlength="64" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="surname" id="id[surname]" required="" maxlength="64" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="tel" name="pno" id="id[surname]" required="" maxlength="64" placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="email" name="email" id="id[surname]" required="" maxlength="64" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="date" min="1923-01-01" name="dob" id="id[surname]" required="" maxlength="64">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="gen">
                                                                    <option value="0">Select Gender</option>
                                                                    <?php
                                                                    foreach ($res1 as $gen) {

                                                                        echo '<option value="' . $gen['Id'] . '">' . $gen['Value'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <input class="prompt srch_explore" type="text" name="salary" id="id[name]" required="" maxlength="64" placeholder="Salary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="ui search focus mt-30">
                                                            <div class="ui left icon input swdh11 swdh19">
                                                                <select class="ui hj145 dropdown cntry152 prompt srch_explore" name="des">
                                                                    <option value="0">Select Designation of Advisor</option>
                                                                    <?php
                                                                    foreach ($res as $des) {

                                                                        echo '<option value="' . $des['Id'] . '">' . $des['Value'] . '</option>';
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

                                    <button class="save_btn" type="submit" name="adv">Submit</button>
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