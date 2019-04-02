<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
if (is_admin()) {
    if (isset($_GET['uid'])) {
        $uid = base64_decode($_GET['uid']);
    } else {
        redirect('admin.php');
    }
} else {
    if (!is_loggedin()) {
        redirect('login.php');
    }
    $uid = $_SESSION[SES]['user'];
}
$sql = "SELECT * FROM " . STUD_DETAILS . " WHERE ldapid = '$uid'";
$personal_details = $db->getData($sql);
if ($personal_details['oDATA'][0]['status'] == 0) {
    redirect($BASE_URL . "login.php");
}
$sql = "SELECT * FROM " . ACAD_DETAILS . " WHERE ldapid = '$uid'";
$academic_details = $db->getData($sql);
$sql = "SELECT * FROM " . TECH_SKILL . " WHERE ldapid = '$uid'";
$tech_skill = $db->getData($sql);
$sql = "SELECT * FROM " . ACHIVE_DETAILS . " WHERE ldapid = '$uid'";
$achiev_details = $db->getData($sql);
$sql = "SELECT * FROM " . INTERN_DETAILS . " WHERE ldapid = '$uid'";
$intern_details = $db->getData($sql);
$sql = "SELECT * FROM " . RESPONSIBILITY . " WHERE ldapid = '$uid'";
$responsibility = $db->getData($sql);
$sql = "SELECT * FROM " . EXTRA_CURR_ACTIVITY . " WHERE ldapid = '$uid'";
$extra_curr_activity = $db->getData($sql);
$sql = "SELECT * FROM " . PROJECT_DETAILS . " WHERE ldapid = '$uid'";
$proj_details = $db->getData($sql);
$sql = "SELECT * FROM " . WORK_EXP . " WHERE ldapid = '$uid'";
$work_exp = $db->getData($sql);
$sql = "SELECT * FROM " . STATUS . " WHERE code = '" . $personal_details['oDATA'][0]['status'] . "'";
$stat_code = $db->getData($sql);
?>

<?php 

if (is_admin()) {
    $title = "View students";
    include('includes/templates/top_bar_admin.php');
} else {
    $title = "View profile";
    include('includes/templates/top_bar_student.php');
}
?>

<body>
    <div class=" container - fluid ">
        <div class=" panel - group ">
            <div class=" panel pane l -primar y">
                <div class="pane l -headin g" style="background-color: ><b style=" color: #000000;"> (<?php echo $_SESSION[SES]['email']; ?>)</b></span>
                    <span style="float: right;">
                        <?php 
                        echo "<span>Present Status: </span><span class='label label-" . $stat_code['oDATA'][0]['color_label'] . "'>" . $stat_code['oDATA'][0]['status_name'] . "</span>";
                        if (is_loggedin() && $personal_details['oDATA'][0]['status'] == 2) {
                            echo " <span><a target='_blank' href='" . BASE_URL . 'download.php?uid=' .  base64_encode($uid) . "'><img src='" . BASE_URL . "images/download_img.png' width='30px' height='30px' /></i></a></span>";
                        }
                        ?>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="3" style="background-color: #6153a8; color: #fff;">Personal Details</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $personal_details['oDATA'][0]['name']; ?></td>
                            </tr>
                            <tr>
                                <th>Roll Number</th>
                                <td><?php echo $personal_details['oDATA'][0]['roll_number']; ?></td>
                            </tr>
                            <tr>
                                <th>DoB</th>
                                <td><?php echo $personal_details['oDATA'][0]['dob']; ?></td>
                            </tr>
                            <tr>
                                <th>Degree</th>
                                <td><?php echo $personal_details['oDATA'][0]['degree']; ?></td>
                            </tr>
                            <tr>
                                <th>Branch</th>
                                <td><?php echo $personal_details['oDATA'][0]['branch']; ?></td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td><?php echo $personal_details['oDATA'][0]['semester']; ?></td>
                            </tr>
                            <tr>
                                <th>Email ID</th>
                                <td><?php echo $personal_details['oDATA'][0]['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?php echo $personal_details['oDATA'][0]['phone']; ?></td>
                            </tr>
                            <tr>
                                <th>Present Address</th>
                                <td><?php echo $personal_details['oDATA'][0]['present_addr']; ?></td>
                            </tr>
                            <tr>
                                <th>Permanent Address</th>
                                <td><?php echo $personal_details['oDATA'][0]['permanent_addr']; ?></td>
                            </tr>
                            <tr>
                                <th>Dream Company</th>
                                <td><?php echo $personal_details['oDATA'][0]['dream_company']; ?></td>
                            </tr>
                            <tr>
                                <th>Resume Uploaded</th>
                                <td>
                                    <?php if (file_exists(FILE_PATH . $uid . '.pdf')) { ?>
                                    YES
                                    <?php 
                                } else { ?>
                                    NO
                                    <?php 
                                } ?>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="5" style="background-color: #6153a8; color: #fff;">EDUCATIONAL QUALIFICATION</th>
                            </tr>
                            <tr>
                                <th>Exam</th>
                                <th>Board</th>
                                <th>Year of Passing</th>
                                <th>Discipline</th>
                                <th>Marks/ CGPA/ GPA</th>
                            </tr>
                            <?php 
                            for ($i = 0; $i < $academic_details['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $academic_details['oDATA'][$i]['exam'] . "</td>
                                            <td>" . $academic_details['oDATA'][$i]['board'] . "</td>
                                            <td>" . $academic_details['oDATA'][$i]['year'] . "</td>
                                            <td>" . $academic_details['oDATA'][$i]['discipline'] . "</td>
                                            <td>" . $academic_details['oDATA'][$i]['marks'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="40" style="background-color: #6153a8; color: #fff;">TECHNICAL SKILLS</th>
                            </tr>
                            <tr>
                                <?php
                                for ($i = 0; $i < $tech_skill['NO_OF_ITEMS']; $i++) {
                                    echo "<td>" . $tech_skill['oDATA'][$i]['skill_name'] . "</td>";
                                }
                                ?>
                            </tr>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="2" style="background-color: #6153a8; color: #fff;">SCHOLASTIC ACHIEVEMENT</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $achiev_details['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $achiev_details['oDATA'][$i]['achievement'] . "</td>
                                            <td>" . $achiev_details['oDATA'][$i]['year'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="2" style="background-color: #6153a8; color: #fff;">INTERNSHIP</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $intern_details['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $intern_details['oDATA'][$i]['company'] . "</td>
                                            <td>" . $intern_details['oDATA'][$i]['duration'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="2" style="background-color: #6153a8; color: #fff;">POSITION(S) OF RESPONSIBILITY</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $responsibility['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $responsibility['oDATA'][$i]['position_held'] . "</td>
                                            <td>" . $responsibility['oDATA'][$i]['period'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="2" style="background-color: #6153a8; color: #fff;">WORK EXPERIENCE(S)</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $work_exp['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $work_exp['oDATA'][$i]['company'] . "</td>
                                            <td>" . $work_exp['oDATA'][$i]['duration'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="2" style="background-color: #6153a8; color: #fff;">PROJECT(S)</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $proj_details['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $proj_details['oDATA'][$i]['title'] . "</td>
                                            <td>" . $proj_details['oDATA'][$i]['duration'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th colspan="2" style="background-color: #6153a8; color: #fff;">EXTRA-CURRICULAR ACTIVITIES</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $extra_curr_activity['NO_OF_ITEMS']; $i++) {
                                echo "<tr>
                                            <td>" . $extra_curr_activity['oDATA'][$i]['activity'] . "</td>
                                        </tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 