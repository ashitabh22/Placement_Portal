<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
$db = new SiteData();

$sql = "SELECT * FROM applicable_jobs";
$res = $db->getData($sql);

if (isset($_POST['submit_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
	$company_name = $_POST['submit_changes'];
	$status = 1;
	$query = "UPDATE applicable_jobs SET status = '" . $status . "' WHERE company_name = '" . $company_name . "'";
	if (mysql_query($query)) {
		redirect('applicableJobs.php');
	} else {
		die(mysql_error());
	}
}

?>

<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar.php'); ?>

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
                                            <h3 class="panel-title">Applicable Jobs</h3>
                                        </div>


                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Name" id="searchppt">
                                                </div>

                                            </div>
                                            <br>
                                            <div class="ex1">
                                                <table class="table table-hover" id="stdlist">

                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Job Title</th>
                                                        <th>Details</th>
                                                        <th></th>
                                                    </tr>
                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                    <form method="post">
                                                        <tr>
                                                            <td><?php echo $res['oDATA'][$i]['company_name'] ?></td>
                                                            <td><?php echo $res['oDATA'][$i]['job_title'] ?></td>
                                                            <td>
                                                                <button type="button" data-toggle="modal" data-target="<?php echo '#myModal' . $i; ?>">View</button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="<?php echo 'myModal' . $i ?>" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Details</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-hover" id="stdlist">
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
                                                                                        <td><?php echo $res['oDATA'][$i]['ppt_data'] ?></td>
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
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="submit" <?php if ($res['oDATA'][$i]['status'] == '1') echo  "disabled = 'true'" ?> value="<?php echo $res['oDATA'][$i]['company_name'] ?>" name="submit_changes">Apply
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                    <?php 
												} ?>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary" onclick="showRecord();">
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
            </div>
            <div class="col-md-3">
                <!-- generated from related link file -->
                <h3 class='mytitle'>placement</h3>
                <ul class='mysidebar'>
                    <li class='active'><a href='index.php?pid=invi_letter_tnp' target='_self'> Placement Invitation</a></li>
                    <li class='active'><a href='index.php?pid=internship_procedure' target='_self'> Internship Procedure</a></li>
                    <li class='active'><a href='index.php?pid=placement_procedure' target='_self'> Placement Procedure</a></li>
                    <li class='active'><a href='index.php?pid=company_portal' target='_self'> Company Registration</a></li>
                    <li class='active'><a href='index.php?pid=placement_office' target='_self'> Placement Office</a></li>
                    <li class='active'><a href='
												' target=''></a></li>
                </ul>
                <h3 class="mytitle">Navigation</h3>
                <!--Tes-->
                <ul class="mysidebar">
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_department">Departments</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=institute_facility">Facilities</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_research">Research and Development</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_academic">Academics</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=nav_administration">Administration</a></li>
                    <li><a href="https://www.iitbhilai.ac.in:443/index.php?pid=aca_admission">Admissions</a></li>
                </ul>
            </div>
        </div>
    </div>




</body>
<?php include('includes/templates/bottom_bar.php'); ?> 