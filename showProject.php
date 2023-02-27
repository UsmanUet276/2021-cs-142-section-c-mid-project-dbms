<?php
    include("header.php");
    include("database.php");
    $query = "SELECT * FROM Project";
    $res = db::getRecords($query);
?>
<div class="sa4d25">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="st_title"><i class="uil uil-book-alt"></i>Students</h2>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="my_courses_tabs">
                            
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-my-courses" role="tabpanel">
                                    <div class="table-responsive mt-30">
                                        <table class="table ucp-table">
                                            <thead class="thead-s">
                                                <tr>
                                                    <th class="text-center" scope="col">Title</th>
                                                    <th class="text-center" scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach($res as $stu)
                                            {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?php echo $stu['Title'] ; ?></td>
                                                    <td class="text-center"><?php echo $stu['Description'];?></td>
                                                </tr>
                                            </tbody>
                                            <?php 
                                            }
                                            ?>
                                        </table>
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