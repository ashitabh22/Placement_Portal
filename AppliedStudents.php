<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM AppliedStudents";
$res = $db->getData($sql);

if (isset($_POST['submit_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $ldap_id = $_POST['submit_changes'];
    $job_status = $_POST['job_status'];
    $query = "UPDATE AppliedStudents SET status = '" . $job_status . "' WHERE ldap = '" . $ldap_id . "'";
    if (mysql_query($query)) {
        redirect('AppliedStudents.php');
    } else {
        die(mysql_error());
    }
}
?>

<?php include('includes/templates/header2.php'); ?>
<?php include('includes/templates/top_bar_admin.php'); ?>


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
                                            <h3 class="panel-title">Applied Students</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <input type="text" placeholder="Search by Name" id="searchppt">
                                                </div>
                                                <div class="col-md-5 col-xs-6 col-sm-5">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="Status"> &nbsp &nbsp &nbsp Filter by Status
                                                                &nbsp &nbsp </label>
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                <option value="Applied">Applied </option>
                                                                <option value="Shortlisted">Shortlisted </option>
                                                                <option value="Not Shortlisted">Not Shortlisted</option>
                                                                <option value="Test Cleared">Test Cleared</option>
                                                                <option value="Test Failed">Test Failed</option>
                                                                <option value="Selected for interview">Selected for interview</option>
                                                                <option value="Job Cleared">Job Cleared</option>
                                                                <option value="Rejected from Job">Rejected from Job</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-6 col-sm-3">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="PPT date"> &nbsp &nbsp &nbsp Sort Branch
                                                                Wise &nbsp &nbsp </label>
                                                            <select name="drop_down" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                <option selected>Sort Branch Wise</option>
                                                                <option value="1">B.Tech CSE</option>
                                                                <option value="2">B.Tech ME</option>
                                                                <option value="3">B.Tech EE</option>
                                                                <option value="1">M.Tech CSE</option>
                                                                <option value="2">M.Tech ME</option>
                                                                <option value="3">M.Tech EE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="ex1">
                                                    <table class="table" id="stdlist">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.</th>
                                                                <th>LDAP</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                            <form method="post">
                                                                <tr>
                                                                    <td><?php echo $res['oDATA'][$i]['sr'] ?></td>
                                                                    <td><?php echo $res['oDATA'][$i]['ldap'] ?></td>
                                                                    <td>
                                                                        <div class="col-auto my-1">
                                                                            <label for="Status"> &nbsp &nbsp &nbsp &nbsp
                                                                                &nbsp </label>
                                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="job_status">

                                                                                <option value="0" <?php if ($res['oDATA'][$i]['status'] == '0') echo  "selected = 'selected'" ?>>Applied </option>
                                                                                <option value="1" <?php if ($res['oDATA'][$i]['status'] == '1') echo  "selected = 'selected'" ?>>Shortlisted </option>
                                                                                <option value="2" <?php if ($res['oDATA'][$i]['status'] == '2') echo  "selected = 'selected'" ?>>Not Shortlisted</option>
                                                                                <option value="3" <?php if ($res['oDATA'][$i]['status'] == '3') echo  "selected = 'selected'" ?>>Test Cleared</option>
                                                                                <option value="4" <?php if ($res['oDATA'][$i]['status'] == '4') echo  "selected = 'selected'" ?>>Test Failed</option>
                                                                                <option value="5" <?php if ($res['oDATA'][$i]['status'] == '5') echo  "selected = 'selected'" ?>>Selected for interview</option>
                                                                                <option value="6" <?php if ($res['oDATA'][$i]['status'] == '6') echo  "selected = 'selected'" ?>>Job Cleared</option>
                                                                                <option value="7" <?php if ($res['oDATA'][$i]['status'] == '7') echo  "selected = 'selected'" ?>>Rejected from Job</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="save">
                                                                            <button type="submit" value="<?php echo $res['oDATA'][$i]['ldap'] ?>" name="submit_changes">Save
                                                                                Changes
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </form>
                                                        </tbody> <?php 
                                                                } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-7">
                                            <button type="submit" class="btn btn-primary" onclick="showRecord();">
                                                &nbsp; Print Shortlised Students
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
            </div>




            <!-- footer -->
        </div>
    </div>
</body>