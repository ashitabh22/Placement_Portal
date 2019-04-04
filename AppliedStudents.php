<?php
session_start();
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/functions/common.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");

$db = new SiteData();
$sql = "SELECT * FROM ".APPLICABLE_JOBS.",".STATUS." WHERE ".STATUS.".code=".APPLICABLE_JOBS.".status";
$res = $db->getData($sql);
$sql1 = "SELECT * FROM ".STATUS;
$res1 = $db->getData($sql1);

if (isset($_POST['submit_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $ldap_id = $_POST['ldapid'];
    // echo $ldap_id;
    // die();
    $job_status = intval($_POST['job_status']);
    
    $post_id = $_POST['post_id'];
    
    $query = "UPDATE ".APPLICABLE_JOBS." SET status = " . $job_status . " WHERE ldapid = '" . $ldap_id . "' AND post_id = '".$post_id."'";
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
                                                
                                                
                                                <br>
                                                <div class="ex1">
                                                    <table class="table" id="stdlist">
                                                        <thead>
                                                            <tr>
                                                                <th>ROLL NO</th>
                                                                <th>Name</th>
                                                                <th>Company Name</th>
                                                                <th>Job Title</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php for ($i = 0; $i < $res['NO_OF_ITEMS']; $i++) { ?>
                                                            <tr>
                                                                <form method="post">
                                                                    <td><input type="hidden" name="ldapid" value= <?php echo $res['oDATA'][$i]['ldapid'] ?> ><?php echo $res['oDATA'][$i]['ldapid'] ?></td>
                                                                    
                                                                    
                                                                    <?php $post_id =$res['oDATA'][$i]['post_id'];
                                                                            $query2 = "SELECT * FROM posted_jobs_B_P WHERE post_id = ' " . $post_id . " ' " ; 
                                                                            $res2 = $db->getData($query2);

                                                                            $company_id=$res2['oDATA'][0]['company_id'];
                                                                            $query3 = "SELECT * FROM registered_companies WHERE company_id = ' " . $company_id . " ' " ; 
                                                                            $res3 = $db->getData($query3);

                                                                            $ldap_id=$res['oDATA'][$i]['ldapid'];
                                                                            $query4 = "SELECT * FROM personal_details WHERE ldapid = ' " . $ldap_id . " ' " ; 
                                                                            $res4 = $db->getData($query4);
                                                                            
                                                                            $query5 = "SELECT * FROM all_jobs WHERE company_id = ' " . $company_id . " ' " ; 
                                                                            $res5 = $db->getData($query5);

                                                                    ?> <td><input type="hidden" name="post_id" value= <?php echo $res['oDATA'][$i]['post_id'] ?> ><?php echo $res4['oDATA'][$i]['name'] ?></td>
                                                                    
                                                                    <td><?php echo $res3['oDATA'][0]['company_name'] ?></td>
                                                                    <td><?php echo $res5['oDATA'][0]['job_title'] ?></td>
                                                                    <td>
                                                                        <div class="col-auto my-1">
                                                                            <label for="Status"> &nbsp &nbsp &nbsp &nbsp
                                                                                &nbsp </label>
                                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="job_status">

                                                                            <option><?php echo $res['oDATA'][$i]['status_name'] ?></option>
                                                                                <?php

                                                                                for ($i = 5; $i < $res1['NO_OF_ITEMS']; $i++) {

                                                                                    
                                                                                    echo "<option value=".$res1['oDATA'][$i]['code']."  > " . $res1['oDATA'][$i]['status_name'] . " </option>";
                                                                                } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="save">
                                                                            <button type="submit" value="<?php echo $res['oDATA'][$i]['ldapid'] ?>" name="submit_changes" id="save_changes">Save
                                                                                Changes
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </form>
                                                            </tr>
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
        </div>
    </div>

</body> 