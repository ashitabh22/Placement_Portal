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


$sql2 = "SELECT * FROM branch";
$result1 = $db->getData($sql2);

$sql3 = "SELECT * FROM program";
$result2 = $db->getData($sql3);
$post_id = $_POST['edit'];


$q2 = "select * from all_jobs where post_id='$post_id'";
$post_desc = $db->getData($q2);

$company_id = $post_desc['oDATA'][0]['company_id'];


$q3 = "select * from registered_companies where company_id='$company_id'";
$comp_info = $db->getData($q3);

$q4 = "select * from all_jobs where company_id='$company_id'";
$comp_info2 = $db->getData($q4);

$program_code = $post_desc['oDATA'][0]['program_code'];
$q5 = "select * from program where o_code='$program_code'";
$comp_info3 = $db->getData($q5);

$branch_code = $post_desc['oDATA'][0]['branch_code'];
$q6 = "select * from branch where o_code='$branch_code'";
$comp_info4 = $db->getData($q6);




if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    //     global $company_id;
    //     echo $company_id;
    //    die();
    // // echo $GLOBALS['post_id'];
    $post_id = $_POST['post_id'];

    $id = $_POST['submit'];

    $title = $_POST['Job_Title'];
    $des = $_POST['Job_Description'];
    $cgpa = $_POST['CGPA_Requirement'];
    $program = $_POST['Program'];
    $branch = $_POST['Branch'];
    $app_period_from = $_POST['Application_Period_from'];
    $app_period_to = $_POST['Application_Period_to'];
    $package = $_POST['Minimum_Package_Offered'];
    $pptdate = $_POST['ppt_date'];
    $test = $_POST['test_date'];
    $interview = $_POST['interview_date'];
    $shortlist = $_POST['shortlist_date'];
    $year = $_POST['academic_year'];

    $q2 = "select * from all_jobs where post_id='$post_id'";
    $post_desc = $db->getData($q2);

    $program_code = $post_desc['oDATA'][0]['program_code'];
    $q5 = "select * from program where o_code='$program_code'";
    $comp_info3 = $db->getData($q5);

    $branch_code = $post_desc['oDATA'][0]['branch_code'];
    $q6 = "select * from branch where o_code='$branch_code'";
    $comp_info4 = $db->getData($q6);

    $q7 = "select * from program where program_code='$program'";
    $comp_info5 = $db->getData($q7);

    $program_code = $comp_info5['oDATA'][0]['o_code'];

    $q8 = "select * from branch where branch_code='$branch'";
    $comp_info6 = $db->getData($q8);
    $branch_code = $comp_info6['oDATA'][0]['o_code'];

    $q9 = "select * from all_jobs where company_id='$id' AND program_code= '$program_code' AND branch_code = '$branch_code'";
    $posted = $db->getData($q9);


    $query = "UPDATE all_jobs SET 
                        job_title='$title' 
                        , job_description='$des'
                        , cgpa_requirement='$cgpa'
                        , application_period_from='$app_period_from'
                        , application_period_to='$app_period_to'
                        , min_package_offered='$package'
                        , ppt_date='$ppt_date'
                        , test_date='$test'
                        , interview_date='$interview'
                        , shortlisting_date='$shortlist'
                        , academic_year='$year'
                        
                        , company_id='$id'  WHERE post_id=" . $post_id;

    if (mysql_query($query)) {
        redirect('PostedJobs.php');
    } else {
        echo "error:";
        die(mysql_error());
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
            <div class="col-md-8 col-md-offset-2" id="content">

                <body id="content">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Job</h3>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-12">
                                <div class="container-fluid">
                                    <br>

                                    <div class="signin-form">
                                        <span><b style="color:red;">* Fields are Required</b></span>
                                        <br><br>
                                        <form method="post" action="">




                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Company Name
                                                </label>

                                                <select disabled name="Company_Id" class="selectpicker">
                                                    <option selected value="<?php echo $comp_info['oDATA'][0]['company_id']  ?>"> <?php echo $comp_info['oDATA'][0]['company_name']  ?> </option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Job Title
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Job Title" name="Job_Title" required value="<?php echo $comp_info2['oDATA'][0]['job_title'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Job Description
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Job Description" name="Job_Description" value="<?php echo $comp_info2['oDATA'][0]['job_description'] ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    CGPA Requirement
                                                </label>
                                                <input type="number" min="0" step="any" class="form-control" placeholder="Enter CGPA Requirement" name="CGPA_Requirement" value="<?php echo $comp_info2['oDATA'][0]['cgpa_requirement'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Program
                                                </label>
                                                <select name="Program" class="selectpicker" disabled>
                                                    <option selected value="<?php echo $comp_info3['oDATA'][0]['o_code']  ?>"> <?php echo $comp_info3['oDATA'][0]['program_name']  ?> </option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Branch
                                                </label>
                                                <select name="Branch" class="selectpicker" data-live-search="true" disabled>
                                                    <option selected value="<?php echo $comp_info4['oDATA'][0]['o_code']  ?>"> <?php echo $comp_info4['oDATA'][0]['branch_name'] ?> </option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Application Period
                                                </label>
                                                <label>
                                                    FROM
                                                </label>
                                                <input type="date" name="Application_Period_from" id="interviewdate" value="<?php echo $comp_info2['oDATA'][0]['application_period_from'] ?>" />
                                                <label>
                                                    TO
                                                </label>
                                                <input type="date" name="Application_Period_to" id="interviewdate" value="<?php echo $comp_info2['oDATA'][0]['application_period_to'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <b style="color:red;">*</b>Minimum Package Offered
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter Minimum Package Offered" name="Minimum_Package_Offered" value="<?php echo $comp_info2['oDATA'][0]['min_package_offered'] ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    PPT Date
                                                </label>
                                                <input type="date" name="ppt_date" id="pptdate" value="<?php echo $comp_info2['oDATA'][0]['ppt_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Shortlisting Date
                                                </label>
                                                <input type="date" name="shortlist_date" id="shortlistdate" value="<?php echo $comp_info2['oDATA'][0]['shortlisting_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Test Date
                                                </label>
                                                <input type="date" name="test_date" id="testdate" value="<?php echo $comp_info2['oDATA'][0]['test_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Interview Date
                                                    <input type="date" name="interview_date" id="interviewdate" value="<?php echo $comp_info2['oDATA'][0]['interview_date'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Academic-Year
                                                </label>
                                                <input type="number" min="0" step="any" class="form-control" placeholder="Enter Academic Year" name="academic_year" id="academic_year" value="<?php echo $comp_info2['oDATA'][0]['academic_year'] ?>">
                                            </div>

                                            <hr />
                                            <div class="form-group">
                                                <input type="hidden" name="post_id" value=<?php echo $post_id; ?>>
                                                <button type="submit" class="btn btn-primary" id="btn-login" name="submit" value="<?php echo $comp_info['oDATA'][0]['company_id']  ?>">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Update
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



