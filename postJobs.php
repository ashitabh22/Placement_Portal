<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();

if(!is_admin()){
    redirect("new_login.php");
}

$sql = "SELECT * FROM all_jobs";
$res = $db->getData($sql);

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['Company_Id'];
    // $name = $_POST['Company_name'];
    $title = $_POST['Job_Title'];
    $des = $_POST['Job_Description'];
    $cgpa = $_POST['CGPA_Requirement'];
    $program = $_POST['Program'];
    $branch = $_POST['Branch'];
    $app_period = $_POST['Application_Period'];
    $package = $_POST['Minimum_Package_Offered'];
    $posts = $_POST['No_of_Posts'];
    $pptdate = $_POST['ppt_date'];
    $test = $_POST['test_date'];
    $interview = $_POST['interview_date'];
    $shortlist = $_POST['shortlist_date'];
    $year = $_POST['academic_year'];
    $sql2 = "SELECT * FROM " . REGISTERED_COMPANIES;
    $res2 = $db->getData($sql2);
    $company_exists = false;
    for ($i = 0; $i < $res2['NO_OF_ITEMS']; $i++) {
        if ($res2['oDATA'][$i]['company_id'] == $id) {
            $company_exists = true;
        }
    }
    if (!$company_exists) {
        echo "<script>alert('compnay id does not exitst')</script>";
        redirect('postJobs.php');
    }
    $query = "INSERT INTO all_jobs (company_id , job_title , job_description,cgpa_requirement, program, branch ,application_period, min_package_offered , number_of_posts, ppt_date, test_date, interview_date, shortlisting_date ,academic_year)
VALUES ('$id', '$title' , '$des' ,'$cgpa' , '$program', '$branch', '$app_period', '$package' , '$posts', '$pptdate', '$test', '$interview', '$shortlist', '$year') ";

    if (mysql_query($query)) {
        redirect('postedJobs.php');
    } else {
        die(mysql_error());
    }
}
?>
<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar_admin.php'); ?>

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
                                                    <b style="color:red;">*</b>Company Id
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Company ID" name="Company_Id" required />

                                            </div>
                                            <!-- <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Company Name
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Company Name" name="Company_name" required />
                                            </div> -->
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
                                                <input type="tex" class="form-control" placeholder="Enter Job Description" name="Job_Description" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>CGPA Requirement
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter CGPA Requirement" name="CGPA_Requirement" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Program
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Program" name="Program" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Branch
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Branch" name="Branch" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Application Period
                                                </label>
                                                <input type="date" name="Application_Period" id="interviewdate" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Minimum Package Offered
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Minimum Package Offered" name="Minimum_Package_Offered" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Number of Posts
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Number of Posts" name="No_of_Posts" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b> PPT Date
                                                </label>
                                                <input type="date" name="ppt_date" id="pptdate" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Test Date
                                                </label>
                                                <input type="date" name="test_date" id="testdate" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b> Interview Date
                                                    <input type="date" name="interview_date" id="interviewdate" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Shortlisting Date
                                                </label>
                                                <input type="date" name="shortlist_date" id="shortlistdate" required>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Academic-Year
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Academic Year" name="academic_year" id="academic_year" required>
                                            </div>

                                            <hr />
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" id="btn-login" name="submit">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
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
<!--footer section starts here--> 