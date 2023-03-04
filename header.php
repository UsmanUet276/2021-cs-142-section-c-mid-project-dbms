<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>FinalTrack - Keep Tabs on Your Final Year Projects</title>

    <link rel="icon" type="image/png" href="images/fav.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel='stylesheet'>
    <link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="css/vertical-responsive-menu.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">

    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/instructor-dashboard.css" rel="stylesheet">
    <link href="css/instructor-responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">
</head>

<body>

    <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
            <i class='uil uil-bars'></i>
        </button>
        <button id="collapse_menu" class="collapse_menu">
            <i class="uil uil-bars collapse_menu--icon "></i>
            <span class="collapse_menu--label"></span>
        </button>
        <div class="main_logo" id="logo">
            <a href="index.php" ><img src="images/logo.png" alt=""></a>
            <a href="index.php" ><img class="logo-inverse" src="images/logo.png" alt=""></a>
        </div>
        <div class="search120">
            <div class="ui search">
                <div class="ui left icon input swdh10">
                    <input class="prompt srch10" type="text"
                        placeholder="Search for Tuts Videos, Tutors, Tests and more..">
                    <i class='uil uil-search-alt icon icon1'></i>
                </div>
            </div>
        </div>
        <div class="header_right">
        <ul>
                <li>
                    <a href="createStudentGroup.php" class="upload_btn" title="Create Student Group">Create Student Group</a>
                </li>
                <li class="ui dropdown">
                    <a href="#" class="opts_account" title="Account">
                        <img src="images/hd_dp.jpg" alt="">
                    </a>
                    <div class="menu dropdown_account">
                        <div class="channel_my">
                            <div class="profile_link">
                                <img src="images/hd_dp.jpg" alt="">
                                <div class="pd_content">
                                    <div class="rhte85">
                                        <h6>Usman Farid</h6>
                                        <div class="mef78" title="Verify">
                                            <i class='uil uil-check-circle'></i>
                                        </div>
                                    </div>
                                    <span><a href="https://gambolthemes.net/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="583f39353a3734616c6b183f35393134763b3735">[email&#160;protected]</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="night_mode_switch__btn">
                            <a href="#" id="night-mode" class="btn-night-mode">
                                <i class="uil uil-moon"></i> Night mode
                                <span class="btn-night-mode-switch">
                                    <span class="uk-switch-button"></span>
                                </span>
                            </a>
                        </div>
                        <a href="EvaluateGroup.php" class="item channel_item">Evaluate Group</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>



    <nav class="vertical_nav">
        <div class="left_section menu_left" id="js-menu">
            <div class="left_section">
                <ul>
                    <li class="menu--item">
                        <a href="index.php" class="menu--link active" title="Dashboard">
                            <i class="uil uil-apps menu--icon"></i>
                            <span class="menu--label">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu--item  menu--item__has_sub_menu">
                        <label class="menu--link" title="Tests">
                            <i class='uil uil-clipboard-alt menu--icon'></i>
                            <span class="menu--label">Manage Student</span>
                        </label>
                        <ul class="sub_menu">
                            <li class="sub_menu--item">
                                <a href="addStudent.php" class="sub_menu--link">Add Student</a>
                            </li>
                            <!-- <li class="sub_menu--item">
                                <a href="delStudent.php" class="sub_menu--link">Delete Student</a>
                            </li> -->
                            <li class="sub_menu--item">
                                <a href="updateStudent.php" class="sub_menu--link">Update Student</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="showStudents.php" class="sub_menu--link">Show All Students</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu--item  menu--item__has_sub_menu">
                        <label class="menu--link" title="Tests">
                            <i class='uil uil-clipboard-alt menu--icon'></i>
                            <span class="menu--label">Manage Advisor</span>
                        </label>
                        <ul class="sub_menu">
                            <li class="sub_menu--item">
                                <a href="addAdvisor.php" class="sub_menu--link">Add Advisor</a>
                            </li>
                            <!-- <li class="sub_menu--item">
                                <a href="deleteAdvisor.php" class="sub_menu--link">Delete Advisor</a>
                            </li> -->
                            <li class="sub_menu--item">
                                <a href="updateAdvisor.php" class="sub_menu--link">Update Advisor</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="showAdv.php" class="sub_menu--link">Show All Advisor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu--item  menu--item__has_sub_menu">
                        <label class="menu--link" title="Tests">
                            <i class='uil uil-clipboard-alt menu--icon'></i>
                            <span class="menu--label">Manage Project</span>
                        </label>
                        <ul class="sub_menu">
                            <li class="sub_menu--item">
                                <a href="addProject.php" class="sub_menu--link">Add Project</a>
                            </li>
                            <!-- <li class="sub_menu--item">
                                <a href="deleteProject.php" class="sub_menu--link">Delete Project</a>
                            </li> -->
                            <li class="sub_menu--item">
                                <a href="updateProject.php" class="sub_menu--link">Update Project</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="showProject.php" class="sub_menu--link">Show All Project</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu--item  menu--item__has_sub_menu">
                        <label class="menu--link" title="Tests">
                            <i class='uil uil-clipboard-alt menu--icon'></i>
                            <span class="menu--label">Manage Group</span>
                        </label>
                        <ul class="sub_menu">
                            <li class="sub_menu--item">
                                <a href="createStudentGroup.php" class="sub_menu--link">Add Group</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="addStuToGroup.php" class="sub_menu--link">Add Student to Group</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="delStuToGroup.php" class="sub_menu--link">Remove Stu From Group</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu--item  menu--item__has_sub_menu">
                        <label class="menu--link" title="Tests">
                            <i class='uil uil-clipboard-alt menu--icon'></i>
                            <span class="menu--label">Manage Evaluation ethos</span>
                        </label>
                        <ul class="sub_menu">
                            <li class="sub_menu--item">
                                <a href="addEvaluation.php" class="sub_menu--link">Add Evaluation</a>
                            </li>
                            <!-- <li class="sub_menu--item">
                                <a href="delEvaluation.php" class="sub_menu--link">Delete Evaluation</a>
                            </li> -->
                            <li class="sub_menu--item">
                                <a href="updateEvaluation.php" class="sub_menu--link">Update Evaluation</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="ShowEvaluation.php" class="sub_menu--link">Show all Evaluation</a>
                            </li>
                        </ul>
                    </li>
                    <!--uil-bell-->
                    <!-- <li class="menu--item">
                        <a href="create_new_course.html" class="menu--link" title="Create Course">
                            <i class='uil uil-plus-circle menu--icon'></i>
                            <span class="menu--label">Create Course</span>
                        </a>
                    </li>
                    
                    <li class="menu--item">
                        <a href="instructor_all_reviews.html" class="menu--link" title="Reviews">
                            <i class='uil uil-star menu--icon'></i>
                            <span class="menu--label">Reviews</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="instructor_earning.html" class="menu--link" title="Earning">
                            <i class='uil uil-dollar-sign menu--icon'></i>
                            <span class="menu--label">Earning</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="instructor_payout.html" class="menu--link" title="Payout">
                            <i class='uil uil-wallet menu--icon'></i>
                            <span class="menu--label">Payout</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="instructor_statements.html" class="menu--link" title="Statements">
                            <i class='uil uil-file-alt menu--icon'></i>
                            <span class="menu--label">Statements</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="instructor_verification.html" class="menu--link" title="Verification">
                            <i class='uil uil-check-circle menu--icon'></i>
                            <span class="menu--label">Verification</span>
                        </a>
                    </li>
                    <li class="menu--item  menu--item__has_sub_menu">
                        <label class="menu--link" title="Tests">
                            <i class='uil uil-clipboard-alt menu--icon'></i>
                            <span class="menu--label">Manage Student</span>
                        </label>
                        <ul class="sub_menu">
                            <li class="sub_menu--item">
                                <a href="certification_center.html" class="sub_menu--link">Certification Center</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="certification_start_form.html" class="sub_menu--link">Certification Fill
                                    Form</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="certification_test_view.html" class="sub_menu--link">Test View</a>
                            </li>
                            <li class="sub_menu--item">
                                <a href="certification_test__result.html" class="sub_menu--link">Test Result</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="left_section pt-2">
                <ul>
                    <li class="menu--item">
                        <a href="addProjectAdvisor.php" class="menu--link" title="Setting">
                            <i class='uil uil-cog menu--icon'></i>
                            <span class="menu--label">Add Project Advisor</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a href="EvaluateGroup.php" class="menu--link" title="Send Feedback">
                            <i class='uil uil-comment-alt-exclamation menu--icon'></i>
                            <span class="menu--label">Evaluate Group</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>




        
    </nav>
    <div class="wrapper">