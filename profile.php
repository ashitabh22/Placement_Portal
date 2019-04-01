<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
if (is_admin()) {
    if (isset($_GET['uid'])) {
        $uid = base64_decode($_GET['uid']);
        // echo $uid;
    } else {
        redirect('admin.php');
    }
} else {
    if (!is_loggedin()) {
        redirect('new_login.php');
    }
    $uid = $_SESSION[SES]['user'];
}

$sql = "SELECT * FROM ".PERSONAL_DETAILS." WHERE ldapid='".$uid."'";
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
                                            <h2 class="panel-title">Personal Details</h2>
                                        </div>

                                        <div class="panel-body">
                                            <div class="ex1">
                                                <table class="table" id="stdlist">
                                                    <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                    <tr>
                                                        <td>Ldap ID :</td>
                                                        <td><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Student Name :</td>
                                                        <td><?php echo $res['oDATA'][$i]['name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father's Name :</td>
                                                        <td><?php echo $res['oDATA'][$i]['job_description'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID No :</td>
                                                        <td><?php echo $res['oDATA'][$i]['roll_number'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date Of Birth :</td>
                                                        <td><?php echo $res['oDATA'][$i]['dob'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Program :</td>
                                                        <td><?php echo $res['oDATA'][$i]['degree'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Department :</td>
                                                        <td><?php echo $res['oDATA'][$i]['branch'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Semester :</td>
                                                        <td><?php echo $res['oDATA'][$i]['semester'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>CGPA :</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email :</td>
                                                        <td><?php echo $res['oDATA'][$i]['email'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile No :</td>
                                                        <td><?php echo $res['oDATA'][$i]['phone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Present Address :</td>
                                                        <td><?php echo $res['oDATA'][$i]['present_addr'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Permanent Address :</td>
                                                        <td><?php echo $res['oDATA'][$i]['permanent_addr'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dream Company :</td>
                                                        <td><?php echo $res['oDATA'][$i]['dream_company'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status :</td>
                                                        <td>
                                                            <?php if ($res['oDATA'][$i]['status'] == '0') echo "Resume Being Built" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '1') echo "Unverified Resume" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '2') echo "Verified Resume " ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '3') echo "Out of Placement" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '4') echo "Applied" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '5') echo "Shortlisted" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '6') echo "Not Shortlisted" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '7') echo "Test Cleared" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '8') echo "Test Failed" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '9') echo "Selected for interview" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '10') echo "Job Cleared" ?>
                                                            <?php if ($res['oDATA'][$i]['status'] == '11') echo "Rejected from Job" ?>



                                                        </td>
                                                    </tr>

                                                    <?php 
                                                } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>



                </body>
            </div>
        </div>
    </div>
</body> 