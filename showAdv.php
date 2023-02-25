<?php
    include("header.php");
    include("database.php");
    $query = "SELECT * FROM Advisor AS a INNER JOIN Person AS p ON a.Id = p.Id";
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
                                                    <th class="text-center" scope="col">Name</th>
                                                    <th class="text-center" scope="col">Designation</th>
                                                    <th class="text-center" scope="col">Salary</th>
                                                    <th class="text-center" scope="col">Contact</th>
                                                    <th class="text-center" scope="col">Email</th>
                                                    <th class="text-center" scope="col">Date Of Birth</th>
                                                    <th class="text-center" scope="col">Gender</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            foreach($res as $stu)
                                            {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?php echo $stu['FirstName'] ." ". $stu['LastName']; ?></td>
                                                    <td class="text-center"><?php $id =  $stu['Designation'];
                                                    $query = "SELECT [Value] FROM Lookup WHERE Id = $id";
                                                    $ans = db::getRecord($query);
                                                    echo $ans['Value'];?></td>
                                                    <td class="text-center"><?php echo $stu['Salary'];?></td>
                                                    <td class="text-center"><?php echo $stu['Contact'];?></td>
                                                    <td class="text-center"><?php echo $stu['Email'];?></td>
                                                    <td class="text-center"><?php $dob = $stu['DateOfBirth'];
                                                    $date = date('d-m-Y', strtotime($dob));
                                                    echo $date;?></td>
                                                    <td class="text-center"><?php 
                                                    $id =  $stu['Gender'];
                                                    $query = "SELECT [Value] FROM Lookup WHERE Id = $id";
                                                    $ans = db::getRecord($query);
                                                    echo $ans['Value']?></td>
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