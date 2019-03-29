<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM POSTED_JOBS";
$res = $db->getData($sql);
if (isset($_POST['delete']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

	$company_id = $_POST['delete'];
	$del_query = "DELETE FROM " . POSTED_JOBS . " WHERE company_id = '" . $company_id . "'";

	if (mysql_query($del_query)) {
		redirect('PostedJobs1.php');
	} else {
		die(mysql_error());
	}
}
?>

<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar.php'); ?>

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




                    <!-- table Data -->



                    <div class="wrapper">
                        <div id="sub-header"></div>
                        <section class="content-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Posted Jobs</h3>
                                        </div>


                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Job Title" id="search">
                                                </div>
                                                <div class="col-md-5 col-xs-6 col-sm-5">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="PPT date"> &nbsp &nbsp &nbsp Sort By &nbsp &nbsp </label>
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                <option selected>Sort By</option>
                                                                <option value="1">Application Deadline </option>
                                                                <option value="2">f1</option>
                                                                <option value="3">f2</option>
                                                                <option value="1">f3</option>
                                                                <option value="2">f4</option>
                                                                <option value="3">f5</option>
                                                            </select>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="ex1">
                                                <table class="table" id="stdlist">
                                                    <thead>
                                                        <tr>
                                                            <th>Company ID</th>
                                                            <th>Job Title</th>
                                                            <th>Details</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">

                                                        <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                        <tr>
                                                            <td><?php echo $res['oDATA'][$i]['company_id'] ?></td>
                                                            <td><?php echo $res['oDATA'][$i]['job_title'] ?></td>
                                                            <td>

                                                                <button type="button" data-toggle="modal" data-target=<?php echo "#myModal" . $i ?>>View</button>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id=<?php echo "myModal" . $i ?> role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Company ID</h4>
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table" id="stdlist">
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
                                                                                        <td><?php echo $res['oDATA'][$i]['cgpa_requirements'] ?></td>
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
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <a href="AppliedStudents.php">
                                                                                    <button type="button" name="abc">View Applied Students</button>
                                                                                </a>




                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </td>
                                                            <form method="post">
                                                                <td>
                                                                    <button type="submit" value="<?php echo $res['oDATA'][$i]['company_id'] ?>" name="delete">Delete</button>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    </tbody>
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
<!--footer section starts here-->
<?php include('includes/templates/bottom_bar.php'); ?> 