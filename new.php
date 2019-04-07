<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM " . APPLICABLE_JOBS . "," . STATUS . " WHERE " . STATUS . ".code=" . APPLICABLE_JOBS . ".status and  " . APPLICABLE_JOBS . ".status >=" . 4;
$res = $db->getData($sql);

$sql1 = "SELECT * FROM " . STATUS;
$res1 = $db->getData($sql1);
$ldap_id = $_POST['ldapid'];
$hoverq = "SELECT * FROM applicable_jobs WHERE ldapid ='$ldap_id'";
$hover = $db->getData($hoverq);

if (isset($_POST['submit_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $ldap_id = $_POST['ldapid'];
    // echo $ldap_id;
    // die();
    $job_status = intval($_POST['job_status']);

    $post_id = $_POST['post_id'];

    $query = "UPDATE " . APPLICABLE_JOBS . " SET status = " . $job_status . " WHERE ldapid = '" . $ldap_id . "' AND post_id = '" . $post_id . "'";
    if (mysql_query($query)) {
        redirect('AppliedStudents.php');
    } else {
        die(mysql_error());
    }
}


?>
<?php include('includes/templates/top_bar_admin.php'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="content">

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
                                            <h3 class="panel-title">All Jobs</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <div class="col-md-2 col-xs-6 col-sm-2">
                                                    <input type="text" onkeyup="myFunction()" placeholder=" &nbsp &nbsp Search " id="searchcomp">
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="col-md-3 col-xs-6 col-sm-3">

                                                </div>
                                                <div class="col-md-3 col-xs-6 col-sm-3">



                                                </div>
                                                <br>
                                                <div class="ex1">
                                                    <table class="table" id="myTable">
                                                        <tr>

                                                            <th>ROLL NO</th>
                                                            <th>Name</th>
                                                            <th>Company Name</th>
                                                            <th>Job Title</th>
                                                            <th>Status</th>
                                                            <th></th>

                                                        </tr>

                                                        <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                            <tr>
                                                                <form method="post" action="">
                                                                    <td><input type="hidden" name="ldapid" value=<?php echo $res['oDATA'][$i]['ldapid'] ?>><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                                    <?php
                                                                    $ldap_id = $res['oDATA'][$i]['ldapid'];
                                                                    $post_id = $res['oDATA'][$i]['post_id'];
                                                                    $query = "SELECT * from all_jobs, registered_companies,personal_details where  all_jobs.post_id='$post_id' and  all_jobs.company_id = " . REGISTERED_COMPANIES . ".company_id and personal_details.ldapid='$ldap_id' ";

                                                                    $finalres = $db->getData($query);
                                                                    pr($finalres);

                                                                    ?>
                                                                    <td>
                                                                        <input type="hidden" name="post_id" value=<?php echo $res['oDATA'][$i]['post_id'] ?>><?php echo $finalres['oDATA'][0]['name'] ?></td>
                                                                    <td><input type="hidden" name="ldapid" value=<?php echo $res['oDATA'][$i]['ldapid'] ?>><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                                    <td><input type="hidden" name="ldapid" value=<?php echo $res['oDATA'][$i]['ldapid'] ?>><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                                    <td><input type="hidden" name="ldapid" value=<?php echo $res['oDATA'][$i]['ldapid'] ?>><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                                    <td><input type="hidden" name="ldapid" value=<?php echo $res['oDATA'][$i]['ldapid'] ?>><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                                </form>
                                                            </tr>
                                                        <?php
                                                    } ?>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-5"></div>
                                                <div class="col-sm-7" ">
														<form method=" post" action="">
                                                    <button type="submit" class="btn btn-primary" name="print">
                                                        &nbsp; Print
                                                    </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </body>
            </div>
            <?php include('includes/templates/sidebar.php'); ?>
        </div>
    </div>
</body>


<?php include('includes/templates/footer2.php') ?>