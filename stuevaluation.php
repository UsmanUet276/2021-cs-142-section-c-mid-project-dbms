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

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">
</head>

<body>

    <header class="invoice_header clearfix">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="invoice_header_main">
                        <div class="invoice_header_item">
                            <div class="invoice_logo" style="width:50px; height: 25px;">
                                <a href="index.php" ><img src="logo.png"  alt=""></a>
                            </div>
                            <p>Report-2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="wrapper _bg4586 _new89 p-0">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="invoice_body">
                        <div class="invoice_date_info">
                            <ul>
                                <li>
                                    <div class="vdt-list"><span>Date :</span><?php
                                    date_default_timezone_set('Asia/Karachi');
                                    $date = date('d') . ' ' . date('F') . ' ' . date('Y');
                                    echo $date;
                                    ?></div>
                                </li>
                                <li>
                                    <div class="vdt-list"><span>Time :</span><?php
                                    date_default_timezone_set('Asia/Karachi');
                                    $time = date('h:i A');
                                    echo $time;
                                    ?></div>
                                </li>
                            </ul>
                        </div>
                        <div class="invoice_dts">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="invoice_title">Report of all students and their assigned groups</h2>
                                </div>
                            </div>
                        </div>
                        <div class="invoice_table">
                            <div class="table-responsive-md">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">StudentId</th>
                                            <th scope="col">GroupId</th>
                                            <th scope="col">GroupCreationDate</th>
                                            <th scope="col">TotalEvaluations</th>
                                            <th scope="col">TotalMarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include ('database.php');
                                        $query = "SELECT 
                                        s.Id AS StudentId,
                                        g.Id AS GroupId,
                                        g.Created_On AS GroupCreationDate,
                                        COUNT(ge.GroupId) AS TotalEvaluations,
                                        SUM(ge.ObtainedMarks) AS TotalMarks
                                    FROM 
                                        Student s
                                        INNER JOIN GroupStudent gs ON s.Id = gs.StudentId
                                        INNER JOIN [Group] g ON gs.GroupId = g.Id
                                        LEFT JOIN GroupEvaluation ge ON g.Id = ge.GroupId
                                    GROUP BY 
                                        s.Id, g.Id, g.Created_On";
                                        $res = db::getRecords($query);
                                        foreach ($res as $re)
                                        {
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="user_dt_trans">
                                                    <p><?php echo $re['StudentId'];?></p>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="user_dt_trans">
                                                    <p><?php echo $re['GroupId'];?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="user_dt_trans">
                                                    <p><?php echo $re['GroupCreationDate'];?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="user_dt_trans">
                                                    <p><?php echo $re['TotalEvaluations'];?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="user_dt_trans">
                                                    <p><?php echo $re['TotalMarks'];?></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice_footer">
                            <div class="leftfooter">
                            <a class="print_btn" href="javascript:window.print();">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/OwlCarousel/owl.carousel.js"></script>
    <script src="vendor/semantic/semantic.min.js"></script>
    <script src="js/custom.js"></script>
</body>


</html>