<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM applied_jobs";
$res = $db->getData($sql);
?>


<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar_student.php'); ?>

<!--header and top bar ends here-->

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="content">

                <body id="content">
                    <style type="text/css">
                        .red {
                            color: #f20000;
                        }

                        #webdet {
                            display: none;
                        }
                    </style>
                    <div class="wrapper">
                        <div id="sub-header"></div>
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Applied Jobs</h3>
                                        </div>


                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Company" id="searchcomp">
                                                </div>
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Job Title" id="searchppt">
                                                </div>

                                            </div>
                                            <br>
                                            <div class="ex1">
                                                <table class="table table-hover" id="myTable">

                                                    <tr>
                                                        <th>Company Name <button type="button" class="btn btn-default btn-xs">
                                                                <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
                                                            </button></th>
                                                        <th>Job Title <button type="button" class="btn btn-default btn-xs">
                                                                <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
                                                            </button></th>
                                                        <th>Details</th>
                                                        <th>Status</th>

                                                    </tr>

                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                    <tr>
                                                        <td><?php echo $res['oDATA'][$i]['company_name'] ?></td>
                                                        <td><?php echo $res['oDATA'][$i]['job_title'] ?></td>
                                                        <td>
                                                            <button type="button" data-toggle="modal" data-target=<?php echo "#myModal" . $i ?>>View</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id=<?php echo "myModal" . $i ?> role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">Details</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table table-hover" id="jobinfo">
                                                                                <tr>
                                                                                    <th> Sr.</th>
                                                                                    <th>Job Info.</th>
                                                                                    <th>Details</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>1.</td>
                                                                                    <td>Job Description</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['job_description'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2.</td>
                                                                                    <td>CGPA Requirement</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['cgpa_requirement'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3.</td>
                                                                                    <td>Program</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['program'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4.</td>
                                                                                    <td>Branch</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['branch'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5.</td>
                                                                                    <td>Application Period</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['application_period'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6.</td>
                                                                                    <td>Minimum Package Offered</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['minimum_package_offered'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>7.</td>
                                                                                    <td>Number of Posts</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['number_of_posts'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>8.</td>
                                                                                    <td>PPT Date</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['ppt_date'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>9.</td>
                                                                                    <td>Test Date</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['test_date'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>10.</td>
                                                                                    <td>Interview Date</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['interview_date'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>11.</td>
                                                                                    <td>Shortlisting Date</td>
                                                                                    <td><?php echo $res['oDATA'][$i]['shortlisting_date'] ?></td>
                                                                                </tr>
                                                                            </table>
                                                        <td><?php echo $res['oDATA'][$i]['status'] ?></td>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </td>
                                </tr>
                                <?php 
                            } ?>

                                </table>
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7" ">
							<button type=" submit" class="btn btn-primary" onclick="showRecord();">
                            &nbsp; Print
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </section>
    </div>
</body>