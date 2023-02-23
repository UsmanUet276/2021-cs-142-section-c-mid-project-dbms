<?php
    include("header.php");
    include("database.php");
    $query = "SELECT COUNT(*) FROM Student";
    $res = db::getRecords($query);
    $stu = $res[0][''];

    $query = "SELECT COUNT(*) FROM [Group]";
    $res = db::getRecords($query);
    $gro = $res[0][''];

    $query = "SELECT COUNT(*) FROM Project";
    $res = db::getRecords($query);
    $pro = $res[0][''];

    $query = "SELECT COUNT(*) FROM Advisor";
    $res = db::getRecords($query);
    $adv = $res[0][''];
?>
        <div class="sa4d25">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="st_title"><i class="uil uil-apps"></i> User Dashboard</h2>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Total Students</h5>
                                <h2><?php echo $stu;?></h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="images/dashboard/achievement.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Total Groups</h5>
                                <h2><?php echo $gro;?></h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="images/dashboard/graduation-cap.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Total Projects</h5>
                                <h2><?php echo $pro;?></h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="images/dashboard/online-course.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card_dash">
                            <div class="card_dash_left">
                                <h5>Total Advisors</h5>
                                <h2><?php echo $adv;?></h2>
                            </div>
                            <div class="card_dash_right">
                                <img src="images/dashboard/knowledge.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card_dash1">
                            <div class="card_dash_left1">
                                <i class="uil uil-book-alt"></i>
                                <h1>Jump Into Course Creation</h1>
                            </div>
                            <div class="card_dash_right1">
                                <button class="create_btn_dash"
                                    onclick="window.location.href = 'create_new_course.html';">Create Your
                                    Course</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    include("footer.php");
?>