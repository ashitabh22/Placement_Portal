<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM all_jobs";

$res = $db->getData($sql);
$sql1 = "SELECT company_name FROM registered_companies";
$result = $db->getData($sql1);


if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['Company_Name'];
    $title = $_POST['Job_Title'];
    $des = $_POST['Job_Description'];
    $cgpa = $_POST['CGPA_Requirement'];

    $branch = $_POST['Branch'];
    $app_period = $_POST['Application_Period'];
    $package = $_POST['Minimum_Package_Offered'];

    $pptdate = $_POST['ppt_date'];
    $test = $_POST['test_date'];
    $interview = $_POST['interview_date'];
    $shortlist = $_POST['shortlist_date'];
    $year = $_POST['academic_year'];
    foreach ($_POST['Program'] as $value) {
        echo $value;
        $query = "INSERT INTO all_jobs ( company_name , job_title , job_description,cgpa_requirement, program, branch ,application_period, min_package_offered , ppt_date, test_date, interview_date, shortlisting_date ,academic_year) 
    VALUES ( '$name' , '$title' , '$des' ,'$cgpa' , '$value', '$branch', '$app_period', '$package' , '$pptdate', '$test', '$interview', '$shortlist', '$year') ";
        // echo $query;
        /*if (mysql_query($query)) {
        redirect('postJobs.php');
    } else {
        die(mysql_error());
    }*/
    }
}
include('includes/templates/top_bar_admin.php');
?>
<!-- to include multipe select picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<!-- end -->

<!--header and top bar ends here-->

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9" id="content">

                <body id="content">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Company Register</h3>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="container-fluid">
                                    <br>

                                    <div class="signin-form">
                                        <span><b style="color:red;">* Fields are Required</b></span>
                                        <br><br>
                                        <form class="form-signin" method="post" action="">




                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Company Name
                                                </label>

                                                <select name="Company_Name" class="selectpicker" data-live-search = "true" required>
                                                    <option>Select a Company Name</option>
                                                    <?php

                                                    for ($i = 0; $i < $result['NO_OF_ITEMS']; $i++) {
                                                        echo "<option > " . $result['oDATA'][$i]['company_name'] . " </option>";
                                                    } ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Job Title
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Job Title" name="Job_Title" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Job Description
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Job Description" name="Job_Description" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>CGPA Requirement
                                                </label>
                                                <input type="number" min="0" step="any" class="form-control" placeholder="Enter CGPA Requirement" name="CGPA_Requirement" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Program
                                                </label>
                                                <select name="Program" class="selectpicker" multiple data-live-search="true" required>
                                                    <option value="B.Tech">B.Tech</option>
                                                    <option value="M.Tech">M.Tech</option>
                                                    <option value="PhD">PhD</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Branch
                                                </label>
                                                <select name="Branch" class="selectpicker" multiple data-live-search="true" required>
                                                    <option value="EECS">EECS</option>
                                                    <option value="ME">ME</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Application Period
                                                </label>
                                                <input type="date" name="Application_Period" id="interviewdate">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Minimum Package Offered
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Minimum Package Offered" name="Minimum_Package_Offered" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    PPT Date
                                                </label>
                                                <input type="date" name="ppt_date" id="pptdate">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Shortlisting Date
                                                </label>
                                                <input type="date" name="shortlist_date" id="shortlistdate">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Test Date
                                                </label>
                                                <input type="date" name="test_date" id="testdate">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Interview Date
                                                    <input type="date" name="interview_date" id="interviewdate">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Academic-Year
                                                </label>
                                                <input type="number" min="0" step="any" class="form-control" placeholder="Enter Academic Year" name="academic_year" id="academic_year">
                                            </div>

                                            <hr />
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" id="btn-login" name="submit">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Post
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>

                    </div>


                </body>
            </div>

        </div>
    </div>
</body> 